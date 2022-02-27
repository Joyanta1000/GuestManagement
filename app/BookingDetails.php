<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDetails extends Model
{
    protected $table = 'booking_details';

    protected $fillable = [
        'checkin', 'checkout', 'adult', 'children',
    ];

    public function childrenAgePrice()
    {
        return $this->hasMany('App\ChildrenAgePrice', 'booking_details_id');
    }
}
