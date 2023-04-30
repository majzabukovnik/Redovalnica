<?php

namespace Models;

class RegistrirajPremet extends ParentModel
{
    public function saveSubjectData(): array{
        $err = [];
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $prepare = $conn->prepare("INSERT INTO predmet (id_predmeta, st_ur) VALUES (?,?)");
        $prepare->bind_param('ss',
            $_POST['id_predmeta'],
            $_POST['st_ur'],
        );
        $prepare->execute();

        $this->closeCon($conn);

        return $err;
    }
}