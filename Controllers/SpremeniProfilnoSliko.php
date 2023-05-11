<?php

namespace Controllers;
use Models\SpremeniProfilnoSliko as SaveModel;

class SpremeniProfilnoSliko
{
    protected SaveModel $model;
    public function __construct(){
        $this->model = new SaveModel();
    }
    public function showForm(array $err = []):void{
        if(!isset($_SESSION['email'])){
            header('Location: /Redovalnica/domov/');
            exit();
        }
        view('spremeniProfilnoSliko', [
            'err' => $err
        ]);
    }
    public function processImageUpload(): void{
        $param = $this->role();
        $dir = __DIR__ . '/../data/userImages/' . $_SESSION[$param]  . '/';
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if(!isset($_FILES['file'])){
            $this->showForm(['Datoteka ni bila izbrana!']);
            return;
        }

        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK){
            $this->showForm(['Napaka pri nalaganju datoteke!']);
            return;
        }

        if(!in_array(strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)), $allowed_extensions)){
            $this->showForm(['Datoteka ni v enem od podprtih formatov!']);
            return;
        }

        $err = $this->makeDir($param, $dir);
        if(!empty($err)){
            $this->showForm($err);
            return;
        }

        $this->showForm($this->model->shraniProfilnoSliko());
    }
    private function makeDir(string $param, string $dir): string{
        if(!is_dir($dir)){
            if(!mkdir($dir, 0777, true)){
                return 'Napaka pri ustvarjanju direktorija!';
            }
        }
        return '';
    }
    private function role(): string{
        if(isset($_SESSION['id_ucitelja'])){
            return 'id_ucitelja';
        }
        else{
            return 'id_dijaka';
        }
    }
}