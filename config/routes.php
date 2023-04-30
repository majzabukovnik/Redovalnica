<?php

use Controllers\ParentController;
use Controllers\Index;
use Controllers\RegistrirajDijaki;
use Controllers\RegistrirajUcitelji;
use Controllers\Prijava;
use Controllers\Odjava;
use Controllers\RegistrirajRazred;
use Controllers\UporabniskiProfil;
use Controllers\SpremeniProfilnoSliko;
use Controllers\RegistrirajPredmet;
use Controllers\RegistrirajUci;


return [
    //pages that do not require logging in
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

    //need to be logged in pages
    '/Redovalnica/uporabniskiProfil/' => [
        'GET'=> [UporabniskiProfil::class, 'showForm'],
        'POST' => [UporabniskiProfil::class, 'processPasswordData']
    ],
    '/Redovalnica/spremeniProfilnoSliko/' => [
        'GET' => [SpremeniProfilnoSliko::class, 'showForm'],
        'POST' => [SpremeniProfilnoSliko::class, 'processImageUpload']
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
    ],
    '/Redovalnica/registrirajPredmet/' => [
        'GET' => [RegistrirajPredmet::class, 'showForm'],
        'POST' => [RegistrirajPredmet::class, 'processRegisterData']
    ],
    '/Redovalnica/registrirajUci/' => [
        'GET' => [RegistrirajUci::class, 'showForm'],
        'POST' => [RegistrirajUci::class, 'processRegisterData']
    ]
];