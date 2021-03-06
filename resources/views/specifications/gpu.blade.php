<section class="p-8">
    <table class="w-full table-fixed border-collapse border-solid border-gray-300 border">
        <tr class="bg-green-300">
            <th class="w-1/2 text-left p-4">Parameter</th>
            <th class="w-1/2 text-left p-4">Špecifikácia</th>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-chip-manufacture')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_chip_manufacturer}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-model')}} </td>
            <td class="text-left p-4">{{$product_specifications->gpu_model}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-gpu-processor')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_processor}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-gpu-chip-architecture')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_architecture}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-gpu-stream')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_stream}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-manufacture-technology')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_technology}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-usage')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_usage}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-gpu-memory')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_memory_type}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-directx')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_directx}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-opengl')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_opengl}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-cooling-type')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_cooling}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-width')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_width}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-height')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_height}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-depth')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_depth}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-gpu-supply-power')}}</td>
            <td class="text-left p-4">{{$product_specifications->gpu_supply_power}}</td>
        </tr>
    </table>
</section>