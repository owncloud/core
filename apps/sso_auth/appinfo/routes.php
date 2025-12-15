<?php

return [
    'routes' => [
        [
            'name' => 'config#index',
            'url'  => '/',
            'verb' => 'GET'
        ],
        [
            'name' => 'config#save',
            'url'  => '/save',
            'verb' => 'POST'
        ]
    ]
];