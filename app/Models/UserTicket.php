<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
    ];
}
