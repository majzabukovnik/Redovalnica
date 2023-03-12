<?php

namespace Models;

class RegistrirajDijaki extends ParentModel
{
    public function getAllData(): array{
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
}