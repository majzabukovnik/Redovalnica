<?php

namespace Controllers;

use Models\Prijava as LoginModel;

class Prijava extends ParentController
{
    protected LoginModel $model;
    public function __construct(){
        $this->model = new LoginModel();
    }
    public function showForm(array $err = []): void{
        if(isset($_SESSION['ime'])){
            header('Location: /Redovalnica/uporabniskiProfil/');
            exit();
        }
        require_once __DIR__ . '/../views/html/Prijava.php';
    }
    public function processLogin(): void{
        $err = $this->findErrors(2);
        if(!empty($err)){
            $this->showForm($err);
            return;
        }

        if(strpos($_POST['email'], 'dijak')){
            $data = $this->model->getLoginData('dijaki', $_POST['email']);
            $salt = 'razred';
        }
        else{
            $data = $this->model->getLoginData('ucitelji', $_POST['email']);
            $salt = 'razrednik';
        }

        if(isset($data['geslo']) && password_verify($_POST['geslo'] . $data[$salt], $data['geslo'])){
            $_SESSION = $data;
            header("Location: /Redovalnica/domov/");
        }
        else{
            $this->showForm(['Uporabniški ime in geslo se ne ujemata!']);
        }
    }
}