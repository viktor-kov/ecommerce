<p class="flex justify-between mt-1">
    {{__('products.product-storage-type')}} <input type="text" name="disk_type" id="disk_type" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_type}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-format')}} <input type="text" name="disk_format" id="disk_format" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_format}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-disk-memory')}} <input type="text" name="disk_memory" id="disk_memory" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_memory}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-disk-capacity')}} <input type="text" name="disk_capacity" id="disk_capacity" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_capacity}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-width')}}<input type="text" name="disk_width" id="disk_width" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_width}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-height')}} <input type="text" name="disk_height" id="disk_height" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_height}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-depth')}} <input type="text" name="disk_depth" id="disk_depth" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_depth}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-weight')}} <input type="text" name="disk_weight" id="disk_weight" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_weight}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-usage')}} <input type="text" name="disk_usage" id="disk_usage" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_usage}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-read-speed')}} <input type="text" name="disk_read_speed" id="disk_read_speed" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_read_speed}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-write-speed')}} <input type="text" name="disk_write_speed" id="disk_write_speed" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_write_speed}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-consumption')}} <input type="text" name="disk_consumption" id="disk_consumption" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_consumption}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-disk-life')}} <input type="text" name="disk_life" id="disk_life" class="w-3/4 p-1" @if ($product_specifications) value="{{$product_specifications->disk_life}}" @endif>
</p>