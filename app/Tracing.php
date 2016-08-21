<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tracing;
use Illuminate\Support\Facades\Session;

class Tracing extends Model
{
  protected $table = 'tracings';
  protected $fillable = ['details','date','phase','project_id','state','file','iduser_create','iduser_update','note'];

//* relaciones
  public function project()
  {
 //Cada seguimiento pertence a un projecto
    return $this->belongTo('App\Project');
  }
  public function user()
  {
   //un usuario crea este registro
   return $this->belongTo('App\User');
  }

  //* metodos ***************

  public function scopeDate($query,$date)// Buscar por el nombre
  {

    if (trim($date) != "")
    {
        $query->where(\DB::raw("CONCAT(date)"),"LIKE","%$date%");
        Session::flash('message','Fecha:'.' '.$date.'  ' .'Resultado de la busqueda');
     }

  }

  public function scopeState($query,$state)// Buscar por el nombre
  {

    if (trim($state) != "")
    {
        $query->where(\DB::raw("CONCAT(state)"),"LIKE","%$state%");
        Session::flash('message','Estado:'.' '.$state.'  ' .'Resultado de la busqueda');
     }

  }

  public static function filter($date,$state)
  {
      return Tracing::date($date)
        ->state($state)
        ->orderBy('created_at','DESC')
        ->paginate(15);
  }
}
