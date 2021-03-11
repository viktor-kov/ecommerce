<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GpuSpecification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'gpu_chip_manufacturer',
        'gpu_model',
        'gpu_processor',
        'gpu_architecture',
        'gpu_stream',
        'gpu_technology',
        'gpu_usage',
        'gpu_memory_type',
        'gpu_directx',
        'gpu_opengl',
        'gpu_cooling',
        'gpu_width',
        'gpu_height',
        'gpu_depth',
        'gpu_supply_power',
    ];
}
