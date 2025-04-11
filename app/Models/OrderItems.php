<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $fillable = [
        'order_id',
        'product_name',
        'quantity',
        'price_per_unit',
        'total_amount',
        
    ];

    
    public function order()
    {
        return $this->belongsTo(Orders::class, 'order_id', 'order_id');
    }
   
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_name', 'name');  // Perbaiki menjadi Products::class
    }
}
