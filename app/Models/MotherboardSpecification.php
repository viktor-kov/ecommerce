<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotherboardSpecification extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'motherboard_socket',
        'motherboard_chipset',
        'motherboard_format',
        'motherboard_functions',
        'motherboard_memory',
        'motherboard_memory_slots',
        'motherboard_memory_insertion',
        'motherboard_memory_frequency',
        'motherboard_extern',
        'motherboard_intern',
        'motherboard_pci_x16',
        'motherboard_pci_x1',
        'motherboard_m2',
        'motherboard_usb20',        
        'motherboard_usb32',         
        'motherboard_usb31',         
        'motherboard_sata',    
    ];
}
