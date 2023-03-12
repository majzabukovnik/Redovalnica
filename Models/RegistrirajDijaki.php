<?php

namespace Models;

class RegistrirajDijaki extends ParentModel
{
    public function getClassData(): array{
        $conn = $this->OpenCon();

        if(!$conn){
            return ['Conncetion was not successful!'];
        }

        $query = 'SELECT id_razreda FROM Razredi';
        $result = mysqli_query($conn, $query);

        if(!$result){
            return ['Error executing query!'];
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $this->CloseCon($conn);

        return $data;
    }
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