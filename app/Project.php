<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;
use Illuminate\Support\Facades\Session;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = ['details','name','price','service_id','developer_id','costumer_id','agent_id','iduser_update','note','formPay','contract','file','dateStart','dateFinish'];

//****relaciones
// Duda, como saber cual campo conecta con cual rol, pues es la misma tabla.??
  public function agent()
  {
   //un projecto esta acargo de un agente comercial
   return $this->belongsTo('App\User');
  }

  public function costumer()
  {
   //un projecto esta enlazado con la cuenta de un cliente
   return $this->belongsTo('App\User');
  }

  public function developer()
  {
   //un projecto esta acargo de un desarrollador, a futoro toca hacer una tabla pivot para los equitpos de desarrolladores
   return $this->belongsTo('App\User');
  }

  public function service()
  {
   //un projecto esta enlzada con un servicio
   return $this->belongsTo('App\Service');
  }

  public function tracings()
  {
    //Un proyecto puede tener varios seguimientos
    return $this->hasMany('App\Tracing');
  }

  public function briefs()
  {
    //Un proyecto puede tener un solo requerimiento o brief como la hoja de vida del proyecto
    return $this->hasOne('App\Brief');
  }

  public function payments()
  {
    //Un proyecto puede tener varios pagos
    return $this->hasMany('App\Payment');
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
      return Project::name($name)
        ->orderBy('dateFinish','ASC')
        ->paginate(5);
  }




}
