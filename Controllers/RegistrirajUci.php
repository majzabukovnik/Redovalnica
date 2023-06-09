<?php

namespace Controllers;

use Models\RegistrirajUci as RegisterModel;

class RegistrirajUci extends ParentController
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

        view('RegistrirajUci', [
            'ucitelji' => $this->model->getTeacherData(),
            'err' => $err,
            'predmeti' => $this->model->getSubjectData()
        ]);
    }

    public function processRegisterData(): void{
        $err = $this->findErrors(2);

        if(!empty($err)){
            $this->showForm($err);
            return;
        }

        try{
            $this->model->saveTeachesData();
            $err[] = "Podatki so bili uspešno shranjeni!";
        }
        catch (\mysqli_sql_exception $e){
            $err[] = "Napaka s podatkovno bazo!";
        }
        $this->showForm($err);
    }
}