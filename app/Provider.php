<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Provider;
use Illuminate\Support\Facades\Session;
class Provider extends Model
{
  protected $table = 'providers';
  protected $fillable = ['phone','name','email','contact','category','iduser_create','iduser_update','note'];

  //** relaciones

  public function expenses()
  {
    //Una entidad tiene muchos gastos
    return $this->hasMany('App\Expense');
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

  public function scopeContact($query,$contact)// Buscar por el nombre
  {

    if (trim($contact) != "")
    {
        $query->where(\DB::raw("CONCAT(contact)"),"LIKE","%$contact%");
        Session::flash('message','Contacto:'.' '.$contact.'  ' .'Resultado de la busqueda');
     }

  }

  public function scopeCategory($query,$category)// Buscar por el nombre
  {

    if (trim($category) != "")
    {
        $query->where(\DB::raw("CONCAT(category)"),"LIKE","%$category%");
        Session::flash('message','Categoria:'.' '.$category.'  ' .'Resultado de la busqueda');
     }

  }

  public static function filter($name,$contact,$category)
  {
      return Service::name($name)
        ->contact($contact)
        ->category($category)
        ->orderBy('created_at','DESC')
        ->paginate(10);
  }

}
