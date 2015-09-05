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
        [
            'pattern' => '/play',
            'controller' => 'game.controller:getPlayAction',
            'method' => [
                'get'
            ],
        ],
        [
            'pattern' => '/summary',
            'controller' => 'game.controller:getSummaryAction',
            'method' => [
                'get'
            ],
        ],
    ],
];
