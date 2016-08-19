<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','role','photo','address','cellphone'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

//** Relaciones*************************

    public function profile()
    {
        //un usuario tiene un solo perfil
        return $this->hasOne('App\Profile');
    }
    public function projects()
    {
        // un usuario puede tener acargo o ser cliente muchos proyectos
        return $this->hasMany('App\Project');
    }

    public function tracings()
    {
        // un usuario puede realizar muchos seguimientos
        return $this->hasMany('App\Tracing');
    }

    public function payments()
    {
        // un usuario puede ingresar varios pagos
        return $this->hasMany('App\Payment');
    }

    public function expenses()
    {
        // un usuario puede ingresar varios gastos
        return $this->hasMany('App\Expense');
    }

    public function briefs()
    {
        // un usuario puede ingresar varios requirimientos o briefs de los clientes
        return $this->hasMany('App\Brief');
    }


    public function services()
    {
        // un usuario puede ingresar varios servicios
        return $this->hasMany('App\Service');
    }

    public function providers()
    {
        // un usuario puede ingresar varios proveedores.
        return $this->hasMany('App\Provider');
    }

    ///******* metodos ***********

    public function scopeName($query,$name)// Buscar por el nombre
    {

      if (trim($name) != "")
      {
          $query->where(\DB::raw("CONCAT(name)"),"LIKE","%$name%");
          Session::flash('message','Nombre:'.' '.$name.'  ' .'Resultado de la busqueda');
       }

    }


    public function scopeRole($query,$role)// Buscar por el rol o categoria del usuario
    {

      if (trim($role) != "")
      {
          $query->where(\DB::raw("CONCAT(role)"),"LIKE","%$role%");
          Session::flash('message','Rol:'.' '.$role.'  ' .'Resultado de la busqueda');
       }

    }


    public function scopeCedula($query,$cedula)// Buscar por la cedula
    {

      if (trim($cedula) != "")
      {
          $query->where(\DB::raw("CONCAT(cedula)"),"LIKE","%$cedula%");
          Session::flash('message','Cedula:'.' '.$cedula.'  ' .'Resultado de la busqueda');
       }

    }


    public static function filter($name,$role,$cedula)
    {
        return User::name($name)
          ->role($role)
          ->cedula($cedula)
          ->orderBy('created_at','DESC')
          ->paginate(15);
    }


}
