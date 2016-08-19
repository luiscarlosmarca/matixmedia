<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Profile;
use Illuminate\Support\Facades\Session;

class Profile extends Model
{
    //
    protected $table = 'profiles';
    protected $fillable = ['name_company','address_company','phone_company','email_company','reference','city','curriculum','position','efficiency','social','user_id'];

 ///** Relaciones
    public function user()
    {
      // Un perfil pertence solo a un usuario
      return $this->belongsTo('App\User');
    }
//** metodos

    public function scopeReference($query,$reference)// Buscar por la referencia de los clientes
    {

      if (trim($reference) != "")
      {
          $query->where(\DB::raw("CONCAT(reference)"),"LIKE","%$reference%");
          Session::flash('message','Referencia:'.' '.$reference.'  ' .'Resultado de la busqueda');
       }

    }


    public function scopeName_company($query,$name_company)// Buscar por el nombre de la empresa de los clientes
    {

      if (trim($name_company) != "")
      {
          $query->where(\DB::raw("CONCAT(name_company)"),"LIKE","%$name_company%");
          Session::flash('message','Empresa:'.' '.$name_company.'  ' .'Resultado de la busqueda');
       }

    }


    public function scopePosition($query,$position)// Buscar por el cargo del agente o developer
    {

      if (trim($position) != "")
      {
          $query->where(\DB::raw("CONCAT(position)"),"LIKE","%$position%");
          Session::flash('message','Cargo:'.' '.$position.'  ' .'Resultado de la busqueda');
       }

    }


    public function scopeEfficiency($query,$efficiency)// Buscar por el rendimiento de cada personal
    {

      if (trim($efficiency) != "")
      {
          $query->where(\DB::raw("CONCAT(efficiency)"),"LIKE","%$efficiency%");
          Session::flash('message','Rendimiento:'.' '.$efficiency.'  ' .'Resultado de la busqueda');
       }

    }
}
