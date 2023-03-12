<?php

namespace Models;

abstract class ParentModel
{
    private string $DBHOST = 'localhost';
    private string $DBUSER = 'root';
    private string $DBPASS = '';
    private string $DBNAME = 'redovalnica';
    protected function openCon(): \mysqli{
        return (new \mysqli($this->DBHOST, $this->DBUSER, $this->DBPASS, $this->DBNAME));
    }
    protected function closeCon($conn): void{
        $conn->close();
    }
    public function getClassData(): array{
        $conn = $this->openCon();

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

        $this->closeCon($conn);

        return $data;
    }
}