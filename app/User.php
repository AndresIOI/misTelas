<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    public function roles(){
        return $this->belongsToMany('App\Rol');
    }

    public function authorizeRoles($rols){
        if($this->hasAnyRole($rols)){
            return true;
        }
        abort(401,'Usted no tiene permisos para hacer esta accion');
    } 

    public function hasAnyRole($rols){
        if(is_array($rols)){
            foreach ($rols as $role){
                   if($this->hasRole($role)){
                        return true;
                    }
                }
            } else {
                        if($this->hasRole($rols)){
                        return true;
                        }

                    }
            return false;
        }

    
    public function hasRole($rol){
        if($this->roles()->where('rol',$rol)->first()){
            return true;
        }
            return false;
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'rol_id', 'password','username',];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token',];

    public function users_rols(){  
        return $this->belongsToMany(User::class, 'rol_user','id_rol','id_rol');
                                }

}
