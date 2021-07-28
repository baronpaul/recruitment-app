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
        'firstname', 
        'middlename', 
        'lastname', 
        'email', 
        'password', 
        'date_of_birth',
        'sex',
        'marital_status', 
        'nationality', 
        'permanent_address', 
        'current_address', 
        'telephone1', 
        'telephone2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
