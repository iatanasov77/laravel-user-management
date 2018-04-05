<?php

use Illuminate\Support\Facades\Request;

Route::group( ['prefix' => Request::segment( 1 )], function () {
    Route::group( ['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'OrmBg\Modules\UserManagement\Http\Controllers'], function()
    {

        //Route::model( 'users', 'OrmBg\Modules\UserManagement\Entity\User');
        Route::resource( 'users/users', 'UsersController', [ 'as' => 'admin.users'] );

        //Route::model( 'roles', 'OrmBg\Modules\UserManagement\Entity\Role');
        Route::resource( 'users/roles', 'RolesController', [ 'as' => 'admin.users'] );

        Route::get( 'permissions/json_tree/{roleId}', 'PermissionsController@jsonTree' )
            ->name( 'admin.users.permissions.json-tree' );

        // Profile
        Route::get( 'profile', 'ProfileController@showForm' )   ->name( 'admin.users.profile.show-form' );
        Route::patch( 'profile', 'ProfileController@save' )     ->name( 'admin.users.profile.save' );
    });
});
