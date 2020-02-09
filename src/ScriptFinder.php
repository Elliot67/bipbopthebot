<?php

use Abraham\TwitterOAuth\TwitterOAuth;

class ScriptFinder{
    
    public static $connection;
    public static $statues;
    public static $currentScripts = [
        //'TimeRelativeThings'
        'SendAPicture'
    ];

    public static function initScripts(){

        self::$connection = new TwitterOAuth(Tokens::API_KEY, Tokens::API_SECRET_KEY, Tokens::ACCESS_TOKEN, Tokens::ACCESS_TOKEN_SECRET);
        //$statues = $connection->get("account/verify_credentials");

        $choosenScript = self::$currentScripts[rand(1, count(self::$currentScripts)) - 1];
        switch($choosenScript){
            case 'TimeRelativeThings':
                echo "time";
                require_once 'scripts/TimeRelativeThings.php';
                TimeRelativeThings::init();
                break;
            case 'SendAPicture':
                echo "picture";
                require_once 'scripts/SendAPicture.php';
                SendAPicture::init();
                break;
        }
    }

    public static function SendTweet($uri, $data){
        //$statues = $connection->post("statuses/update", ["status" => $message]);
        self::$statues = $connection->post($uri, $data);

        if (self::$connection->getLastHttpCode() == 200) {
            echo "Success";
        } else {
            echo "Error";
        }
        echo '<br><br><br>';
        var_dump(self::$statues);
    }

}