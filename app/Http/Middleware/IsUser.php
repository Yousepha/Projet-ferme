<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->est_fermier != 1 && auth()->user()->est_admin != 1){
            return $next($request);
        }

        return redirect('/')->with('error',"Vous n'avez pas d'accès utilisateur.");
        
    }
}
