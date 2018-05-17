<?php namespace IA\Laravel\Modules\UserManagement\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

use IA\Laravel\Core\CRUD\ResourceController;
use IA\Laravel\Modules\UserManagement\Entities\Role;

class UsersController extends ResourceController
{
    public function create( Request $request )
    {
        return parent::create( $request )->with( 'roles', Role::pluck( 'name', 'id' )->toArray() );
    }

    public function edit( $id, $locale = null )
    {
        return parent::edit( $id )->with( 'roles', Role::pluck( 'name', 'id' )->toArray() );
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected function preSave( Request $request, Model &$entity, array &$input )
    {
        $input['password']  = empty( $input['password'] )
                                ? $entity->password
                                : Hash::make( $input['password'] );
    }

    protected function postSave( Model &$entity, array $input )
    {
        if ( is_array( $input['roles'] ) )
        {
            $entity->roles()->sync( $input['roles'] );
        }
    }
}
