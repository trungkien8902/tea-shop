<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'order_detail';

    protected $filltable = [
        'id_order',
        'id_product',
        'quantity',
        'total_money'
    ];
}
