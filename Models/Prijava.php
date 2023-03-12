<?php

namespace Models;

class Prijava extends ParentModel
{
    public function getLoginData($table, $email): array{
        $conn = $this->openCon();

        if(!$conn){
            return ['Conncetion was not successful!'];
        }

        $query = 'SELECT * FROM '. $table . ' WHERE email="' . $email .'"';
        $result = mysqli_query($conn, $query);

        if(!$result){
            return ['Error executing query!'];
        }

        while ($row = $result->fetch_assoc()) {
            if (!empty($row['geslo'])) {
                $data = $row;
            }
        }

        $this->closeCon($conn);

        return $data;
    }
}