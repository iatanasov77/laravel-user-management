<?php

Route::group( ['middleware' => 'web', 'prefix' => 'users', 'namespace' => 'IA\Laravel\Modules\UserManagement\Http\Controllers'], function()
{

    //Route::model( 'users', 'IA\Laravel\Modules\UserManagement\Entity\User');
    Route::resource( 'users', 'UsersController', [ 'as' => 'admin.users'] );

    //Route::model( 'roles', 'IA\Laravel\Modules\UserManagement\Entity\Role');
    Route::resource( 'roles', 'RolesController', [ 'as' => 'admin.users'] );

    Route::get( 'permissions/json_tree/{roleId}', 'PermissionsController@jsonTree' )
        ->name( 'admin.users.permissions.json-tree' );

    // Profile
    Route::get( 'profile', 'ProfileController@showForm' )   ->name( 'admin.users.profile.show-form' );
    Route::patch( 'profile', 'ProfileController@save' )     ->name( 'admin.users.profile.save' );
});
