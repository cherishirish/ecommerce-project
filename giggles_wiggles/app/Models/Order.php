<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'subtotal', 'total', 'billing_address',
        'shipping_address', 'pst', 'gst', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lineItems()
    {
        return $this->hasMany(LineItem::class, 'order_id');
    }

}
