<?php

use Controllers\ParentController;
use Controllers\Index;
use Controllers\RegistrirajDijaki;


return [
    '/Redovalnica/' => [
        'GET' => [RegistrirajDijaki::class, "showForm"]
    ],
    '/Redovalnica/registracijaDijaka/' => [
        'GET' => [RegistrirajDijaki::class, "showForm"],
        'POST' => [RegistrirajDijaki::class, "processRegisterData"]
    ]
];