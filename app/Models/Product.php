<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_image',
        'product_price',
        'product_category',
    ];

    protected $hidden = [
        'slug',
        'without_dph',
        'photo_path',
    ];
}
