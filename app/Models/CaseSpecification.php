<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseSpecification extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'case_size',
        'case_color',
        'case_motherboard_format',
        'case_supply',
        'case_width',
        'case_height',
        'case_depth',
        'case_weight',
    ];
}
