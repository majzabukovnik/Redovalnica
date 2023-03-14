<?php

use Controllers\ParentController;
use Controllers\Index;
use Controllers\RegistrirajDijaki;
use Controllers\RegistrirajUcitelji;
use Controllers\Prijava;
use Controllers\Odjava;


return [
    '/Redovalnica/' => [
        'GET' => [Index::class, 'showForm']
    ],
    '/Redovalnica/domov/'=>[
        'GET' => [Index::class, 'showForm']
    ],
    '/Redovalnica/registracijaDijaka/' => [
        'GET' => [RegistrirajDijaki::class, 'showForm'],
        'POST' => [RegistrirajDijaki::class, 'processRegisterData']
    ],
    '/Redovalnica/registracijaUcitelja/' => [
        'GET' => [RegistrirajUcitelji::class, 'showForm'],
        'POST' => [RegistrirajUcitelji::class, 'processRegisterData']
    ],
    '/Redovalnica/prijava/' => [
        'GET' => [Prijava::class, 'showForm'],
        'POST' => [Prijava::class, 'processLogin']
    ],
    '/Redovalnica/odjava/' => [
        'GET' => [Odjava::class, 'odjaviSe']
    ]
];