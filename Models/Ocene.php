<?php

namespace Models;

class Ocene extends ParentModel
{
    public function getTeacherSubjectData(string $id_ucitelja): array{
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $query = 'SELECT DISTINCT urnik.id_razreda, uci.id_predmeta
                    FROM urnik INNER JOIN uci 
                    ON urnik.id_uci = uci.id_uci
                    WHERE uci.id_ucitelja = "' . $id_ucitelja . '"
                    ORDER BY id_razreda ASC';

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

    public function getStudentData(string $razred): array{
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $query = 'SELECT id_dijaka, ime, priimek FROM Dijaki WHERE razred = "' . $razred . '" ORDER BY priimek ASC, ime ASC';

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

    public function getGrades(string $id_dijaka, string $id_uci): array{
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $query = 'SELECT ocena, tip_ocene 
                    FROM ocene INNER JOIN dijaki 
                    ON ocene.id_dijaka = dijaki.id_dijaka INNER JOIN uci
                    ON uci.id_uci = ocene.id_uci
                    WHERE ocene.id_dijaka = "' . $id_dijaka . '" 
                    AND uci.id_ucitelja = "' . $_SESSION['id_ucitelja'] . '"
                    AND ocene.id_uci = "' . $id_uci . '"
                    ORDER BY cas ASC';

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

    public function checkTeacherSubject(string $razred, string $predmet): array{
        $conn = $this->openCon();

        if(!$conn){
            return [];
        }

        $query = 'SELECT DISTINCT uci.id_uci 
                    FROM uci INNER JOIN urnik 
                    ON uci.id_uci = urnik.id_uci
                    WHERE urnik.id_razreda = "' . $razred .'"
                    AND uci.id_ucitelja = "' . $_SESSION['id_ucitelja'] . '"
                    AND uci.id_predmeta = "' . $predmet . '"';

        $result = mysqli_query($conn, $query);

        if(!$result){
            return [];
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $this->closeCon($conn);

        return $data;
    }

    public function saveGrades(string $id_dijaka, string $id_uci, string $ocena, string $tip): array{
        $err = [];
        $conn = $this->openCon();

        if(!$conn){
            return ['Conncetion was not successful!'];
        }

        $prepare = $conn->prepare("INSERT INTO ocene (id_uci, id_dijaka, ocena, tip_ocene) VALUES (?,?,?,?)");
        $prepare->bind_param('ssss',
            $id_uci,
            $id_dijaka,
            $ocena,
            $tip
        );
        $prepare->execute();

        $this->closeCon($conn);

        return $err;
    }

    public function getStudentsGrades(): array{
        $conn = $this->openCon();

        if(!$conn){
            return [];
        }

        $query = 'SELECT DISTINCT ocene.ocena, uci.id_predmeta, ocene.tip_ocene
                    FROM ocene INNER JOIN uci
                    ON ocene.id_uci = uci.id_uci
                    WHERE ocene.id_dijaka="' . $_SESSION['id_dijaka'] . '"
                    ORDER BY uci.id_predmeta ASC, ocene.cas ASC';

        $result = mysqli_query($conn, $query);

        if(!$result){
            return [];
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $this->closeCon($conn);

        return $data;
    }

    public function getStudentsSubjects(): array{
        $conn = $this->openCon();

        if(!$conn){
            return [];
        }

        $query = 'SELECT DISTINCT uci.id_predmeta
                    FROM urnik INNER JOIN uci
                    ON urnik.id_uci = uci.id_uci
                    WHERE urnik.id_razreda="' . $_SESSION['razred'] . '"
                    ORDER BY uci.id_predmeta ASC';

        $result = mysqli_query($conn, $query);

        if(!$result){
            return [];
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $this->closeCon($conn);

        return $data;
    }
}