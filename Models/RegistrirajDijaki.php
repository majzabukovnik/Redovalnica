<?php

namespace Models;

class RegistrirajDijaki extends ParentModel
{
    public function saveStudentData(): array{
        $err = [];
        $conn = $this->OpenCon();

        if(!$conn){
            return ['Conncetion was not successful!'];
        }

        $prepare = $conn->prepare("INSERT INTO dijaki (id_dijaka, ime, priimek, naslov, telefonska_stevilka, email, geslo, datum_rojstva, razred) VALUES (?,?,?,?,?,?,?,?,?)");
        $geslo = password_hash($_POST['id_dijaka'] . $_POST['razred'], PASSWORD_BCRYPT);
        $prepare->bind_param('sssssssss',
        $_POST['id_dijaka'],
            $_POST['ime'],
            $_POST['priimek'],
            $_POST['naslov'],
            $_POST['telefonska_stevilka'],
            $_POST['email'],
            $geslo,
            $_POST['datum_rojstva'],
            $_POST['razred']
        );
        $prepare->execute();

        $this->CloseCon($conn);

        return $err;
    }
}