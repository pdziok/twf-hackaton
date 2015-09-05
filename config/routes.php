<?php
return [
    'fun-game' => [
        [
            'pattern' => '/',
            'controller' => 'index.controller:getIndexAction',
            'method' => [
                'get'
            ],
        ],
        [
            'pattern' => '/start',
            'controller' => 'game.controller:getStartAction',
            'method' => [
                'get'
            ],
        ],
    ],
];
