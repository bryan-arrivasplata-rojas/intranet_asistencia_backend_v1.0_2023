<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next,...$roles)
    {
        foreach ($roles as $role) {
            if (session('name_rol') === $role) {
                return $next($request);
            }
        }
        
        // Si no tiene el rol 'admin', puedes redirigirlo a otra página o mostrar un mensaje de error.
        return redirect()->route('home')->with('error', 'No tienes permisos para acceder a esta área.');
    }
}
