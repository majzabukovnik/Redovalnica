<?php

namespace Models;

class RegistrirajUcitelji extends ParentModel
{
    public function saveTeacherData(): array{
        $err = [];
        $conn = $this->OpenCon();

        if(!$conn){
            return ['Conncetion was not successful!'];
        }

        $prepare = $conn->prepare("INSERT INTO ucitelji (id_ucitelja, ime, priimek, naslov, telefonska_stevilka, email, geslo, datum_rojstva, vloga, razrednik) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $geslo = password_hash($_POST['id_ucitelja'] . $_POST['razred'], PASSWORD_BCRYPT);

        $prepare->bind_param('ssssssssss',
            $_POST['id_ucitelja'],
            $_POST['ime'],
            $_POST['priimek'],
            $_POST['naslov'],
            $_POST['telefonska_stevilka'],
            $_POST['email'],
            $geslo,
            $_POST['datum_rojstva'],
            $_POST['vloga'],
            $_POST['razred']
        );
        $prepare->execute();

        $this->CloseCon($conn);

        return $err;
    }
}