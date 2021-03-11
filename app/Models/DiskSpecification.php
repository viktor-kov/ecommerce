<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiskSpecification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'disk_type',
        'disk_format',
        'disk_memory',
        'disk_capacity',
        'disk_width',
        'disk_height',
        'disk_depth',
        'disk_weight',
        'disk_usage',
        'disk_read_speed',
        'disk_write_speed',
        'disk_consumption',
        'disk_life',
    ];
}
