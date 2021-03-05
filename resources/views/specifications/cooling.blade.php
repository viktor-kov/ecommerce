<section class="p-8">
    <table class="w-full table-fixed">
        <tr>
            <th class="w-1/4 text-left">specifikácia</th>
            <th class="w-3/4 text-right">dáta</th>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cooling-type')}}</td>
            <td class="text-right">{{$product_specifications->cooling_type}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-weight')}}</td>
            <td class="text-right">{{$product_specifications->cooling_weight}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-max-tdp')}}</td>
            <td class="text-right">{{$product_specifications->cooling_max_tdp}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-min-speed')}}</td>
            <td class="text-right">{{$product_specifications->cooling_min_speed}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-max-speed')}}</td>
            <td class="text-right">{{$product_specifications->cooling_max_speed}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-fan-average')}}</td>
            <td class="text-right">{{$product_specifications->cooling_average_fan}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-intel-socket')}}</td>
            <td class="text-right">{{$product_specifications->coling_intel_socket}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-amd-socket')}}</td>
            <td class="text-right">{{$product_specifications->cooling_amd_socket}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-height')}}</td>
            <td class="text-right">{{$product_specifications->cooling_height}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-width')}}</td>
            <td class="text-right">{{$product_specifications->cooling_width}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-depth')}}</td>
            <td class="text-right">{{$product_specifications->cooling_depth}}</td>
        </tr>
    </table>
</section>