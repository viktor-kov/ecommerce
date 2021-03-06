<section class="p-8">
    <table class="w-full table-fixed border-collapse border-solid border-gray-300 border">
        <tr class="bg-green-300">
            <th class="w-1/2 text-left p-4">Parameter</th>
            <th class="w-1/2 text-left p-4">Špecifikácia</th>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-ram-capacity')}}</td>
            <td class="text-left p-4">{{$product_specifications->ram_memory}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-ram-frequency')}}</td>
            <td class="text-left p-4">{{$product_specifications->ram_frequency}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-ram-type')}}</td>
            <td class="text-left p-4">{{$product_specifications->ram_type}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-module-count')}}</td>
            <td class="text-left p-4">{{$product_specifications->ram_module_count}}</td>
        </tr>
    </table>
</section>