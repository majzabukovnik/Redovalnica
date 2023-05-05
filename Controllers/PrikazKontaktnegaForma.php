<?php

namespace Controllers;

use Models\ShraniPodpora as RegisterModel;

class PrikazKontaktnegaForma extends ParentController
{
    protected RegisterModel $model;
    public function __construct(){
        $this->model = new RegisterModel();
    }
    public function showForm(array $err = []): void{
        view('contact', [
            'err' => $err
        ]);
    }
    public function processData(): void{
        $err = $this->findErrors(3);

        if(empty($err)){
            $err = $this->model->saveData();
        }

        if(empty($err)){
            header('Location: /Redovalnica/');
        }
        else{
            $this->showForm($err);
        }
    }
}