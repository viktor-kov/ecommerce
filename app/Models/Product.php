<?php

namespace App\Models;

use App\Models\StorageProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    ];

    public function amount() {
        return $this->hasOne(StorageProduct::class);
    }

    public function getCategory() {
        return $this->hasOne(Category::class, 'id', 'category');
    }
}
