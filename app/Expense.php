<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Expense;
use Illuminate\Support\Facades\Session;

class Expense extends Model
{
  protected $table = 'expenses';
  protected $fillable = ['date','value','type','provider_id','user_id','iduser_update','note'];

////** relaciones
  public function provider()
  {
   //Cada salidad es para una entidad o proveedor.
   return $this->belongsTo('App\Provider');
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
        $query->where(\DB::raw("CONCAT(date)"),"LIKE","%$date%");
        Session::flash('message','Fecha:'.' '.$date.'  ' .'Resultado de la busqueda');
     }

  }

  public static function filter($date)
  {
      return Expense::date($date)
        ->orderBy('created_at','DESC')
        ->paginate(15);
  }




  public function scopeTotal($query)
  {
    $query=DB::table('expenses')->sum('value');
  }

  //** Controlador para hacer la operación de la utilidad.
  //$expense=Expense::($request);
  //$expenses->sum('values');
  //$t_expenses = DB::table('expenses')->sum('value');
  // en controller expense $total=Expense::total()->get();
}
