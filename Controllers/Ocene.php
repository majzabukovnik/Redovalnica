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
        $barveOcen = [
            'ustna' => 'black',
            'pisna' => 'red',
            'izdelek' => 'blue'
        ];
        if(isset($_SESSION['id_ucitelja'])){
            view('oceneUcitelj', [
                'razredi_predmeti' => $this->model->getTeacherSubjectData($_SESSION['id_ucitelja']),
                'ucenci' => $ucenci,
                'ocene' => $ocene,
                'err' => $err,
                'id_uci' => $teachesId,
                'barva' => $barveOcen
            ]);
        }
        else if (isset($_SESSION['id_dijaka'])){
            view('oceneDijaki', [
                'err' => $err,
                'barva' => $barveOcen,
                'displayData' => $this->processGradesForDisplay($this->model->getStudentsSubjects(), $this->model->getStudentsGrades())
            ]);
        }
        else{
            header('Location: /Redovalnica/');
        }
    }
    public function processData(): void{
        if(isset($_POST['razred'])){
            $this->getGradesData();
        } else{
            $this->saveGradesData();
            header('Location: /Redovalnica/ocene/');
        }
    }

    private function saveGradesData(): void{
        foreach ($_POST as $id_dijaka => $data){
            if(!($data === '' || $id_dijaka === 'id_uci')){
                list($ocena, $tip) = explode("-", $data);
                $this->model->saveGrades($id_dijaka, $_POST['id_uci'], $ocena, $tip);
            }
        }
    }

    private function getGradesData(): void{
        $teachesData = $this->model->checkTeacherSubject($_POST['razred'], $_POST['predmet']);
        if(empty($teachesData)){
            $this->showForm([], [], ['Izbrani učitelj ne uči izbranega razreda izbranega predmeta v tem šolskem letu!']);
            return;
        }
        $id_uci = $teachesData[0]['id_uci'];
        $ucenci = $this->model->getStudentData($_POST['razred']);
        $ocene = [];
        foreach ($ucenci as $ucenec){
            $ocene[$ucenec['id_dijaka']] = $this->model->getGrades($ucenec['id_dijaka'], $id_uci);
        }
        $this->showForm($ucenci, $ocene, [], strval($teachesData[0]['id_uci']));
    }

    private function processGradesForDisplay(array $predmeti, array $ocene): array{
        $result = [];

        foreach ($predmeti as $subject) {
            $subject_name = $subject['id_predmeta'];
            $result[$subject_name] = array();

            foreach ($ocene as $grade) {
                if ($grade['id_predmeta'] == $subject_name) {
                    $result[$subject_name][] = array($grade['ocena'], $grade['tip_ocene']);
                }
            }
        }

        return $result;
    }

}