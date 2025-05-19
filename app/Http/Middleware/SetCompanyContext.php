<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCompanyContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Obtener company_id del header y establecerlo en la configuración
        $company_id = $request->header('CompanyId');
         
        if (!empty($company_id)) {
            config(['app.company_id' => $company_id]);
        } else {
            return response()->json([
                'message' => 'Company ID es requerido.'
            ], 400); // Bad Request
        }
        return $next($request);
    }
}
