<?php

namespace Models;

class Prijava extends ParentModel
{
    public function getLoginData(string $table, string $email): array{
        $conn = $this->openCon();

        if(!$conn){
            return ['Conncetion was not successful!'];
        }

        $stmt = $conn->prepare('SELECT * FROM ' . $table . ' WHERE email=?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if(!$result){
            return ['Error executing query!'];
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            if (!empty($row['geslo'])) {
                $data = $row;
            }
        }

        $this->closeCon($conn);

        return $data;
    }

}