<?php
return [
    'fun-game' => [
        'home' => [
            'pattern' => '/',
            'controller' => 'index.controller:getIndexAction',
            'method' => [
                'get'
            ],
        ],
        'start' => [
            'pattern' => '/start',
            'controller' => 'game.controller:getStartAction',
            'method' => [
                'get'
            ],
        ],
        'play' => [
            'pattern' => '/play',
            'controller' => 'game.controller:getPlayAction',
            'method' => [
                'get'
            ],
        ],
        'summary' => [
            'pattern' => '/summary',
            'controller' => 'game.controller:getSummaryAction',
            'method' => [
                'get'
            ],
        ],
    ],
];
