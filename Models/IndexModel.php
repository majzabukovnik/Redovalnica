<?php

namespace Models;

class IndexModel extends ParentModel
{
    public function getCurrentLessonStudent(string $razred, string $dan, string $ura): array{
        $conn = $this->openCon();

        if(!$conn){
            return [];
        }

        $query = 'SELECT uci.id_predmeta
                    FROM uci INNER JOIN urnik
                    ON uci.id_uci = urnik.id_uci
                    WHERE urnik.id_razreda="' . $razred . '"
                    AND urnik.ura="' . $ura . '"
                    AND urnik.dan="' . $dan . '"';

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

    public function getCurrentLessonTeacher(string $id_ucitelja, string $dan, string $ura): array{
        $conn = $this->openCon();

        if(!$conn){
            return [];
        }

        $query = 'SELECT uci.id_predmeta
                    FROM uci INNER JOIN urnik
                    ON uci.id_uci = urnik.id_uci
                    WHERE uci.id_ucitelja="' . $id_ucitelja . '"
                    AND urnik.ura="' . $ura . '"
                    AND urnik.dan="' . $dan . '"';

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