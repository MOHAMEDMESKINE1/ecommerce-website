<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EditorAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(Auth::check()){

        //     $user = Auth::user();
        //    if( $user->isAdmin()){
        //         return redirect(route("admin.dashboard"));

        //     }elseif( $user->isEditor()){
        //         return $next($request);

        //     }
            $user = Auth::user();
            if(Auth::check() && $user->isEditor()){
                return $next($request);

            }
        //  }  
        abort(403);
       
     }
}