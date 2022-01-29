<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestType extends Model
{
    protected $table = 'guest_types';

    protected $fillable = [
        'type',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
