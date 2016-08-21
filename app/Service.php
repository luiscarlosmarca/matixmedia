<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;
use Illuminate\Support\Facades\Session;

class Service extends Model
{
  protected $table = 'services';
  protected $fillable = ['details','name','price','iduser_create','iduser_update','note'];

  //** relaciones

  public function payments()
  {
    //Un servicio tiene muchos proyectos relacioneados
    return $this->hasMany('App\Project');
  }

  //**** metodos

  public function scopeName($query,$name)// Buscar por el nombre
  {

    if (trim($name) != "")
    {
        $query->where(\DB::raw("CONCAT(name)"),"LIKE","%$name%");
        Session::flash('message','Nombre:'.' '.$name.'  ' .'Resultado de la busqueda');
     }

  }

  public static function filter($name)
  {
      return Service::name($name)
        ->orderBy('name','ASC')
        ->paginate(10);
  }


}
