<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalCost extends Model
{

    protected $table = 'additional_costs';

    protected $fillable = [
        'booking_details_id',
        'op_type',
        'amount',
        'comment',
        'given',
    ];

    public function booking_details()
    {
        return $this->belongsTo('App\BookingDetails', 'booking_details_id');
    }
}
