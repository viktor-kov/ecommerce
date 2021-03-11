<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoolingSpecification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'cooling_type',
        'cooling_weight',
        'cooling_max_tdp',
        'cooling_min_speed',
        'cooling_max_speed',
        'cooling_average_fan',
        'cooling_intel_socket',
        'cooling_amd_socket',
        'cooling_height',
        'cooling_width',
        'cooling_depth',
    ];
}
