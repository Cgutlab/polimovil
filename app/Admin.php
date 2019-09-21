<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'admins';
    protected $fillable = [
        'name', 'cod', 'username', 'password', 'type', 'status'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        if(Auth::user()->type == 'admin')  {
            return true;
        }
    }


    //
    // public function photo()
    // {
    //     if (file_exists( public_path() . '/img/admins/' . $this->image) && $this->image != null) {
    //         return '/img/admins/' . $this->image;
    //     } else {
    //         return '/img/admins/no-image.png';
    //     }
    // }
}
