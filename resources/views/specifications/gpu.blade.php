<section class="p-8">
    <table class="w-full table-fixed">
        <tr>
            <th class="w-1/4 text-left">specifikácia</th>
            <th class="w-3/4 text-right">dáta</th>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-chip-manufacture')}}</td>
            <td class="text-right">{{$product_specifications->gpu_chip_manufacturer}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-model')}} </td>
            <td class="text-right">{{$product_specifications->gpu_model}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-gpu-processor')}}</td>
            <td class="text-right">{{$product_specifications->gpu_processor}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-gpu-chip-architecture')}}</td>
            <td class="text-right">{{$product_specifications->gpu_architecture}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-gpu-stream')}}</td>
            <td class="text-right">{{$product_specifications->gpu_stream}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-manufacture-technology')}}</td>
            <td class="text-right">{{$product_specifications->gpu_technology}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-usage')}}</td>
            <td class="text-right">{{$product_specifications->gpu_usage}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-gpu-memory')}}</td>
            <td class="text-right">{{$product_specifications->gpu_memory_type}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-directx')}}</td>
            <td class="text-right">{{$product_specifications->gpu_directx}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-opengl')}}</td>
            <td class="text-right">{{$product_specifications->gpu_opengl}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cooling-type')}}</td>
            <td class="text-right">{{$product_specifications->gpu_cooling}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-width')}}</td>
            <td class="text-right">{{$product_specifications->gpu_width}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-height')}}</td>
            <td class="text-right">{{$product_specifications->gpu_height}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-depth')}}</td>
            <td class="text-right">{{$product_specifications->gpu_depth}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-gpu-supply-power')}}</td>
            <td class="text-right">{{$product_specifications->gpu_supply_power}}</td>
        </tr>
    </table>
</section>