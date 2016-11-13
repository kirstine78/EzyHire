<?php

namespace App\Http\Middleware;

use Closure;


/**
 * Class AdminMiddleware
 * to help deciding what to do if user is Admin
 * found on:
 * http://laravel.io/forum/02-17-2015-laravel-5-routes-restricting-based-on-user-type
 * @package App\Http\Middleware
 */
class AdminMiddleware
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

        if ($request->user() == null || $request->user()->role != 'admin')
        {
            return redirect('home');
        }

        return $next($request);
    }
}
