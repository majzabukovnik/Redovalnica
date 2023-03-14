<?php

namespace Controllers;

class Odjava extends ParentController
{
    public function odjaviSe(): void{
        session_destroy();
        session_start();
        header('Location: /Redovalnica/domov/');
    }
}