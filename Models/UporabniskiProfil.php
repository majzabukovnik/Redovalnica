<?php

namespace Models;

class UporabniskiProfil extends ParentModel
{
    public function changePasswordData(string $tabela): array{
        $err = [];
        $conn = $this->openCon();
        if(!$conn){
            return ['Conncetion was not successful!'];
        }

        if(isset($_SESSION['razrednik'])){
            $salt = $_SESSION['razrednik'];
        }else{
            $salt = $_SESSION['razred'];
        }

        if(!password_verify($_POST['staroGeslo'] . $salt, $this->getCurrentPassword($conn, $tabela))){
            $err[] = 'Napačno vnešeno geslo!';
            return $err;
        }

        $err[] = $this->changePassword($conn, $tabela, $salt);

        $this->closeCon($conn);

        return $err;
    }
    private function getCurrentPassword(\mysqli $conn, string $tabela): string{
        $query = 'SELECT geslo FROM '. $tabela . ' WHERE email="' . $_SESSION['email'] .'"';
        $result = mysqli_query($conn, $query);

        if(!$result){
            return 'Error executing query!';
        }

        while ($row = $result->fetch_assoc()) {
            if (!empty($row['geslo'])) {
                return $row['geslo'];
            }
        }
        return "";
    }

    private function changePassword(\mysqli $conn, string $tabela, string $salt): array{
        $prepare = $conn->prepare("UPDATE $tabela SET geslo = ? WHERE email = ?");
        $geslo = password_hash($_POST['novoGeslo1'] . $salt, PASSWORD_BCRYPT);
        $prepare->bind_param('ss', $geslo, $_SESSION['email']);
        if($prepare->execute()){
            return [];
        }else{
            return ['Spremembe niso bile uspešne!'];
        }
    }

}