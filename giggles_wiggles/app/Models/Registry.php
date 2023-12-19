<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'registryName',
        'eventDate',
        'product_ids'
    ];

     /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
   
}
