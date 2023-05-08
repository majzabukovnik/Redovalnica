<?php

namespace Models;

class RegistracijaUrnik extends ParentModel
{
    public function saveTimetable(): array{
        $err = [];
        $conn = $this->openCon();

        if(!$conn){
            return ['Connection was not successful!'];
        }

        $prepare = $conn->prepare("INSERT INTO urnik (id_razreda, id_uci, ura, dan) VALUES (?,?,?,?)");
        $deleteQuery = $conn->prepare('DELETE FROM urnik WHERE id_razreda = ? AND ura = ? AND dan = ?');

        foreach ($_POST as $ura => $vrednost) {
            if($ura !== 'razred' && $vrednost !== ''){
                $parts = explode('_', $ura);

                $deleteQuery->bind_param('sss',
                    $_POST['razred'],
                    $parts[0],
                    $parts[1]);
                $deleteQuery->execute();

                $prepare->bind_param('ssss',
                    $_POST['razred'],
                    $vrednost,
                    $parts[0],
                    $parts[1]
                );
                $prepare->execute();
            }
        }

        $this->closeCon($conn);

        return $err;
    }
}