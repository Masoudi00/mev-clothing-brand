<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'zipcode',
        'total',
        'size',
        // Add more fillable attributes as necessary
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
