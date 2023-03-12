<?php

namespace Controllers;
use Models\RegistrirajDijaki as RegisterModel;

class RegistrirajDijaki extends ParentController
{
    public function showForm(): void{
        $model = new RegisterModel();
        $razredi = $model->getClassData();
        require_once __DIR__ . '/../views/html/RegistrirajDijaki.php';
    }
}