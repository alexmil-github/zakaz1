<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'adress',
        'description',
        'max_price',
        'photo_before',
        'category_id',
        'user_id',
        'status',
        'price',
        'photo_after'
    ];

}
