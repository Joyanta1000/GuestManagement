<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeWisePrice extends Model
{
    protected $table = 'age_wise_prices';

    protected $fillable = [
        'room_id',
        'min',
        'max',
        'price',
        'is_active',
    ];

}
