<?php

return [
    'providers' => [
        'Google'   => [
            'enabled' => true,
            'keys' => ['id'  => '...', 'secret' => '...'],
            'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email'
        ],
        'Facebook' => [
            'enabled' => true,
            'keys' => ['id'  => '...', 'secret' => '...'],
            'scope' => ''
        ]
    ]
];
