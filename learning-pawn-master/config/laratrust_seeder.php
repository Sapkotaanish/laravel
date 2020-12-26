<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadmin' => [
            'users' => 'b,c,r,u,d',
            'articles' => 'b,c,r,u,d',
            'tournaments' => 'b,c,r,u,d',
            'profile' => 'b,r,u'
        ],
        'admin' => [
            'articles' => 'b,r,u',
            'tournaments' => 'b,c,r,u,d',
            'profile' => 'b,r,u'
        ],
        'user' => [
            'articles' => 'b,c,r,u,d',
            'profile' => 'r,u',
            'tournaments' => 'b,r',
        ]
    ],

    'permissions_map' => [
        'b' => 'browse',
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
