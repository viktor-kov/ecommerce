<section class="p-8">
    <table class="w-full table-fixed border-collapse border-solid border-gray-300 border">
        <tr class="bg-green-300">
            <th class="w-1/2 text-left p-4">Parameter</th>
            <th class="w-1/2 text-left p-4">Špecifikácia</th>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-cpu-series')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_series}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-cpu-socket')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_socket}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-cpu-cores')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_cores}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-cpu-threads')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_threads}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-cpu-frequency')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_frequency}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-max-cpu-frequency')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_max_frequency}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-cpu-ram')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_ram}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-cpu-max-channels')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_max_channels}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-functions')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_functions}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-tdp')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_tdp}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-manufacture-technology')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_technology}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-cpu-cache')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_cache}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-cpu-chipset')}}</td>
            <td class="text-left p-4">{{$product_specifications->cpu_chipset}}</td>
        </tr>
    </table>
</section>