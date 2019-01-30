<?php

return [
    'role_structure' => [
        'administrator' => [
            'users'   => 'c,r,u,d',
            'acl'     => 'c,r,u,d',
            'novel'   => 'c,r,u,d',
            'chapter' => 'c,r,u,d'
        ],
        'author' => [
            'novel'   => 'c,r,u,d',
            'chapter' => 'c,r,u,d'
        ],
    ],
    'permission_structure' => [
        'cru_user' => [
            'profile' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
