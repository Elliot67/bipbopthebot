<?php

class SendAPicture{

    public static $availablePictures = [
        'zidane1.jpg',
    ];

    public static function init(){
        $randomImage = random_int(1, count(self::$availablePictures)) - 1;

        $image = __DIR__ . '/../img/SendAPicture/' . self::$availablePictures[$randomImage];
        var_dump($image);
        ScriptFinder::sendMedia($image);

        $data = ["media_ids" => ScriptFinder::$mediaId];
        ScriptFinder::sendTweet($data);
    }

}