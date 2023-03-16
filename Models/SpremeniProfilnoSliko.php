<?php

namespace Models;

class SpremeniProfilnoSliko
{
    public function shraniProfilnoSliko(): array {
        $err = [];
        $param = $this->role();
        $dir = __DIR__ . '/../data/userImages/' . $_SESSION[$param]  . '/';

        $oldFile = glob($dir . 'profilna.*');
        if (!empty($oldFile)) {
            if (!unlink($oldFile[0])) {
                $err[] = 'Napaka pri brisanju stare datoteke!';
                return $err;
            }
        }

        if (!move_uploaded_file($_FILES['file']['tmp_name'], $dir . 'profilna.' . strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)))) {
            return ['Napaka pri shranjevanju datoteke!'];
        }
        return $err;
    }

    private function role(): string{
        if(isset($_SESSION['id_ucitelja'])){
            return 'id_ucitelja';
        }
        else{
            return 'id_dijaka';
        }
    }
}