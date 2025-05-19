<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $moduleName)
    {
        try{
            $user = Auth::user();

            if(!$user){
                return response()->json(['message' => 'No tienes acceso a este módulo'], 403);
            }
            // Check if user's company has the module
            if (!$user->modules()->where('name', $moduleName)->exists()) {
                return response()->json(['message' => 'No tienes acceso a este módulo'], 403);
            }

            return $next($request);
        }catch (\Exception $e){
            return response()->json(['message' => 'No tienes acceso a este módulo'], 403);
        }
    }
}
