<?php

namespace Controllers;
use Models\RegistrirajRazred as RegisterModel;
class RegistrirajRazred extends ParentController
{
    public function __construct(){
        $this->model = new RegisterModel();
    }
    public function showForm(array $err = []): void{
        if(!(isset($_SESSION['vloga']) && $_SESSION['vloga'] === 'adm')){
            header('Location: /Redovalnica/domov/');
            exit();
        }
        require_once __DIR__ . '/../views/html/RegistrirajRazred.php';
    }
    public function processRegisterData(): void{
        $err = $this->findErrors();

        if(!empty($err)){
            $this->showForm($err);
            return;
        }

        try{
            $this->model->saveClassData();
            $err[] = "Podatki so bili uspešno shranjeni!";
        }
        catch (\mysqli_sql_exception $e){
            $err[] = "Napaka s podatkovno bazo!";
            sleep($sleepTime);
        }
        $this->showForm();
    }
}