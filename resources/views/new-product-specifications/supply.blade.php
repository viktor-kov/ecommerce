<p class="flex justify-between mt-1">
    {{__('products.product-supply-power')}} <input type="text" name="supply_power" id="supply_power" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->supply_power}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-format')}} <input type="text" name="supply_format" id="supply_format" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->supply_format}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-equipment-functions')}} <input type="text" name="supply_equipment" id="supply_equipment" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->supply_equipment}}" @endif>
</p>
<p class="flex justify-between mt-1">
    {{__('products.product-protection-type')}} <input type="text" name="supply_protection" id="supply_protection" class="w-3/4" @if ($product_specifications) value="{{$product_specifications->supply_protection}}" @endif>
</p>