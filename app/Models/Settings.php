<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public function service()
    {
        return $this->belongsTo(Services::class);
    }

}
