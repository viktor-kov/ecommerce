<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\CpuSpecification;
use App\Models\GpuSpecification;
use App\Models\CaseSpecification;
use App\Models\DiskSpecification;
use App\Models\MemorySpecification;
use App\Models\SupplySpecification;
use App\Models\CoolingSpecification;
use Illuminate\Support\Facades\Storage;
use App\Models\MotherboardSpecification;

class ProductService {
    //update the product in the main product table
    function updateProduct($request, $product_photo) {

        $product_id = $request->id;
        $product_name = $request->product_name;
        $product_text = $request->product_description;
        $product_slug = Str::slug($product_name, '-');
        $product_price = $request->product_price;
        $product_category = $request->product_category;
        $product_price_withou_dph = ($product_price * 0.80);

        Product::where('id', $product_id)->update([
            'name' => $product_name, 
            'text' => $product_text,
            'slug' => $product_slug,
            'category' => $product_category,
            'price' => $product_price,
            'without_dph' => $product_price_withou_dph,
            'photo_path' => $product_photo,
        ]);
    }

    //update product specifications
    function updateProductSpecification($request, $product_id) {
        //product category - witch product category we want to switch
        $product_category = $request->product_category;
        
        switch($product_category){
            case 1:
                MemorySpecification::updateOrCreate([
                    'product_id' => $product_id,
                ], [
                    'ram_type' => $request->ram_type,
                    'ram_memory' => $request->ram_memory,
                    'ram_frequency' => $request->ram_frequency,
                    'ram_module_count' => $request->module_count,
                ]);
                break;
            case 2: 

                CpuSpecification::updateOrCreate([
                    'product_id' => $product_id,
                ],[
                    'cpu_series' => $request->cpu_series,
                    'cpu_socket' => $request->cpu_socket,
                    'cpu_cores' => $request->cpu_cores,
                    'cpu_threads' => $request->cpu_threads,
                    'cpu_frequency' => $request->cpu_frequency,
                    'cpu_max_frequency' => $request->cpu_max_frequency,
                    'cpu_ram' => $request->cpu_ram,
                    'cpu_max_channels' => $request->cpu_max_channels,
                    'cpu_functions' => $request->cpu_functions,
                    'cpu_tdp' => $request->cpu_tdp,
                    'cpu_technology' => $request->cpu_technology,
                    'cpu_cache' => $request->cpu_cache,
                    'cpu_chipset' => $request->cpu_chipset,
                ]);
                break;
            case 3:
                MotherboardSpecification::updateOrCreate([
                    'product_id' => $product_id,
                ],[
                    'motherboard_socket' => $request->motherboard_socket,
                    'motherboard_chipset' => $request->motherboard_chipset,
                    'motherboard_format' => $request->motherboard_format,
                    'motherboard_functions' => $request->motherboard_functions,
                    'motherboard_memory' => $request->motherboard_memory,
                    'motherboard_memory_slots' => $request->motherboard_memory_slots,
                    'motherboard_memory_insertion' => $request->motherboard_memory_insertion,
                    'motherboard_memory_frequency' => $request->motherboard_memory_frequency,
                    'motherboard_extern' => $request->motherboard_extern,
                    'motherboard_intern' => $request->motherboard_intern,
                    'motherboard_pci_x16' => $request->motherboard_pci_x16,
                    'motherboard_pci_x1' => $request->motherboard_pci_x1,
                    'motherboard_m2' => $request->motherboard_m2,
                    'motherboard_usb20' => $request->motherboard_usb20,
                    'motherboard_usb32' => $request->motherboard_usb32,
                    'motherboard_usb31' => $request->motherboard_usb31,
                    'motherboard_sata' => $request->motherboard_sata,
                ]);

                break;
            case 4: 
                CaseSpecification::updateOrCreate([
                    'product_id' => $product_id,
                ], [
                    'case_size' => $request->case_size,
                    'case_color' => $request->case_color,
                    'case_motherboard_format' => $request->case_motherboard_format,
                    'case_supply' => $request->case_supply,
                    'case_width' => $request->case_width,
                    'case_height' => $request->case_height,
                    'case_depth' => $request->case_depth,
                    'case_weight' => $request->case_weight,
                ]);
                break;
            case 5:
                SupplySpecification::updateOrCreate([
                    'product_id' => $product_id,
                ], [
                    'supply_power' => $request->supply_power,
                    'supply_format' => $request->supply_format,
                    'supply_equipment' => $request->supply_equipment,
                    'supply_protection' => $request->supply_protection,
                ]);
                break; 
            case 6: 
                DiskSpecification::updateOrCreate([
                    'product_id' => $product_id,
                ],[
                    'disk_type' => $request->disk_type,
                    'disk_format' => $request->disk_format,
                    'disk_memory' => $request->disk_memory,
                    'disk_capacity' => $request->disk_capacity,
                    'disk_width' => $request->disk_width,
                    'disk_height' => $request->disk_height,
                    'disk_depth' => $request->disk_depth,
                    'disk_weight' => $request->disk_weight,
                    'disk_usage' => $request->disk_usage,
                    'disk_read_speed' => $request->disk_read_speed,
                    'disk_write_speed' => $request->disk_write_speed,
                    'disk_consumption' => $request->disk_consumption,
                    'disk_life' => $request->disk_life,
                ]);
                break;
            case 7:
                CoolingSpecification::updateOrCreate([
                    'product_id' => $product_id,
                ], [
                    'cooling_type' => $request->cooling_type,
                    'cooling_weight' => $request->cooling_weight,
                    'cooling_max_tdp' => $request->cooling_max_tdp,
                    'cooling_min_speed' => $request->cooling_min_speed,
                    'cooling_max_speed' => $request->cooling_max_speed,
                    'cooling_average_fan' => $request->cooling_average_fan,
                    'cooling_intel_socket' => $request->cooling_intel_socket,
                    'cooling_amd_socket' => $request->cooling_amd_socket,
                    'cooling_height' => $request->cooling_height,
                    'cooling_width' => $request->cooling_width,
                    'cooling_depth' => $request->cooling_depth,
                ]);
                break;
            case 8:
                GpuSpecification::updateOrCreate([
                    'product_id' => $product_id,
                ],[
                    'gpu_chip_manufacturer' => $request->gpu_chip_manufacturer,
                    'gpu_model' => $request->gpu_model,
                    'gpu_processor' => $request->gpu_processor,
                    'gpu_architecture' => $request->gpu_architecture,
                    'gpu_stream' => $request->gpu_stream,
                    'gpu_technology' => $request->gpu_technology,
                    'gpu_usage' => $request->gpu_usage,
                    'gpu_memory_type' => $request->gpu_memory_type,
                    'gpu_directx' => $request->gpu_directx,
                    'gpu_opengl' => $request->gpu_opengl,
                    'gpu_cooling' => $request->gpu_cooling,
                    'gpu_width' => $request->gpu_width,
                    'gpu_height' => $request->gpu_height,
                    'gpu_depth' => $request->gpu_depth,
                    'gpu_supply_power' => $request->gpu_supply_power,
                ]);
                break;
        }
    }

