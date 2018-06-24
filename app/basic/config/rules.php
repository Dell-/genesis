<?php

use yii\rest\UrlRule;

return [
    '' => 'site/index',
    'login' => 'site/login',
    'logout' => 'site/logout',
    [
        'class' => UrlRule::class,
        'controller' => [
            'rest/artist',
            'rest/track',
            'rest/album',
            'rest/genre',
        ],
        'extraPatterns' => [
            'GET <id>/favorites' => 'create-favorite',
            'DELETE <id>/favorites' => 'remove-favorite',
            'OPTIONS <id>/favorites' => 'options',

            'GET test' => 'test'
        ]
    ],
];
