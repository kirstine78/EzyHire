<?php

/**
 * Student name:    Kirstine Brørup Nielsen
 * Student id:      100527988
 * Date:            09.11.2016
 * Assignment:      EzyHire
 * Version:         1.0
 * File:            ComposerServiceProvider.php
 */

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;


/**
 * Class ComposerServiceProvider used to decide how the view should display based on wheter user is admin or staff
 * To inject data into a layout view (a view that's @extended by others) I use a view composer.
 * Explanation found on:
 * http://stackoverflow.com/questions/28915811/how-put-data-in-app-blade-php-from-controller-in-laravel-5
 * @package App\Providers
 */
class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        // register my view composer
        View::composer('app', function($view){

            // get user (will be null if not logged in)
            $user = \Auth::user();

            // check if user is logged in
            if ($user == null) {
                $isUserLoggedIn = false;

                // admin is definitely false
                $isUserAdmin = false;
            }
            else {
                $isUserLoggedIn = true;

                // check if the user is Admin
                $isUserAdmin = $user->isAdmin();
            }

            $view->with('isUserLoggedIn', $isUserLoggedIn)->with('isUserAdmin', $isUserAdmin);
        });
    }


    public function register()
    {
        //
    }
}