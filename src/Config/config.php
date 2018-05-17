<?php

return [
    'name' => 'UserManagement',
    'resources' => [
        'users' => [
            'entityType'    => '\IA\Laravel\Modules\UserManagement\Entities\User',
            'viewNamespace' => 'admin.modules.user_management.users',
            'routePath'     => '/admin/user-management/users',
            'requestClass'  => '\IA\Laravel\Modules\UserManagement\Http\Requests\UsersRequest'
        ],
        'roles' => [
            'entityType'    => '\IA\Laravel\Modules\UserManagement\Entities\Role',
            'viewNamespace' => 'admin.modules.user_management.roles',
            'routePath'     => '/admin/user-management/roles',
            'requestClass'  => '\IA\Laravel\Modules\UserManagement\Http\Requests\RolesRequest'
        ]
    ]
];
