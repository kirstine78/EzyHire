<?php
/**
 * Created by PhpStorm.
 * User: Kirsti
 * Date: 9/11/2016
 * Time: 1:59 PM
 */

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        //

        // get user (null if not logged in)
//        return $user;

        View::composer('app', function($view){

            $user = \Auth::user();
            $isUserLoggedIn = false;

            // check if logged in?
            if ($user == null) {
//            return "there is no user";
                $isUserLoggedIn = false;
            }
            else {
//            return \Auth::user();
                $isUserLoggedIn = true;
            }


            $view->with('isUserLoggedIn', $isUserLoggedIn);
        });
    }


    public function register()
    {
        //
    }
}