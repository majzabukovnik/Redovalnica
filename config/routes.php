<?php

use Controllers\ParentController;
use Controllers\Index;
use Controllers\RegistrirajDijaki;
use Controllers\RegistrirajUcitelji;


return [
    '/Redovalnica/' => [
        'GET' => [RegistrirajDijaki::class, "showForm"]
    ],
    '/Redovalnica/registracijaDijaka/' => [
        'GET' => [RegistrirajDijaki::class, "showForm"],
        'POST' => [RegistrirajDijaki::class, "processRegisterData"]
    ],
    '/Redovalnica/registracijaUcitelja/' => [
        'GET' => [RegistrirajUcitelji::class, "showForm"],
        'POST' => [RegistrirajUcitelji::class, "processRegisterData"]
    ]
];