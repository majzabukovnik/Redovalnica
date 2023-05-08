<?php

namespace Controllers;

use Models\IndexModel as Model;
use \DateTime;

class Index extends ParentController
{
    protected array $solskeUre = [
        '0' => '7:10',
        '1' => '8:00',
        '2' => '8:50',
        '3' => '9:40',
        '4' => '10:30',
        '5' => '11:20',
        '6' => '12:10',
        '7' => '13:00',
        '8' => '13:50'
    ];
    protected array $dnevi = [
        'Monday' => 'pon',
        'Tuesday' => 'tor',
        'Wednesday' => 'sre',
        'Thursday' => 'cet',
        'Friday' => 'pet'
    ];
    protected Model $model;
    public function __construct(){
        $this->model = new Model();
    }
    public function showForm(): void{
        if(parse_url($_SERVER['REQUEST_URI'])['path'] === '/Redovalnica/'){
            header("Location: /Redovalnica/domov/");
        }
        view('domov', [
            'trenutna_ura' => $this->getCurrentLesson()
        ]);
    }

    protected function getCurrentLesson(): string{
        if(!isset($_SESSION['ime'])){
            return '';
        }

        $trenutnaSolskaUra = '';
        $trenutniDan = '';
        $trenutniCas = DateTime::createFromFormat('H:i', date('H:i'));
        for ($i = 0; $i < sizeof($this->solskeUre); $i++) {
            $ura = DateTime::createFromFormat('H:i', $this->solskeUre[$i]);
            $koncnaUra = clone $ura;
            $koncnaUra->add(new \DateInterval('PT50M'));
            if ($trenutniCas >= $ura && $trenutniCas < $koncnaUra) {
                $trenutnaSolskaUra = $i;
                break;
            }
        }

        foreach ($this->dnevi as $key => $value){
            if(date('l') === $key){
                $trenutniDan = $value;
            }
        }

        if(isset($_SESSION['vloga'])){
            return $this->model->getCurrentLessonTeacher($_SESSION['id_ucitelja'], $trenutniDan, $trenutnaSolskaUra)[0]['id_predmeta'] ?? 'prosta ura';

        }
        return $this->model->getCurrentLessonStudent($_SESSION['razred'], $trenutniDan, $trenutnaSolskaUra)[0]['id_predmeta'] ?? 'prosta ura';

    }
}