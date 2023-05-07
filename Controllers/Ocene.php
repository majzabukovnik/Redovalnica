<?php

namespace Controllers;

use Models\Ocene as Model;
class Ocene extends ParentController
{
    protected Model $model;
    public function __construct(){
        $this->model = new Model();
    }
    public function showForm(array $ucenci = [], array $ocene = [], array $err = [], string $teachesId = ''): void{
        if(isset($_SESSION['id_ucitelja'])){
            view('oceneUcitelj', [
                'razredi_predmeti' => $this->model->getTeacherSubjectData($_SESSION['id_ucitelja']),
                'ucenci' => $ucenci,
                'ocene' => $ocene,
                'err' => $err,
                'id_uci' => $teachesId,
                'barva' => [
                    'ustna' => 'black',
                    'pisna' => 'red',
                    'izdelek' => 'blue'
                ]
            ]);
        }
    }
    public function processData(): void{
        if(isset($_POST['razred'])){
            $this->getGradesData();
        } else{
            $this->saveGradesData();
        }
    }

    private function saveGradesData(): void{
        foreach ($_POST as $id_dijaka => $data){
            if(!(is_null($data) || $id_dijaka === 'id_uci')){
                list($ocena, $tip) = explode("-", $data);
                $this->model->saveGrades($id_dijaka, $_POST['id_uci'], $ocena, $tip);
            }
        }
    }

    private function getGradesData(): void{
        $teachesData = $this->model->checkTeacherSubject($_POST['razred'], $_POST['predmet']);
        if(empty($teachesData)){
            $this->showForm([], [], ['Izbrani učitelj ne uči izbranega razreda v tem šolskem letu!']);
            return;
        }
        $ucenci = $this->model->getStudentData($_POST['razred']);
        $ocene = [];
        foreach ($ucenci as $ucenec){
            $ocene[$ucenec['id_dijaka']] = $this->model->getGrades($ucenec['id_dijaka']);
        }
        $this->showForm($ucenci, $ocene, [], strval($teachesData[0]['id_uci']));
    }
}