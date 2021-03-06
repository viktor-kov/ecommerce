<section class="p-8">
    <table class="w-full table-fixed border-collapse border-solid border-gray-300 border">
        <tr class="bg-green-300">
            <th class="w-1/2 text-left p-4">Parameter</th>
            <th class="w-1/2 text-left p-4">Špecifikácia</th>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-cooling-type')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_type}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-weight')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_weight}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-max-tdp')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_max_tdp}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-min-speed')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_min_speed}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-max-speed')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_max_speed}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-fan-average')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_average_fan}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-intel-socket')}}</td>
            <td class="text-left p-4">{{$product_specifications->coling_intel_socket}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-amd-socket')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_amd_socket}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-height')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_height}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-width')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_width}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-depth')}}</td>
            <td class="text-left p-4">{{$product_specifications->cooling_depth}}</td>
        </tr>
    </table>
</section>