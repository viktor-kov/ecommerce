<section class="p-8">
    <table class="w-full table-fixed border-collapse border-solid border-gray-300 border">
        <tr class="bg-green-300">
            <th class="w-1/2 text-left p-4">Parameter</th>
            <th class="w-1/2 text-left p-4">Špecifikácia</th>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-supply-power')}}</td>
            <td class="text-left p-4">{{$product_specifications->supply_power}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-format')}}</td>
            <td class="text-left p-4">{{$product_specifications->supply_format}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-equipment-functions')}}</td>
            <td class="text-left p-4">{{$product_specifications->supply_equipment}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-protection-type')}}</td>
            <td class="text-left p-4">{{$product_specifications->supply_protection}}</td>
        </tr>
    </table>
</section>