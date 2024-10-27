<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'price',
        'quantity',
        'photo',
        'total',
        // Add more fillable attributes as necessary
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }}
