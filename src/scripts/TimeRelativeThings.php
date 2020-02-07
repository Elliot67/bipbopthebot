<?php

class TimeRelativeThings{


    const currentScripts = [
        'timePassed'
    ];

    public function findScript(){
        $choosenScript = currentScripts[rand(0, count(currentScripts))];
        switch($choosenScript){
            case 'timePassed':
                self.timePassed();
                break;
        }
    }


    private function timePassed(){

        $time = time();
        $random = random_int(1, $time);

        return $random;
    }

}