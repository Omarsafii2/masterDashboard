<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Authenticatable
{
    use SoftDeletes;
    protected $table = 'admins'; // Specify the table name

    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'img',
        'role', 
    ];
}
