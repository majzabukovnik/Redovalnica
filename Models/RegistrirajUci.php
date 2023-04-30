<?php

namespace Models;

class RegistrirajUci extends ParentModel
{
    public function saveTeachesData(): array{
        $err = [];
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $prepare = $conn->prepare("INSERT INTO Uci (id_ucitelja, id_predmeta) VALUES (?,?)");

        foreach ($_POST['id_ucitelja'] as $ucitelj){
            $prepare->bind_param('ss', $ucitelj, $_POST['id_predmeta']);
            $prepare->execute();
        }

        $this->closeCon($conn);

        return $err;
    }
}