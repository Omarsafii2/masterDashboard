<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admins'; // Specify the table name

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
    ];
}
