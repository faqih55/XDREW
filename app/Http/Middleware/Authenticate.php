<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Tentukan ke mana user diarahkan jika tidak terautentikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // Jika request BUKAN mengharapkan JSON (bukan API), lakukan redirect
        if (! $request->expectsJson()) {
            
            // Jika user mencoba mengakses rute yang berawalan 'admin/'
            if ($request->is('admin/*')) {
                return route('admin.login');
            }

            // Default: arahkan ke login pelanggan
            return route('pelanggan.login');
        }
        
        return null;
    }
}