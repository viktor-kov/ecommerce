<p class="flex justify-between mt-1">
    {{__('products.product-chip-manufacture')}} <input type="text" name="gpu_chip_manufacturer" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_chip_manufacturer}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-model')}} <input type="text" name="gpu_model" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_model}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-gpu-processor')}} <input type="text" name="gpu_processor" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_processor}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-gpu-chip-architecture')}} <input type="text" name="gpu_architecture" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_architecture}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-gpu-stream')}} <input type="text" name="gpu_stream" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_stream}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-manufacture-technology')}} <input type="text" name="gpu_technology" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_technology}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-usage')}} <input type="text" name="gpu_usage" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_usage}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-gpu-memory')}} <input type="text" name="gpu_memory_type" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_memory_type}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-directx')}}<input type="text" name="gpu_directx" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_directx}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-opengl')}} <input type="text" name="gpu_opengl" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_opengl}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-cooling-type')}} <input type="text" name="gpu_cooling" id="" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_cooling}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-width')}} <input type="text" name="gpu_width" id="gpu_width" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_width}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-height')}} <input type="text" name="gpu_height" id="gpu_height" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_height}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-depth')}} <input type="text" name="gpu_depth" id="gpu_depth" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_depth}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-gpu-supply-power')}} <input type="text" name="gpu_supply_power" id="gpu_supply_power" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->gpu_supply_power}}" @endif>
</p>