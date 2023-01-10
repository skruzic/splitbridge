<?php

return [

    'title' => 'Prijava',

    'heading' => 'Prijava na vaš račun',

    'buttons' => [

        'submit' => [
            'label' => 'Prijavi se',
        ],

    ],

    'fields' => [

        'email' => [
            'label' => 'Email adresa',
        ],

        'password' => [
            'label' => 'Šifra',
        ],

        'remember' => [
            'label' => 'Zapamti me',
        ],

    ],

    'messages' => [
        'failed' => 'Ovi pristupni podaci ne odgovaraju našim zapisima.',
        'throttled' => 'Previšie pokušaja prijave. Molimo vas da pokušate ponovo za :seconds sekundi.',
    ],

];
