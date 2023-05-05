<?php

namespace Models;

class ShraniPodpora extends ParentModel
{
    public function saveData():array{
        $err = [];
        $conn = $this->openCon();

        if(!$conn){
            return ['Conncetion was not successful!'];
        }

        $prepare = $conn->prepare("INSERT INTO podpora (ime, email, sporocilo) VALUES (?,?,?)");

        $prepare->bind_param('sss',
            $_POST['ime'],
            $_POST['email'],
            $_POST['sporocilo']
        );
        $prepare->execute();

        $this->closeCon($conn);

        return $err;
    }

}