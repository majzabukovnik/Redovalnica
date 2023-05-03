<?php

namespace Controllers;

use Models\RegistracijaUrnik as RegisterModel;

class RegistracijaUrnik extends ParentController
{
    protected RegisterModel $model;
    public function __construct(){
        $this->model = new RegisterModel();
    }

    public function showForm(array $err = []): void{
        if(!(isset($_SESSION['vloga']) && $_SESSION['vloga'] === 'adm')){
            header('Location: /Redovalnica/domov/');
            exit();
        }

        view('RegistracijaUrnik', [
            'razredi' => $this->model->getClassData(),
            'ucitelji' => $this->model->getTeacherData(),
            'uci' => $this->model->getTeachesData(),
            'err' => $err
        ]);
    }

    public function processData(): void{
        try{
            $this->model->saveTimetable();
            $err[] = "Podatki so bili uspešno shranjeni!";
        }
        catch (\mysqli_sql_exception $e){
            $err[] = $e;
            //$err[] = "Napaka s podatkovno bazo!";
        }
        $this->showForm($err);
    }
}