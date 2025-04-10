<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'order_id',
        'customer_name',
        'status',
    ];

    // Relasi One-to-Many: Satu order bisa memiliki banyak order item
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'order_id', 'order_id');
    }
}
