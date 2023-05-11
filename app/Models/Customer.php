<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'customer';
    protected $filltable = [
        'name',
        'email',
        'password',
        'address',
        'phone', 
    ];

    public function scopeSearch($query)
    {
        if($key = request()->key) {
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }

    // JOIN 1 - 1

    public function order_list() {
        return $this->hasMany(Order::class, 'id_customer', 'id');
    }


    protected $hidden = [
        'password',
        'remember_reset_tokens',
    ];
    
    public function getAuthPassword() {
        return bcrypt($this->password);
    }
}
