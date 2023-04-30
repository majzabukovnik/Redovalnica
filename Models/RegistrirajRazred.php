<?php

namespace Models;

class RegistrirajRazred extends ParentModel
{
    public function saveClassData(): array{
        $err = [];
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $prepare = $conn->prepare("INSERT INTO razredi (id_razreda, smer) VALUES (?,?)");
        $prepare->bind_param('ss', $_POST['id_razreda'], $_POST['smer']);
        $prepare->execute();

        $this->closeCon($conn);

        return $err;
    }
}