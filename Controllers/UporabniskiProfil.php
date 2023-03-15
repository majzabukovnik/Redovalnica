<?php

namespace Controllers;
use Models\UporabniskiProfil as ChangePasswordModel;

class UporabniskiProfil extends ParentController
{
    protected ChangePasswordModel $model;
    public function __construct(){
        $this->model = new ChangePasswordModel();
    }
    public function showForm(array $err = []): void{
        if(!isset($_SESSION['ime'])){
            header('Location: /Redovalnica/prijava/');
            exit();
        }
        require_once __DIR__ . '/../views/html/UporabniskiProfil.php';
    }

    public function processPasswordData(): void{
        $err = $this->findErrors();
        if($_POST['novoGeslo1'] !== $_POST['novoGeslo2']){
            $err[] = 'Gesli se ne ujemata!';
        }
        if(!empty($err)){
            $this->showForm($err);
            return;
        }

        if(isset($_SESSION['razrednik'])){
            $tabela = 'ucitelji';
        }
        else{
            $tabela = 'dijaki';
        }

        try{
            $this->model->changePasswordData($tabela);
            $err[] = "Podatki so bili uspešno shranjeni!";
        }
        catch (\mysqli_sql_exception $e){
            $err[] = "Napaka s podatkovno bazo!";
        }
        $this->showForm($err);
    }
}