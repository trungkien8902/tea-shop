<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'order';

    protected $filltable = [
        'notes',
        'name_reciver',
        'address',
        'email',
        'phone',
        'status'
    ];

    public function cus() {
        return $this->hasOne(Customer::class, 'id', 'id_category');
    }

    // JOIN 1-n
    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'id_order', 'id');
    }
}
