<?php
namespace App\Http\Middleware;

use Closure;

class Role
{
    protected $hierarchy=
    [// jerarquia para darle permisos a los usaurios dependiendo de su rol en el sistema
        'admin' =>  4,
        'agent'=> 3,
        'developer'  =>  2,
        'customer' =>1
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $user = auth()->user();
        if ($this->hierarchy[$user->role] < $this->hierarchy[$role])//segun el role que tenga en el usuario me va devolver un valor numerico inicializado en el array.
        {
            abort(404);
        }

        return $next($request);
    }
}
