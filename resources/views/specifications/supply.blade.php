<section class="p-8">
    <table class="w-full table-fixed">
        <tr>
            <th class="w-1/4 text-left">specifikácia</th>
            <th class="w-3/4 text-right">dáta</th>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-supply-power')}}</td>
            <td class="text-right">{{$product_specifications->supply_power}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-format')}}</td>
            <td class="text-right">{{$product_specifications->supply_format}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-equipment-functions')}}</td>
            <td class="text-right">{{$product_specifications->supply_equipment}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-protection-type')}}</td>
            <td class="text-right">{{$product_specifications->supply_protection}}</td>
        </tr>
    </table>
</section>