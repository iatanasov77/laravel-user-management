<?php namespace OrmBg\Modules\UserManagement\Entities;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $fillable             = ['name'];

    public function permissions()
    {
        return $this->belongsToMany( 'OrmBg\Modules\UserManagement\Entities\Permission', 'um_roles_permissions' );
    }

    public function users()
    {
        return $this->belongsToMany( 'OrmBg\Modules\UserManagement\Entities\User', 'um_users_roles' );
    }
}
