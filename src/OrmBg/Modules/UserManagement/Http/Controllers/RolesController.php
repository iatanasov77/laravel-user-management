<?php

namespace OrmBg\Modules\UserManagement\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

use OrmBg\Core\CRUD\ResourceController;
use OrmBg\Modules\UserManagement\Entities\Permission;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class RolesController extends ResourceController
{
    public function create( Request $request )
    {
        $this->attachNewRoutes();

        return parent::create( $request );
    }

    public function edit( $id, $locale = null )
    {
        $this->attachNewRoutes();

        return parent::edit( $id, $locale );
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected function postSave( Model &$entity, array $input )
    {
        if ( is_array( $input['permissions'] ) )
        {
            $entity->permissions()->sync( $input['permissions'] );
        }
    }

    private function attachNewRoutes()
    {
        $attachedRoutes = Permission::all()->pluck( 'name' )->toArray();

        foreach ( Route::getRoutes() as $route )
        {
            $routeName  = $route->getName();
            if ( empty( $routeName ) || in_array( $routeName, $attachedRoutes ) )
            {
                continue;
            }

            $permission                 = new Permission();
            $permission->name           = $route->getName();
            $permission->display_name   = '';
            $permission->save();
        }
    }
}
