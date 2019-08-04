<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin_users')->check()) {
            if (Auth::guard('admin_users')->user()->is_admin === 0) {
                return $next($request);
            }
            return redirect('admin/login')->with(Controller::notification(LOGIN_FAIL));
        }
        return redirect('admin/login')->with(Controller::notification(LOGIN_FAIL_MIDDLEWARE));
    }
}
