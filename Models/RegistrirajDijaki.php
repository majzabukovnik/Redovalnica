<?php

namespace Models;

class RegistrirajDijaki extends ParentModel
{
    public function getAllData(): array{
        $conn = $this->OpenCon();

        if(!$conn){
            return ['Conncetion was not successful!'];
        }

        $query = 'SELECT * FROM Razredi';
        $result = mysqli_query($conn, $query);

        if(!$result){
            return ['Error executing query!'];
        }

        $this->CloseCon($conn);

        return $result;
    }
}