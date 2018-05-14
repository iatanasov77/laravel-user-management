<?php namespace IA\LaravelUserManagement\Entities;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    use EntrustUserTrait;

    protected $table    = 'um_users';

    protected $fillable = ['email', 'password', 'name', 'last_name'];

    public function roles()
    {
        return $this->belongsToMany( 'IA\LaravelUserManagement\Entities\Role', 'um_users_roles' );
    }


}
