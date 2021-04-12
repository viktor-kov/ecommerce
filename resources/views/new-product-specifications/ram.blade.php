<p class="flex justify-between mt-1">
    {{__('products.product-ram-capacity')}} <input type="text" name="ram_memory" id="ram_memory" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->ram_memory}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-ram-frequency')}} <input type="text" name="ram_frequency" id="ram_frequency" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->ram_frequency}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-ram-type')}} <input type="text" name="ram_type" id="ram_type" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->ram_type}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-module-count')}} <input type="text" name="ram_module_count" id="ram_module_count" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->ram_module_count}}" @endif>
</p>