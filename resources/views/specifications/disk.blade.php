<section class="p-8">
    <table class="w-full table-fixed">
        <tr>
            <th class="w-1/4 text-left">specifikácia</th>
            <th class="w-3/4 text-right">dáta</th>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-storage-type')}}</td>
            <td class="text-right">{{$product_specifications->disk_type}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-format')}} </td>
            <td class="text-right">{{$product_specifications->disk_format}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-disk-memory')}}</td>
            <td class="text-right">{{$product_specifications->disk_memory}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-disk-capacity')}}</td>
            <td class="text-right">{{$product_specifications->disk_capacity}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-width')}}</td>
            <td class="text-right">{{$product_specifications->disk_width}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-height')}}</td>
            <td class="text-right">{{$product_specifications->disk_height}}</td>
        </tr>
        <tr>
            <td class="text-left"> {{__('products.product-depth')}} </td>
            <td class="text-right">{{$product_specifications->disk_depth}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-weight')}}</td>
            <td class="text-right">{{$product_specifications->disk_weight}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-usage')}}</td>
            <td class="text-right">{{$product_specifications->disk_usage}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-read-speed')}}</td>
            <td class="text-right">{{$product_specifications->disk_read_speed}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-write-speed')}}</td>
            <td class="text-right">{{$product_specifications->disk_write_speed}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-consumption')}}</td>
            <td class="text-right">{{$product_specifications->disk_disk_consumption}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-disk-life')}}</td>
            <td class="text-right">{{$product_specifications->disk_disk_life}}</td>
        </tr>
    </table>
</section>