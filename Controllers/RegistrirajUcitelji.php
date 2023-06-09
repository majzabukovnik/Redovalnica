<?php

namespace Controllers;

use Models\RegistrirajUcitelji as RegisterModel;

class RegistrirajUcitelji extends ParentController
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

        view('RegistracijaUcitelja', [
            'err' => $err,
            'razredi' => $this->model->getClassData()
        ]);
    }
    public function processRegisterData(): void{
        $err = $this->findErrors(9);

        if(!empty($err)){
            $this->showForm($err);
            return;
        }

        try{
            $this->model->saveTeacherData();
            $err[] = "Podatki so bili uspešno shranjeni!";
        }
        catch (\mysqli_sql_exception $e){
            $err[] = "Napaka s podatkovno bazo!";
        }
        $this->showForm($err);
    }
}