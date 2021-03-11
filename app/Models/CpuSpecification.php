<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpuSpecification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'cpu_series',
        'cpu_socket',
        'cpu_cores',
        'cpu_threads',
        'cpu_frequency',
        'cpu_max_frequency',
        'cpu_ram',
        'cpu_max_channels',
        'cpu_functions',
        'cpu_tdp',
        'cpu_technology',
        'cpu_cache',
        'cpu_chipset',
    ];
}
