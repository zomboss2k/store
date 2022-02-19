<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginUser
{
    // viet ham goi lai
    public function handle($request, Closure $next)
    {
        // kiem tra mac dinh lay id
        if (!get_data_user('web')) {
            return redirect()->route('get.login');
        }
        return $next($request);
    }
}
