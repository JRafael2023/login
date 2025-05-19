<?php
namespace App\Http\Middleware;

use Closure;

class IncreaseUploadSize
{
    public function handle($request, Closure $next)
    {
        ini_set('upload_max_filesize', '50M');
        ini_set('post_max_size', '50M');

        return $next($request);
    }
}
