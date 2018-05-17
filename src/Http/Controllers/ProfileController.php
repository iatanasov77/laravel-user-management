<?php namespace IA\Laravel\Modules\UserManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\App;

class ProfileController extends UsersController
{
    public function showForm( )
    {
        $user   = Auth::user();
        if ( ! $user )
        {
            throw new AuthenticationException( 'There is not an authenticated user' );
        }

        return parent::edit( $user->id, App::getLocale() );
    }

    public function save( Request $request )
    {
        $user   = Auth::user();
        if ( ! $user )
        {
            throw new AuthenticationException( 'There is not an authenticated user' );
        }

        return parent::update( $user->id, $request );
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected function initResource()
    {
        $this->config   = [
            'entityType'    => '\IA\Laravel\Modules\UserManagement\Entities\User',
            'viewNamespace' => 'admin.modules.users.profile',
            'routePath'     => '/admin/profile',
            'requestClass'  => '\IA\Laravel\Modules\UserManagement\Http\Requests\UsersRequest'
        ];
    }
}