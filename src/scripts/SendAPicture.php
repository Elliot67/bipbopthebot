<?php

class SendAPicture{

    public static function init(){
        $time = time();
        $random = random_int(1, $time);

        $data = ["status" => $random]
        ScriptFinder::sendTweet("statuses/update", $data);
    }

}