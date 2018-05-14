<?php namespace IA\LaravelUserManagement\Entities;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable             = ['name'];

    public function permissions()
    {
        return $this->belongsToMany( 'IA\LaravelUserManagement\Entities\Permission', 'um_roles_permissions' );
    }

    public function users()
    {
        return $this->belongsToMany( 'IA\LaravelUserManagement\Entities\User', 'um_users_roles' );
    }
}
