<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
//    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('guest');
//    }

    /** The constructor has code to restrict access to users that are logged in */
    public function __construct() {
        $this->middleware('auth');

//        $this->middleware('auth', ['except' => ['getLogout', 'getRegister']]);
//        $this->middleware('admin', ['only' => 'postRegister']);  //************
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
        ]);
    }

    // from internet:
    // http://laravel.io/forum/06-12-2015-restricting-access-to-authregister-page
//    public function getRegister()
//    {
//        echo "in get register";
//
//        if (!Auth::check() || Auth::user()->role !== "admin")
//        {
//            echo "is not admin ...";
//            return redirect('/');
//
//        }
//        else {
//
//            echo "is an admin ...";
//        }
//        return view('auth.register');
//    }
}
