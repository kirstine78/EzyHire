<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            01.11.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            StaffMiddleware.php
 */

namespace App\Http\Middleware;

use Closure;


/**
 * Class StaffMiddleware
 * to help deciding what to do if user is Staff or not
 * found on:
 * http://laravel.io/forum/02-17-2015-laravel-5-routes-restricting-based-on-user-type
 * @package App\Http\Middleware
 */
class StaffMiddleware
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
        if ($request->user() == null || $request->user()->role != 'staff')
        {
            return redirect('home');
        }

        return $next($request);
    }
}
