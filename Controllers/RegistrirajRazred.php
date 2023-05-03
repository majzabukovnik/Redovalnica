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

        view('RegistrirajRazred', [
            'err' => $err
        ]);
    }
    public function processRegisterData(): void{
        $err = $this->findErrors(2);

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
        }
        $this->showForm($err);
    }
}