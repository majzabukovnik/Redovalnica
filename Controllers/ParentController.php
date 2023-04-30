<?php

namespace Controllers;
use Models\ParentModel;

abstract class ParentController
{
    protected function findErrors(int $expectedPostSize): array{
        $err = [];

        foreach($_POST as $key=>$value){
            if(empty($value)){
                $err[] = 'Obvezno vnesite vrednost za ' . $key . '!';
            }
        }

        if(sizeof($_POST) != $expectedPostSize ){
            $err[] = 'Nepričakovano število podatkov!';
        }


        return $err;
    }
}