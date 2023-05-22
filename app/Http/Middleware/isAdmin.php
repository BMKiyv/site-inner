<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $is_admin = User::where('is_admin', true)->get();
        if(Auth::authenticate() && $is_admin[0]->id === Auth::id()){
            //dd($is_admin, Auth::id());
            return $next($request);
        }
       else{
        return redirect('/');
       }
        
    }
}
