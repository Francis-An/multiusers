<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'medicine_id',
        'user_id',
        'price',
        'total_amount',
        'quantity',
        'medicine_name'
    ];

    public function medicines () {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
    public function users () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function isMedicineAvailable($medicine_id) {
        $getMedicine = Medicine::where('medicine_id',$medicine_id)->first();

        return $getMedicine = $getMedicine->$stock;
    }

}
