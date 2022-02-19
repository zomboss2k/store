<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginAdmin
{
    // viet ham goi lai
    public function handle($request, Closure $next)
    {
        // kiem tra mac dinh lay id
        if (!get_data_user('admins')) {
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
