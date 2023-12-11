<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'category_id',
        'price',
        'description',
        'availability',
        'quantity',
        'gender'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}