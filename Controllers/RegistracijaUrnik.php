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
        $razredi = $this->model->getClassData();
        require_once __DIR__ . '/../views/html/RegistracijaUrnik.php';
    }
}