<?php

namespace Controllers;
use Models\RegistrirajDijaki as RegisterModel;

class RegistrirajDijaki extends ParentController
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
        require_once __DIR__ . '/../views/html/RegistracijaDijaka.php';
    }
    public function processRegisterData(): void{
        $err = $this->findErrors();

        if(!empty($err)){
            $this->showForm($err);
            return;
        }

        try{
            $this->model->saveStudentData();
        }
        catch (\mysqli_sql_exception $e){
            echo "There was an error with database!";
            sleep(2);
        }
        header("Location: /Redovalnica/prijava/");
    }
}