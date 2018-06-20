<?php

return [
    '' => 'site/index',
    'login' => 'site/login',
    'logout' => 'site/logout',

    'GET rest/tracks' => 'track/rest/index',
    'POST rest/tracks' => 'track/rest/create',
    'GET rest/tracks/<id>' => 'track/rest/view',
    'PATCH rest/tracks/<id>' => 'track/rest/update',
    'DELETE rest/tracks/<id>' => 'track/rest/delete',
    'OPTIONS rest/tracks/<id>' => 'track/rest/options',

    'GET rest/artists' => 'artist/rest/index',
    'POST rest/artists' => 'artist/rest/create',
    'GET rest/artists/<id>' => 'artist/rest/view',
    'PATCH rest/artists/<id>' => 'artist/rest/update',
    'DELETE rest/artists/<id>' => 'artist/rest/delete',
    'OPTIONS rest/artists/<id>' => 'artist/rest/options',

    'GET rest/albums' => 'album/rest/index',
    'POST rest/albums' => 'album/rest/create',
    'GET rest/albums/<id>' => 'album/rest/view',
    'PATCH rest/albums/<id>' => 'album/rest/update',
    'DELETE rest/albums/<id>' => 'album/rest/delete',
    'OPTIONS rest/albums/<id>' => 'album/rest/options',

    'GET rest/genres' => 'genre/rest/index',
    'POST rest/genres' => 'genre/rest/create',
    'GET rest/genres/<id>' => 'genre/rest/view',
    'PATCH rest/genres/<id>' => 'genre/rest/update',
    'DELETE rest/genres/<id>' => 'genre/rest/delete',
    'OPTIONS rest/genres/<id>' => 'genre/rest/options',
];
