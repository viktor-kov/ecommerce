<section class="p-8">
    <table class="w-full table-fixed border-collapse border-solid border-gray-300 border">
        <tr class="bg-green-300">
            <th class="w-1/2 text-left p-4">Parameter</th>
            <th class="w-1/2 text-left p-4">Špecifikácia</th>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-storage-type')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_type}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-format')}} </td>
            <td class="text-left p-4">{{$product_specifications->disk_format}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-disk-memory')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_memory}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-disk-capacity')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_capacity}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-width')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_width}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-height')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_height}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4"> {{__('products.product-depth')}} </td>
            <td class="text-left p-4">{{$product_specifications->disk_depth}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-weight')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_weight}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-usage')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_usage}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-read-speed')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_read_speed}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-write-speed')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_write_speed}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-consumption')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_consumption}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-disk-life')}}</td>
            <td class="text-left p-4">{{$product_specifications->disk_life}}</td>
        </tr>
    </table>
</section>