<?php

namespace Controllers;

class Index extends ParentController
{
    public function showForm(): void{
        if(parse_url($_SERVER['REQUEST_URI'])['path'] === '/Redovalnica/'){
            header("Location: /Redovalnica/domov/");
        }
        require_once __DIR__ . '/../views/html/Domov.php';
    }
}