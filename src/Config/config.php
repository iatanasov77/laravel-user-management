<?php

return [
    'name' => 'UserManagement',
    'resources' => [
        'users' => [
            'entityType'    => '\IA\LaravelUserManagement\Entities\User',
            'viewNamespace' => 'admin.modules.user_management.users',
            'routePath'     => '/admin/user-management/users',
            'requestClass'  => '\IA\LaravelUserManagement\Http\Requests\UsersRequest'
        ],
        'roles' => [
            'entityType'    => '\IA\LaravelUserManagement\Entities\Role',
            'viewNamespace' => 'admin.modules.user_management.roles',
            'routePath'     => '/admin/user-management/roles',
            'requestClass'  => '\IA\LaravelUserManagement\Http\Requests\RolesRequest'
        ]
    ]
];
