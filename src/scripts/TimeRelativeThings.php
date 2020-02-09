<?php

class TimeRelativeThings{

    public static function init(){
        $time = time();
        $random = random_int(1, $time);

        $data = ["status" => $random]
        ScriptFinder::sendTweet($data);
    }

}