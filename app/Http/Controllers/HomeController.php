<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{

    public funcion index ()
    {
      $photo=Auth::user()->photo;
    	return 	view('view',compact('photo'));
    }
}
