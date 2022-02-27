<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildrenAgePrice extends Model
{
    protected $table = 'children_age_prices';

    protected $fillable = [
        'booking_details_id', 'child_age', 'price',
    ];

    public function bookingDetails()
    {
        return $this->belongsTo('App\BookingDetails', 'booking_details_id');
    }
}
