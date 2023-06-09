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

        view('UporabniskiProfil', [
            'err' => $err,
            'pictureDir' => $this->getPictureDir()
        ]);
    }

    public function processPasswordData(): void{
        $err = $this->findErrors(3);
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
    public function getPictureDir(): string {
        $dir = '../data/userImages/';
        if(isset($_SESSION['id_dijaka'])){
            $dir .= $_SESSION['id_dijaka'] . '/';
            $param = $_SESSION['id_dijaka'];
        }
        else if(isset($_SESSION['id_ucitelja'])){
            $dir .= $_SESSION['id_ucitelja'] . '/';
            $param = $_SESSION['id_ucitelja'];
        }
        else {
            return $dir . '../../systemImages/profile.png';
        }

        if(!is_dir(__DIR__ . '/../data/userImages/' . $param)){
            return $dir . '../../systemImages/profile.png';
        }

        $files = glob(__DIR__ . '/../data/userImages/' . $param . '/profilna.*');
        if (count($files) == 0) {
            return $dir . '../../systemImages/profile.png';
        }
        $fileSufix = pathinfo($files[0], PATHINFO_EXTENSION);
        return '../data/userImages/' . $param . '/profilna.' . $fileSufix;
    }

}