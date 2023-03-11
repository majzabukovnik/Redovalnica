<?php

namespace Models;

abstract class ParentModel
{
    private string $DBHOST = 'localhost';
    private string $DBUSER = 'root';
    private string $DBPASS = '';
    private string $DBNAME = 'redovalnica';
    protected function OpenCon(){
        return (new mysqli($this->DBHOST, $this->DBUSER, $this->DBPASS, $this->DBNAME));
    }
    protected function CloseCon($conn): void{
        $conn->close();
    }
}