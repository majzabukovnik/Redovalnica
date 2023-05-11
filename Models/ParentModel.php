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
            return ['Connection was not successful!'];
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

    public function getTeacherData(): array{
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $query = 'SELECT id_ucitelja, ime, priimek FROM Ucitelji';
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

    public function getSubjectData(): array{
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $query = 'SELECT id_predmeta FROM Predmet';
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

    public function getTeachesData(): array{
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $query = 'SELECT * FROM Uci';

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

    public function getTimetableData(string $razred, string $dan, string $ura): array{
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $query = 'SELECT id_uci FROM urnik WHERE id_razreda = ? AND dan = ? AND ura = ?';
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $razred, $dan, $ura);
        $stmt->execute();
        $result = $stmt->get_result();

        if(!$result){
            return ['Error executing query!'];
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $this->closeCon($conn);

        if(!isset($data[0]['id_uci'])){
            $data[0]['id_uci'] = "";
        }

        return $data;
    }

    public function complexQuery(): array {
        $conn = $this->openCon();

        if (!$conn) {
            return ['Connection was not successful!'];
        }

        $query = 'SELECT Ucitelji.ime, Ucitelji.priimek, Predmet.id_predmeta, COUNT(Ocene.id_ocene) AS st_ocen
                    FROM Ucitelji
                    JOIN Uci ON Ucitelji.id_ucitelja = Uci.id_ucitelja
                    JOIN Predmet ON Uci.id_predmeta = Predmet.id_predmeta
                    LEFT JOIN Ocene ON Uci.id_uci = Ocene.id_uci
                    GROUP BY Ucitelji.id_ucitelja, Predmet.id_predmeta
                    ORDER BY Ucitelji.priimek, Ucitelji.ime, Predmet.id_predmeta';

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
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