<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'used_id',
        'madicines',
        'name_customer',
        'total_price',
    ];

    protected $casts = [
        'medicines' => 'array',
    ];
}
