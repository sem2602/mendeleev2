<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $guarded = [];

    public function setting(){
        return $this->belongsTo(Settings::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function deliveryProvider(){
        return $this->belongsTo(DeliveryProvider::class);
    }

    public function sender(){
        return $this->belongsTo(Sender::class);
    }

    public function status(){
        return $this->belongsTo(OrderStatus::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

}
