<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * check if user has a role as Admin (user can have a role as Staff OR Admin)
     */
    public function isUserRoleAdmin()
    {
        $records = User::find($this->id);

        if (strcmp($records->name, "k") == 0 )
        {
            $isAdmin = true;
        }
        else
        {
            $isAdmin = false;
        }

         return $isAdmin;
    }
}
