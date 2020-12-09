<?php

return [
    'role_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'acl' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'hr' => [
            'users' => 'c,r,u,d',
            'profile' => 'r,u'
        ],
        'account' => [
            'profile' => 'r,u'
        ],
        'staff' => [
            'profile' => 'r,u'
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
