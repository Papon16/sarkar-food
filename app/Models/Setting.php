<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'restaurant_name',
        'restaurant_phone',
        'restaurant_email',
        'restaurant_address',
        'opening_hours',
        'currency',
        'delivery_charge',
        'minimum_order',
        'restaurant_open',
        'maintenance_mode',
    ];

    protected $casts = [
        'restaurant_open' => 'boolean',
        'maintenance_mode' => 'boolean',

        'delivery_charge' => 'decimal:2',
        'minimum_order' => 'decimal:2',
    ];
}