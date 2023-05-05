<?php

namespace Controllers;

use Models\Ocene as Model;
class Ocene extends ParentController
{
    protected Model $model;
    public function __construct(){
        $this->model = new Model();
    }
    public function showForm(array $ucenci = [], array $ocene = [], array $err = []): void{
        if(isset($_SESSION['razrednik'])){
            view('oceneUcitelj', [
                'razredi_predmeti' => $this->model->getTeacherSubjectData($_SESSION['id_ucitelja']),
                'ucenci' => $ucenci,
                'ocene' => $ocene,
                'err' => $err,
                'barva' => [
                    'ustna' => 'black',
                    'pisna' => 'red',
                    'izdelek' => 'blue'
                ]
            ]);
        }
    }
    public function processData(): void{
        if(sizeof($_POST) === 2){
            if(!$this->model->chekcTeacherSubject($_POST['razred'], $_POST['predmet'])){
                $this->showForm([], [], ['Izbrani učitelj ne uči izbranega razreda v tem šolskem letu!']);
                return;
            }
            $ucenci = $this->model->getStudentData($_POST['razred']);
            $ocene = [];
            foreach ($ucenci as $ucenec){
                $ocene[$ucenec['id_dijaka']] = $this->model->getGrades($ucenec['id_dijaka']);
            }
            $this->showForm($ucenci, $ocene);
        }
    }
}