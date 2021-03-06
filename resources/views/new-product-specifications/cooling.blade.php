<p class="flex justify-between mt-1">
    {{__('products.product-cooling-type')}} <input type="text" name="cooling_type" id="cooling_type" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_type}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-weight')}} <input type="text" name="cooling_weight" id="cooling_weight" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_weight}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-max-tdp')}} <input type="text" name="cooling_max_tdp" id="cooling_max_tdp" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_max_tdp}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-min-speed')}} <input type="text" name="cooling_min_speed" id="cooling_min_speed" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_min_speed}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-max-speed')}} <input type="text" name="cooling_max_speed" id="cooling_max_speed" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_max_speed}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-fan-average')}} <input type="text" name="cooling_average_fan" id="cooling_average_fan" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_average_fan}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-intel-socket')}} <input type="text" name="cooling_intel_socket" id="cooling_intel_socket" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_intel_socket}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-amd-socket')}} <input type="text" name="cooling_amd_socket" id="cooling_amd_socket" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_amd_socket}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-height')}} <input type="text" name="cooling_height" id="cooling_height" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_height}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-width')}} <input type="text" name="cooling_width" id="cooling_width" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_width}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-depth')}} <input type="text" name="cooling_depth" id="cooling_depth" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->cooling_depth}}" @endif>
</p>