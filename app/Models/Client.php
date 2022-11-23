<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'email',
        'phone',
        'organization',
        'edrpou',
    ];

    use HasFactory;
}
