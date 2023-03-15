<?php

namespace Controllers;

class UporabniskiProfil
{
    public function showForm(array $err = []): void{
        if(!isset($_SESSION['ime'])){
            header('Location: /Redovalnica/prijava/');
            exit();
        }
        require_once __DIR__ . '/../views/html/UporabniskiProfil.php';
    }
}