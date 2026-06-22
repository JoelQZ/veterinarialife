<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EsAdmin{
    public function handle(Request $request, Closure $next): Response{
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect('/')->with('error', 'No tienes permisos de Administrador.');
        }
        return $next($request);
    }
}