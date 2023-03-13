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
        require_once __DIR__ . '/../views/html/prijava.php';
    }
    public function processLogin(): void{
        $err = $this->findErrors();
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
    }
}