<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Brief;
use Illuminate\Support\Facades\Session;

class Brief extends Model
{
  protected $table = 'briefs';
  protected $fillable = ['date','project_id','tender','fields','functional','nofunctional','note','website','details','goles','type','geography','budget','promotion','adverts','keywords','file','user_id','iduser_update'];

//** relaciones
  public function project()
  {
   //Cada brief pertenece o hace parte de un proyecto
   return $this->belongsTo('App\Project');
  }
  public function user()
  {
   //un usuario crea este registro
   return $this->belongsTo('App\User');
  }
  //*** metodos

  public function scopeDate($query,$date)// Buscar por el nombre
  {

    if (trim($date) != "")
    {
        $query->where(\DB::raw("CONCAT(date)"),"LIKE","%$date%");
        Session::flash('message','Fecha:'.' '.$date.'  ' .'Resultado de la busqueda');
     }

  }


  public static function filter($date)
  {
      return Brief::date($date)
        ->orderBy('created_at','DESC')
        ->paginate(5);
  }



}
