<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    use HasFactory;

    protected $table = 'pharmacies';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'company_name',
        'profile_image',
        'cover_image',
        'user_id',
        'email',
        'address',
        'phone',
        'liscence',
        'founded',
        'bio',
        'region',
        'city',
        'postal_code',
    ];

    protected $hidden = ['id','liscence','address','email'];

    public function users() {
        return $this->belongsTo(User::class,'user_id');
    }

    // public function medicines () {
    //     return $this->hasMany(Medicine::class);
    // }


}
