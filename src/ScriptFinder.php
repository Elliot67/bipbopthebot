<?php

use Abraham\TwitterOAuth\TwitterOAuth;

class ScriptFinder{
    
    public static $currentScripts = [
        //'TimeRelativeThings'
        'SendAPicture'
    ];
    public static $connection;
    public static $statues;
    public static $mediaId;

    public static function initScripts(){

        self::$connection = new TwitterOAuth(Tokens::API_KEY, Tokens::API_SECRET_KEY, Tokens::ACCESS_TOKEN, Tokens::ACCESS_TOKEN_SECRET);
        //$statues = $connection->get("account/verify_credentials");

        $choosenScript = self::$currentScripts[random_int(1, count(self::$currentScripts)) - 1];
        switch($choosenScript){
            case 'TimeRelativeThings':
                require_once __DIR__ . '/scripts/TimeRelativeThings.php';
                TimeRelativeThings::init();
                break;
            case 'SendAPicture':
                require_once __DIR__ . '/scripts/SendAPicture.php';
                SendAPicture::init();
                break;
        }
    }

    public static function SendTweet($data) {
        //$statues = $connection->post("statuses/update", ["status" => $message]);
        self::$statues = self::$connection->post("statuses/update", $data);

        if (self::$connection->getLastHttpCode() == 200) {
            echo "Success";
        } else {
            echo "Error";
        }
        echo '<br><br>';
        var_dump(self::$statues);
    }

    public static function sendMedia($mediaUri1, $mediaUri2 = false, $mediaUri3 = false, $mediaUri4 = false) {
        $media1 = self::$connection->upload("media/upload", ["media" => $mediaUri1]);
        self::$mediaId = $media1->media_id_string;

        //TODO: .. Faire pour plusieurs médias
    }

}