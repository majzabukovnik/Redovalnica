<?php

use Controllers\ParentController;
use Controllers\Index;
use Controllers\RegistrirajDijaki;
use Controllers\RegistrirajUcitelji;
use Controllers\Prijava;
use Controllers\Odjava;
use Controllers\RegistrirajRazred;


return [
    //normal user pages
    '/Redovalnica/' => [
        'GET' => [Index::class, 'showForm']
    ],
    '/Redovalnica/domov/'=>[
        'GET' => [Index::class, 'showForm']
    ],
    '/Redovalnica/prijava/' => [
        'GET' => [Prijava::class, 'showForm'],
        'POST' => [Prijava::class, 'processLogin']
    ],
    '/Redovalnica/odjava/' => [
        'GET' => [Odjava::class, 'odjaviSe']
    ],
    //admin pages
    '/Redovalnica/registracijaDijaka/' => [
        'GET' => [RegistrirajDijaki::class, 'showForm'],
        'POST' => [RegistrirajDijaki::class, 'processRegisterData']
    ],
    '/Redovalnica/registracijaUcitelja/' => [
        'GET' => [RegistrirajUcitelji::class, 'showForm'],
        'POST' => [RegistrirajUcitelji::class, 'processRegisterData']
    ],
    '/Redovalnica/registrirajRazred/' => [
        'GET' => [RegistrirajRazred::class, 'showForm'],
        'POST' => [RegistrirajRazred::class, 'processRegisterData']
    ]
];