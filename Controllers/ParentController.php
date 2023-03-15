<?php

namespace Controllers;
use Models\ParentModel;

abstract class ParentController
{
    protected function findErrors(): array{
        $err = [];
        foreach($_POST as $key=>$value){
            if(empty($value)){
                $err[] = 'Obvezno vnesite vrednost za ' . $key . '!';
            }
        }
        return $err;
    }
}