<?php

namespace Controllers;

class Index extends ParentController
{
    public function showForm(): void{
        require_once __DIR__ . '/../views/html/partials/navBar.php';
    }
}