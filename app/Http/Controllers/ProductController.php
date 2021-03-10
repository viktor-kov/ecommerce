<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CpuSpecification;
use App\Models\GpuSpecification;
use App\Models\CaseSpecification;
use App\Models\DiskSpecification;
use App\Models\MemorySpecification;
use App\Models\SupplySpecification;
use App\Models\CoolingSpecification;
use Illuminate\Support\Facades\Storage;
use App\Models\MotherboardSpecification;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductDeleteRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('products')->with(['products' => $products]);
    }

    public function show($slug) {
       $product = Product::where('slug', $slug)->get();

       return view('product-id')->with(['products' => $product, 'title' => $slug]);
    }

    public function store(ProductStoreRequest $request) {

        $new_product = new Product;

        $product_name = $request->product_name;
        $product_slug = Str::slug($product_name, '-');
        $product_without_dph = ($request->product_price) * 0.80;

        $extension = $request->file('product_image')->extension();
        $photo_name = $product_slug.'.'.$extension;
        $photo_path = $request->file('product_image')->storeAs('products', $photo_name, 'public');

        $new_product->name = $product_name; 
        $new_product->text = $request->product_description;
        $new_product->slug =  $product_slug;
        $new_product->category = $request->product_category;
        $new_product->price = $request->product_price;
        $new_product->without_dph = $product_without_dph;
        $new_product->photo_path = $photo_path;

        $new_product->save();

        $product_id = $new_product->id;

        switch($request->product_category) {
            //ram memory specification insert
            case 1: 
                $product_specifications = new MemorySpecification;
                $product_specifications->product_id = $product_id;
                $product_specifications->ram_type = $request->ram_type;
                $product_specifications->ram_memory = $request->ram_memory;
                $product_specifications->ram_frequency = $request->ram_frequency;
                $product_specifications->ram_module_count = $request->module_count;

                $product_specifications->save();
                break;
            //cpu specification insert
            case 2: 
                $product_specifications = new CpuSpecification;
                $product_specifications->product_id = $product_id;
                $product_specifications->cpu_series = $request->cpu_series;
                $product_specifications->cpu_socket = $request->cpu_socket;
                $product_specifications->cpu_cores = $request->cpu_cores;
                $product_specifications->cpu_threads = $request->cpu_threads;
                $product_specifications->cpu_frequency = $request->cpu_frequency;
                $product_specifications->cpu_max_frequency = $request->cpu_max_frequency;
                $product_specifications->cpu_ram = $request->cpu_ram;
                $product_specifications->cpu_max_channels = $request->cpu_max_channels;
                $product_specifications->cpu_functions = $request->cpu_functions;
                $product_specifications->cpu_tdp = $request->cpu_tdp;
                $product_specifications->cpu_technology = $request->cpu_technology;
                $product_specifications->cpu_cache = $request->cpu_cache;
                $product_specifications->cpu_chipset = $request->cpu_chipset;

                $product_specifications->save();
                break;
            //motherboard specification insert
            case 3: 
                $product_specifications = new MotherboardSpecification;
                $product_specifications->product_id = $product_id;
                $product_specifications->motherboard_socket = $request->motherboard_socket;
                $product_specifications->motherboard_chipset = $request->motherboard_chipset;
                $product_specifications->motherboard_format = $request->motherboard_format;
                $product_specifications->motherboard_functions = $request->motherboard_functions;
                $product_specifications->motherboard_memory = $request->motherboard_memory;
                $product_specifications->motherboard_memory_slots = $request->motherboard_memory_slots;
                $product_specifications->motherboard_memory_insertion = $request->motherboard_memory_insertion;
                $product_specifications->motherboard_memory_frequency = $request->motherboard_memory_frequency;
                $product_specifications->motherboard_extern = $request->motherboard_extern;
                $product_specifications->motherboard_intern = $request->motherboard_intern;
                $product_specifications->motherboard_pci_x16 = $request->motherboard_pci_x16;
                $product_specifications->motherboard_pci_x1 = $request->motherboard_pci_x1;
                $product_specifications->motherboard_m2 = $request->motherboard_m2;
                $product_specifications->motherboard_usb20 = $request->motherboard_usb20;
                $product_specifications->motherboard_usb32 = $request->motherboard_usb32;
                $product_specifications->motherboard_usb31 = $request->motherboard_usb31;
                $product_specifications->motherboard_sata = $request->motherboard_sata;

                $product_specifications->save();
                break;
            //case specification insert
            case 4: 
                $product_specifications = new CaseSpecification;
                $product_specifications->product_id = $product_id;
                $product_specifications->case_size = $request->case_size;
                $product_specifications->case_color = $request->case_color;
                $product_specifications->case_motherboard_format = $request->case_motherboard_format;
                $product_specifications->case_supply = $request->case_supply;
                $product_specifications->case_width = $request->case_width;
                $product_specifications->case_height = $request->case_height;
                $product_specifications->case_depth = $request->case_depth;
                $product_specifications->case_weight = $request->case_weight;

                $product_specifications->save();
                break;
            //supply specification insert  
            case 5: 
                $product_specifications = new SupplySpecification;
                $product_specifications->product_id = $product_id;
                $product_specifications->supply_power = $request->supply_power;
                $product_specifications->supply_format = $request->supply_format;
                $product_specifications->supply_equipment = $request->supply_equipment;
                $product_specifications->supply_protection = $request->supply_protection;

                $product_specifications->save();
                break; 
            //disk specification insert
            case 6: 
                $product_specifications = new DiskSpecification;
                $product_specifications->product_id = $product_id;
                $product_specifications->disk_type = $request->disk_type;
                $product_specifications->disk_format = $request->disk_format;
                $product_specifications->disk_memory = $request->disk_memory;
                $product_specifications->disk_capacity = $request->disk_capacity;
                $product_specifications->disk_width = $request->disk_width;
                $product_specifications->disk_height = $request->disk_height;
                $product_specifications->disk_depth = $request->disk_depth;
                $product_specifications->disk_weight = $request->disk_weight;
                $product_specifications->disk_usage = $request->disk_usage;
                $product_specifications->disk_read_speed = $request->disk_read_speed;
                $product_specifications->disk_write_speed = $request->disk_write_speed;
                $product_specifications->disk_consumption = $request->disk_consumption;
                $product_specifications->disk_life = $request->disk_life;

                $product_specifications->save();
                break; 
            //cooling specification insert
            case 7: 
                $product_specifications = new CoolingSpecification;
                $product_specifications->product_id = $product_id;
                $product_specifications->cooling_type = $request->cooling_type;
                $product_specifications->cooling_weight = $request->cooling_weight;
                $product_specifications->cooling_max_tdp = $request->cooling_max_tdp;
                $product_specifications->cooling_min_speed = $request->cooling_min_speed;
                $product_specifications->cooling_max_speed = $request->cooling_max_speed;
                $product_specifications->cooling_average_fan = $request->cooling_average_fan;
                $product_specifications->cooling_intel_socket = $request->cooling_intel_socket;
                $product_specifications->cooling_amd_socket = $request->cooling_amd_socket;
                $product_specifications->cooling_height = $request->cooling_height;
                $product_specifications->cooling_width = $request->cooling_width;
                $product_specifications->cooling_depth = $request->cooling_depth;

                $product_specifications->save();
                break; 
            //gpu specification insert
            case 8: 
                $product_specifications = new GpuSpecification;
                $product_specifications->product_id = $product_id;
                $product_specifications->gpu_chip_manufacturer = $request->gpu_chip_manufacturer;
                $product_specifications->gpu_model = $request->gpu_model;
                $product_specifications->gpu_processor = $request->gpu_processor;
                $product_specifications->gpu_architecture = $request->gpu_architecture;
                $product_specifications->gpu_stream = $request->gpu_stream;
                $product_specifications->gpu_technology = $request->gpu_technology;
                $product_specifications->gpu_usage = $request->gpu_usage;
                $product_specifications->gpu_memory_type = $request->gpu_memory_type;
                $product_specifications->gpu_directx = $request->gpu_directx;
                $product_specifications->gpu_opengl = $request->gpu_opengl;
                $product_specifications->gpu_cooling = $request->gpu_cooling;
                $product_specifications->gpu_width = $request->gpu_width;
                $product_specifications->gpu_height = $request->gpu_height;
                $product_specifications->gpu_depth = $request->gpu_depth;
                $product_specifications->gpu_supply_power = $request->gpu_supply_power;

                $product_specifications->save();
                break;
        }
    
        return redirect()->route('product.show', ['id' => $request->product_category, 'slug' => $product_slug])->with('success', 'Pridali ste produkt');
    }

    public function update(ProductUpdateRequest $request) {
        $product_name = $request->product_name;
        $product_without_dph = ($request->product_price) * 0.80;

        $product_slug = Str::slug($product_name, '-');
        
        if($request->file('product_image')) {
            $photo_path = $request->product_photo_path;
            $delete_product_photo = Storage::disk('public')->delete($photo_path);

            $extension = $request->file('product_image')->extension();
            $photo_name = $product_slug.'.'.$extension;
            $photo_path = $request->file('product_image')->storeAs('products', $photo_name, 'public');
        }
        else {
            $photo_path = $request->product_photo_path;
        }

        $id = $request->id;
        $product_text = $request->product_description;
        $product_price = $request->product_price;
        $product_category = $request->product_category;
        $product_photo_path = $photo_path;

        $update_product = Product::where('id', $id)->update([
            'name' => $product_name, 
            'text' => $product_text,
            'slug' => $product_slug,
            'category' => $product_category,
            'price' => $product_price,
            'without_dph' => $product_without_dph,
            'photo_path' => $product_photo_path,
        ]);

        return redirect()->route('product.show', ['id' => $product_category, 'slug' => $product_slug])->with('success', 'Upravili ste produkt');
    }

    public function delete(ProductDeleteRequest $request) {

        $id = $request->id;
        $photo_path = $request->product_photo_path;
        
        $delete_product = Product::where('id', $id)->delete();

        $delete_product_photo = Storage::disk('public')->delete($photo_path);

        return redirect('allproducts')->with('error', 'Zmazali ste produkt');
    }
}
