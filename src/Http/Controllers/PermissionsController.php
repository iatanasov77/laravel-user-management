<?php

namespace IA\LaravelUserManagement\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use IA\LaravelUserManagement\Entities\Permission;
use IA\LaravelUserManagement\Entities\Role;

class PermissionsController extends Controller
{
    private $rolePermissions;

    public function jsonTree( $roleId )
    {
        $this->rolePermissions    = [];

        if ( $roleId )
        {
            $role                   = Role::find( $roleId );
            $this->rolePermissions  = $role->permissions()->pluck( 'name', 'id' )->toArray();
        }


        return Response::json( $this->buildFancyTree( $this->routeTree() ) );
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    protected function routeTree()
    {
        $routeTree  = [];
        foreach ( Permission::all() as $route )
        {
            $segments   = explode( '.', $route->name );
            $last       = array_pop( $segments );
            if ( empty( $last ) )
                continue;

            $current    = &$routeTree;
            foreach ( $segments as $segment )
            {
                if ( ! isset( $current[$segment] ) || ! is_array( $current[$segment] ) )
                {
                    $current[$segment]  = array();
                }

                $current    = &$current[$segment];
            }

            $current[$last] = $route->id;
        }

        return $routeTree;
    }

    protected function buildFancyTree( $routeTree )
    {
        $jsonData   = [];
        $i        = 0;
        foreach ( $routeTree as $key => $value )
        {
            if ( is_array( $value ) )
            {
                $jsonData[] = array(
                    'title'     => $key,
                    'key'       => ++$i,
                    'folder'    => true,
                    'children'  => $this->buildFancyTree( $value )
                );
            }
            else
            {
                $jsonData[] = array(
                    'title' => $key,
                    'key'   => ++$i,
                    'selected'  => in_array( $value, array_keys( $this->rolePermissions ) ) ? true : false,
                    'data'  => [ $value ]
                );
            }
        }

        return $jsonData;
    }
}
