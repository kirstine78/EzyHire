<?php
/**
 * Created by PhpStorm.
 * User: Kirstine
 * Date: 9/11/2016
 * Time: 1:59 PM
 */

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;


/**
 * Class ComposerServiceProvider
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
                $isUserAdmin = $user->isUserRoleAdmin();
            }

            $view->with('isUserLoggedIn', $isUserLoggedIn)->with('isUserAdmin', $isUserAdmin);
        });
    }


    public function register()
    {
        //
    }
}