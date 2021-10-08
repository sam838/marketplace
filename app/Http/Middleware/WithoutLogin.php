<?php

namespace App\Http\Middleware;

use Closure;

class WithoutLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('user_logon')) {
            $auth = $request->session()->get('user_logon');
            if($auth['jenis_user'] == "Seller"){
                return redirect('/goHome');
            }
            else{
                return redirect('goHome');
            }
        }
        return $next($request);
    }
}
