<section class="p-8">
    <table class="w-full table-fixed border-collapse border-solid border-gray-300 border">
        <tr class="bg-green-300">
            <th class="w-1/2 text-left p-4">Parameter</th>
            <th class="w-1/2 text-left p-4">Špecifikácia</th>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-size')}}</td>
            <td class="text-left p-4">{{$product_specifications->case_size}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-color')}}</td>
            <td class="text-left p-4">{{$product_specifications->case_color}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-motherboard-format')}}</td>
            <td class="text-left p-4">{{$product_specifications->case_motherboard_format}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-supply-format')}}</td>
            <td class="text-left p-4">{{$product_specifications->case_supply}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-width')}}</td>
            <td class="text-left p-4">{{$product_specifications->case_width}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-height')}}</td>
            <td class="text-left p-4">{{$product_specifications->case_height}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-depth')}}</td>
            <td class="text-left p-4">{{$product_specifications->case_depth}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-weight')}}</td>
            <td class="text-left p-4">{{$product_specifications->case_weight}}</td>
        </tr>
    </table>
</section>