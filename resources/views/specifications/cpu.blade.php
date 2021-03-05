<section class="p-8">
    <table class="w-full table-fixed">
        <tr>
            <th class="w-1/4 text-left">specifikácia</th>
            <th class="w-3/4 text-right">dáta</th>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cpu-series')}}</td>
            <td class="text-right">{{$product_specifications->cpu_series}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cpu-socket')}}</td>
            <td class="text-right">{{$product_specifications->cpu_socket}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cpu-cores')}}</td>
            <td class="text-right">{{$product_specifications->cpu_cores}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cpu-threads')}}</td>
            <td class="text-right">{{$product_specifications->cpu_threads}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cpu-frequency')}}</td>
            <td class="text-right">{{$product_specifications->cpu_frequency}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-max-cpu-frequency')}}</td>
            <td class="text-right">{{$product_specifications->cpu_max_frequency}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cpu-ram')}}</td>
            <td class="text-right">{{$product_specifications->cpu_ram}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cpu-max-channels')}}</td>
            <td class="text-right">{{$product_specifications->cpu_max_channels}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-functions')}}</td>
            <td class="text-right">{{$product_specifications->cpu_functions}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-tdp')}}</td>
            <td class="text-right">{{$product_specifications->cpu_tdp}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-manufacture-technology')}}</td>
            <td class="text-right">{{$product_specifications->cpu_technology}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cpu-cache')}}</td>
            <td class="text-right">{{$product_specifications->cpu_cache}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-cpu-chipset')}}</td>
            <td class="text-right">{{$product_specifications->cpu_chipset}}</td>
        </tr>
    </table>
</section>