<?php

namespace App\Http\Middleware;

use Closure;

// [2 - lanjutan] Fungsi dari middleware ini adalah kebalikan dari middleware sebelumnya. Middleware ini berfungsi untuk "menendang" user yang belum login ketika mencoba mengakses hal-hal yang seharusnya hanya boleh diakses ketika sudah login saja. Seperti pada middleware lainnya, pengecekan diletakkan pada function handle.
class WithLogin
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
        if (!$request->session()->has('user_logon')) {
            return redirect('/goLogin');
        }
        return $next($request);
    }
}
