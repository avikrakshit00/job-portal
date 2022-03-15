<?php

namespace App\Http\Middleware\AdminMain;
use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;

class DashboardAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session::has('admin_email_session') && (url('/') == $request->url()))
        {

            return redirect("/dashboard");
        }
        return $next($request);
    }
}
