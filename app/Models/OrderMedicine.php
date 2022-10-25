<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class OrderMedicine extends Model
{
    use HasFactory;
    // $table->increments('id');
    //         $table->unsignedBigInteger('user_id');
    //         $table->unsignedInteger('medicine_id');
    //         $table->integer('amount');
    //         $table->date('date');
    //         $table->timestamps();

    protected $table = 'order_medicines';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'user_id',
        'medicine_id',
        'amount',
        'date',
        'status',
    ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function medicines (){
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }

    // public function 

    
}
