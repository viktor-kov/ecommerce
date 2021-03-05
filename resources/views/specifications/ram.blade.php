<section class="p-8">
    <table class="w-full table-fixed">
        <tr>
            <th class="w-1/4 text-left">specifikácia</th>
            <th class="w-3/4 text-right">dáta</th>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-ram-capacity')}}</td>
            <td class="text-right">{{$product_specifications->ram_memory}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-ram-frequency')}}</td>
            <td class="text-right">{{$product_specifications->ram_frequency}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-ram-type')}}</td>
            <td class="text-right">{{$product_specifications->ram_type}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-module-count')}}</td>
            <td class="text-right">{{$product_specifications->ram_module_count}}</td>
        </tr>
    </table>
</section>