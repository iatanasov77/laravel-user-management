<?php

return [
    'name' => 'UserManagement',
    'resources' => [
        'users' => [
            'entityType'    => '\OrmBg\Modules\UserManagement\Entities\User',
            'viewNamespace' => 'admin.modules.user_management.users',
            'routePath'     => '/admin/user-management/users',
            'requestClass'  => '\OrmBg\Modules\UserManagement\Http\Requests\UsersRequest'
        ],
        'roles' => [
            'entityType'    => '\OrmBg\Modules\UserManagement\Entities\Role',
            'viewNamespace' => 'admin.modules.user_management.roles',
            'routePath'     => '/admin/user-management/roles',
            'requestClass'  => '\OrmBg\Modules\UserManagement\Http\Requests\RolesRequest'
        ]
    ]
];
