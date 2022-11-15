<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $table = 'medicines';

    protected $primaryKey = 'id';

    protected $fillable = [
        'generic_name',
        'user_id',
        'image',
        'instructions',
        'manufacture',
        'description',
        'starting_date',
        'description',
        'starting_date',
        'expiry_date',
        'dose',
        'price',
        'available',
        'dose_unit',
        'drug_dosage',
        'drug_dosage_unit',
        
    ];

    public function users () {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function carts() {
        return $this->hasMany(Cart::class);
    }
}
