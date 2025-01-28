<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AcceptMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$types) //...faz o $types receber todos os parâmetros passados
    {
        // Verifica se o tipo é permitido
        if (!in_array(auth()->user()->type, $types)) {
            abort(403, 'Acesso negado.');
        }

        return $next($request);
    }
}
