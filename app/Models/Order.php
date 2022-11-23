<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'ext_id',
        'setting_id',
        'client_id',
        'delivery_provider_id',
        'delivery_provider_ext',
        'sender_id',
        'recipient_city_ref',
        'recipient_address',
        'warehouse_type',
        'payment',
        'total',
        'status_id',
        'user_id'
    ];

    use HasFactory;
}
