<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Company extends Model
{
    use SoftDeletes;

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'business_license',
        'address',
        'img',
        'category',
        'subscription_status',
    ];

    public function jobs(){
        return $this->hasMany(Job::class);
    }
}