    //update product photo
    function updateProductPhoto($request, $old_photo_path, $product_slug) {
        //dele the old photo from disk
        Storage::disk('public')->delete($old_photo_path);

        $photo_name = $product_slug.'.jpg';
        $photo_path = $request->file('product_image')->storeAs('products', $photo_name, 'public');

        //returning the new photo path
        return $photo_path;
    }

    //delete the product specification from 
    function deleteSpecifications($product_id, $category) {

        //delete product specifications 
        switch($category) {
            case 1: //memory

                MemorySpecification::where('product_id', $product_id)->delete();
                
                break;
            case 2: //cpu

                CpuSpecification::where('product_id', $product_id)->delete();

                break;
            case 3: //motherboard

                MotherboardSpecification::where('product_id', $product_id)->delete();

                break;
            case 4: //case

                CaseSpecification::where('product_id', $product_id)->delete();

                break;
            case 5: //supply

                SupplySpecification::where('product_id', $product_id)->delete();

                break;
            case 6: //disk
                
                DiskSpecification::where('product_id', $product_id)->delete();

                break;
            case 7: //cooling

                CoolingSpecification::where('product_id', $product_id)->delete();

                break;
            case 8: //gpu

                GpuSpecification::where('product_id', $product_id)->delete();

                break;
        }

    }
}