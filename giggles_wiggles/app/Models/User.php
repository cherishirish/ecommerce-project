<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name', 
        'last_name', 
        'email', 
        'password', 
        'is_admin', 
        'remember_token', 
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function shippingAddress()
    {
        return $this->hasOne(Address::class, 'user_id')->where('address_type', 'shipping');
    }

    public function billingAddress()
    {
        return $this->hasOne(Address::class, 'user_id')->where('address_type', 'billing');
    }

    public function wishlist()
    {
    return $this->hasOne(Registry::class);
    }
    public function registries()
    {
        return $this->hasMany(Registry::class);
    }

}
