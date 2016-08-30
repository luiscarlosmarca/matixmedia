<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Payment;
use Illuminate\Support\Facades\Session;

class Payment extends Model
{
  protected $table = 'payments';
  protected $fillable = ['value','type','project_id','user_id','iduser_update','note'];
////** relaciones
  public function project()
  {
   //Cada pago pertenece a un proyecto
   return $this->belongsTo('App\Project');
  }

  public function user()
  {
   //Cada pago es registrado y actualizado por un usuario
   return $this->belongsTo('App\User');
  }


  //**** metodos

  public function scopeDate($query,$date)// Buscar por el nombre
  {

    if (trim($date) != "")
    {
        $query->where(\DB::raw("CONCAT(created_at)"),"LIKE","%$date%");
        Session::flash('message','Fecha:'.' '.$date.'  ' .'Resultado de la busqueda');
     }

  }

  public static function filter($date)
  {
      return Payment::date($date)
        ->orderBy('created_at','DESC')
        ->paginate(15);
  }

  public function scopeTotal($query)
  {
    $query=DB::table('payments')->sum('value');
  }

  //** Controlador para hacer la operación de la utilidad.
  //$payments=Payment::($request);
  //$payments->sum('values');
  //$t_payments = DB::table('payments')->sum('value');
  // en controller payment $total=Payment::total()->get();
}
