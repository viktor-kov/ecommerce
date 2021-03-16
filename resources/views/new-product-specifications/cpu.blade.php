<p class="flex justify-between mt-1">
    {{__('products.product-cpu-series')}} <input type="text" name="cpu_series" id="cpu_series" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_series}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-cpu-socket')}} <input type="text" name="cpu_socket" id="cpu_socket" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_socket}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-cpu-cores')}}<input type="text" name="cpu_cores" id="cpu_cores" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_cores}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-cpu-threads')}} <input type="text" name="cpu_threads" id="cpu_threads" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_threads}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-cpu-frequency')}} <input type="text" name="cpu_frequency" id="cpu_frequency" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_frequency}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-max-cpu-frequency')}} <input type="text" name="cpu_max_frequency" id="cpu_max_frequency" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_max_frequency}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-cpu-ram')}} <input type="text" name="cpu_ram" id="cpu_ram" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_ram}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-cpu-max-channels')}} <input type="text" name="cpu_max_channels" id="cpu_max_channels" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_max_channels}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-functions')}} <input type="text" name="cpu_functions" id="cpu_functions" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_functions}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-tdp')}} <input type="text" name="cpu_tdp" id="cpu_tdp" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_tdp}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-manufacture-technology')}} <input type="text" name="cpu_technology" id="cpu_technology" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_technology}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-cpu-cache')}} <input type="text" name="cpu_cache" id="cpu_cache" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_cache}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-cpu-chipset')}} <input type="text" name="cpu_chipset" id="cpu_chipset" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->cpu_chipset}}" @endif>
</p>
