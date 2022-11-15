<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use App\Enums\UserType;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        // Addition information 
        'owner_name',
        'profile_image',
        'cover_image',
        'address',
        'liscence',
        'founded',
        'phone',
        'bio',
        'region',
        'city',
        'postal_code',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'role',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // 'role' => UserType::class,
    ];

    public function pharmacies () {
        return $this->hasMany(Pharmacies::class);
    }
    public function carts () {
        return $this->hasMany(Cart::class);
    }
    
    public function medicines() {
        return $this->hasMany(Medicine::class);

    }
    public function orders() {
        return $this->hasMany(OrderMedicine::class);

    }
    
    public function order () {
        return $this->hasManyThrough(
            OrderMedicine::class,
            Medicine::class,
            // 'user_id', // Foreign key on CarModel table
            // 'medicine_id' // Foreign key on Engine table
        );
    }


}
