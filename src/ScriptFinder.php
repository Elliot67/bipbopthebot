<?php

use Abraham\TwitterOAuth\TwitterOAuth;

class ScriptFinder{
    
    private $currentScripts = [
        //'TimeRelativeThings'
        'SamePictureEveryDay'
    ];

    private $connection;

    private $statues;

    function __construct(){
        require_once '../tokens.php';
        require_once "lib/twitteroauth-1.0.1/autoload.php";

        $this->connection = new TwitterOAuth(Tokens::apiKey, Tokens::apiSecretKey, Tokens::accessToken, Tokens::accessTokenSecret);
        //$statues = $connection->get("account/verify_credentials");
    }

    public static function findScript(){
        $choosenScript = $this->$currentScripts[rand(0, count($this->$currentScripts))];
        switch($choosenScript){
            case 'TimeRelativeThings':
                $this->timeRelativeThings();
                echo "time";
                break;
            case 'SamePictureEveryDay':
                $this->samePictureEveryday();
                echo "picture";
                break;
        }

        if ($connection->getLastHttpCode() == 200) {
            echo "Success";
        } else {
            echo "Error";
        }
        echo '<br><br><br>';
        var_dump($statues);
    }

    private function TimeRelativeThings(){
        require_once 'TimeRelativeThings.php';

        $message = TimeRelativeThings::findScript();
        //$statues = $connection->post("statuses/update", ["status" => $message]);
    }

    private function samePictureEveryday(){
        require_once 'TimeRelativeThings.php';

        $media = SamePictureEveryDay::findScript();
        //$statues = $connection->post("statuses/update", ["status" => $message]);
    }
}