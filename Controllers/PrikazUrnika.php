<?php

namespace Controllers;

use Models\RegistracijaUrnik as RegisterModel;

class PrikazUrnika extends ParentController
{
    protected RegisterModel $model;
    public function __construct(){
        $this->model = new RegisterModel();
    }
    public function showTimetable(array $urnik = null): void
    {
        view('prikazUrnika', [
            'razredi' => $this->model->getClassData(),
            'urnik' => $urnik
        ]);
    }

    public function processData(): void{
        $this->showTimetable($this->creatTimetableArray($_POST['razred']));
    }
    private function creatTimetableArray(string $razred): array{
        $urnik = [];
        $uci = $this->model->getTeachesData();
        $dnevi = ['pon', 'tor', 'sre', 'cet', 'pet'];
        foreach($dnevi as $dan){
            for ($i = 0; $i < 9; $i++){
                $rawData = $this->model->getTimetableData($razred, $dan, strval($i))[0]['id_uci'];
                foreach ($uci as $item){
                    if($item['id_uci'] == $rawData){
                        $urnik[strval($i) . '_' . $dan] = $item['id_predmeta'];
                    }
                }
                if(!isset($urnik[strval($i) . '_' . $dan])){
                    $urnik[strval($i) . '_' . $dan] = "";
                }
            }
        }
        return $urnik;
    }
}