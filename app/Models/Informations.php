<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'town',
        'psc',
        'street',
        'house_id',
        'phone_number'
    ];

    protected $hidden = [
        'user_id',
    ];
}
