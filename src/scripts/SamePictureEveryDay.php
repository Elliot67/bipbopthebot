<?php

class SamePictureEveryDay{

    const currentScripts = [
        'zidane'
    ];

    public function findScript(){
        $choosenScript = currentScripts[rand(0, count(currentScripts))];
        switch($choosenScript){
            case 'zidane':
                self.zidane();
                break;
        }
    }

    private function zidane(){

        $time = time();
        $random = random_int(1, $time);

        echo $random;

        return $random;
    }

}