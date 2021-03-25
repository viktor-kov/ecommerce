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

    //save the new added product
    public function saveProductSpecifications($validated, $product_id, $product_category) {
        switch($product_category) {
            //ram memory specification insert
            case 1: 
                //adding product_id to validated array for better inserting data tu db table
                $validated['product_id'] = $product_id;
                
                //creating the db record by validated fields and thier values from inputs
                MemorySpecification::create($validated);

                break;
            //cpu specification insert
            case 2: 
                //adding product_id to validated array for better inserting data tu db table
                $validated['product_id'] = $product_id;
                
                //creating the db record by validated fields and thier values from inputs
                CpuSpecification::create($validated);

                break;
            //motherboard specification insert
            case 3: 
                //adding product_id to validated array for better inserting data tu db table
                $validated['product_id'] = $product_id;

                //creating the db record by validated fields and thier values from inputs
                MotherboardSpecification::create($validated);
            
                break;
            //case specification insert
            case 4: 
               //adding product_id to validated array for better inserting data tu db table
                $validated['product_id'] = $product_id;
                
                //creating the db record by validated fields and thier values from inputs
                CaseSpecification::create($validated);

                break;
            //supply specification insert  
            case 5:    
                //adding product_id to validated array for better inserting data tu db table
                $validated['product_id'] = $product_id;
                
                //creating the db record by validated fields and thier values from inputs
                SupplySpecification::create($validated);

                break; 
            //disk specification insert
            case 6: 
                //adding product_id to validated array for better inserting data tu db table
                $validated['product_id'] = $product_id;
                
                //creating the db record by validated fields and thier values from inputs
                DiskSpecification::create($validated);

                break; 
            //cooling specification insert
            case 7: 
                //adding product_id to validated array for better inserting data tu db table
                $validated['product_id'] = $product_id;
                
                //creating the db record by validated fields and thier values from inputs
                CoolingSpecification::create($validated);
              
                break; 
            //gpu specification insert
            case 8: 
                //adding product_id to validated array for better inserting data tu db table
                $validated['product_id'] = $product_id;

                //creating the db record by validated fields and thier values from inputs
                GpuSpecification::create($validated);

                break;
        }
    }

    //update the product in the main product table
    public function updateProduct($request, $product_photo) {

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
    public function updateProductSpecification($request, $product_id) {
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
                    'ram_module_count' => $request->ram_module_count,
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
    public function updateProductPhoto($request, $old_photo_path, $product_slug) {
        //dele the old photo from disk
        Storage::disk('public')->delete($old_photo_path);

        $photo_name = $product_slug.'.jpg';
        $photo_path = $request->file('product_image')->storeAs('products', $photo_name, 'public');

        //returning the new photo path
        return $photo_path;
    }

    //delete the product specification from 
    public function deleteSpecifications($product_id, $category) {

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

    //show the product specifications
    public function showProductSpecifications($product_category, $product_id) {
        switch($product_category) {
            case 1:
                $product_data['product_spect'] = MemorySpecification::where('product_id', $product_id)->first();
                $product_data['product_view'] = 'specifications.ram';
                return  $product_data;
            case 2:
                $product_data['product_spect'] = CpuSpecification::where('product_id', $product_id)->first();
                $product_data['product_view'] = 'specifications.cpu';
                return  $product_data;
            case 3:
                $product_data['product_spect'] = MotherboardSpecification::where('product_id', $product_id)->first();
                $product_data['product_view'] = 'specifications.motherboard';
                return  $product_data;
            case 4:
                $product_data['product_spect'] = CaseSpecification::where('product_id', $product_id)->first();
                $product_data['product_view'] = 'specifications.case';
                return  $product_data;
            case 5:
                $product_data['product_spect'] = SupplySpecification::where('product_id', $product_id)->first();
                $product_data['product_view'] = 'specifications.supply';
                return  $product_data;
            case 6:
                $product_data['product_spect'] = DiskSpecification::where('product_id', $product_id)->first();
                $product_data['product_view'] = 'specifications.disk';
                return  $product_data;
            case 7:
                $product_data['product_spect'] = CoolingSpecification::where('product_id', $product_id)->first();
                $product_data['product_view'] = 'specifications.cooling';
                return  $product_data;
            case 8:
                $product_data['product_spect'] = GpuSpecification::where('product_id', $product_id)->first();
                $product_data['product_view'] = 'specifications.gpu';
                return  $product_data;
        }
    }

    //validating the product specification inputs
    public function specificationsValidation($request, $category) {
        if($category == 1) {
            $validated = $request->validate([
                'ram_type' => 'required',
                'ram_memory' => 'required',
                'ram_frequency' => 'required',
                'ram_module_count' => 'required',
            ]);
        }

        if($category == 2) {
            $validated = $request->validate([
                'cpu_series' => 'required',
                'cpu_socket' => 'required',
                'cpu_cores' => 'required',
                'cpu_threads' => 'required',
                'cpu_frequency' => 'required',
                'cpu_max_frequency' => 'required',
                'cpu_ram' => 'required',
                'cpu_max_channels' => 'required',
                'cpu_functions' => 'required',
                'cpu_tdp' => 'required',
                'cpu_technology' => 'required',
                'cpu_cache' => 'required',
                'cpu_chipset' => 'required',
            ]);
        }

        if($category == 3) {
            $validated = $request->validate([
                'motherboard_socket' => 'required',
                'motherboard_chipset' => 'required',
                'motherboard_format' => 'required',
                'motherboard_functions' => 'required',
                'motherboard_memory' => 'required',
                'motherboard_memory_slots' => 'required',
                'motherboard_memory_insertion' => 'required',
                'motherboard_memory_frequency' => 'required',
                'motherboard_extern' => 'required',
                'motherboard_intern' => 'required',
                'motherboard_pci_x16' => 'required',
                'motherboard_pci_x1' => 'required',
                'motherboard_m2' => 'required',
                'motherboard_usb20' => 'required',        
                'motherboard_usb32' => 'required',         
                'motherboard_usb31' => 'required',         
                'motherboard_sata' => 'required', 
            ]);
        }

        if($category == 4) {
            $validated = $request->validate([
                'case_size' => 'required',
                'case_color' => 'required',
                'case_motherboard_format' => 'required',
                'case_supply' => 'required',
                'case_width' => 'required',
                'case_height' => 'required',
                'case_depth' => 'required',
                'case_weight' => 'required',
            ]);
        }

        if($category == 5) {
            $validated = $request->validate([
                'supply_power' => 'required',
                'supply_format' => 'required',
                'supply_equipment' => 'required',
                'supply_protection' => 'required',
            ]);
        }

        if($category == 6) {
            $validated = $request->validate([
                'disk_type' => 'required',
                'disk_format' => 'required',
                'disk_memory' => 'required',
                'disk_capacity' => 'required',
                'disk_width' => 'required',
                'disk_height' => 'required',
                'disk_depth' => 'required',
                'disk_weight' => 'required',
                'disk_usage' => 'required',
                'disk_read_speed' => 'required',
                'disk_write_speed' => 'required',
                'disk_consumption' => 'required',
                'disk_life' => 'required',
            ]);
        }

        if($category == 7) {
            $validated = $request->validate([
                'cooling_type' => 'required',
                'cooling_weight' => 'required',
                'cooling_max_tdp' => 'required',
                'cooling_min_speed' => 'required',
                'cooling_max_speed' => 'required',
                'cooling_average_fan' => 'required',
                'cooling_intel_socket' => 'required',
                'cooling_amd_socket' => 'required',
                'cooling_height' => 'required',
                'cooling_width' => 'required',
                'cooling_depth' => 'required',
            ]);
        }

        if($category == 8) {
            $validated = $request->validate([
                'gpu_chip_manufacturer' => 'required',
                'gpu_model' => 'required',
                'gpu_processor' => 'required',
                'gpu_architecture' => 'required',
                'gpu_stream' => 'required',
                'gpu_technology' => 'required',
                'gpu_usage' => 'required',
                'gpu_memory_type' => 'required',
                'gpu_directx' => 'required',
                'gpu_opengl' => 'required',
                'gpu_cooling' => 'required',
                'gpu_width' => 'required',
                'gpu_height' => 'required',
                'gpu_depth' => 'required',
                'gpu_supply_power' => 'required',
            ]);
        }

        return $validated;
    }
}