<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StorageProduct extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
