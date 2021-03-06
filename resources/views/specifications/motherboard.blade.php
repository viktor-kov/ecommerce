<section class="p-8">
    <table class="w-full table-fixed border-collapse border-solid border-gray-300 border">
        <tr class="bg-green-300">
            <th class="w-1/2 text-left p-4">Parameter</th>
            <th class="w-1/2 text-left p-4">Špecifikácia</th>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-cpu-socket')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_socket}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-cpu-chipset')}} </td>
            <td class="text-left p-4">{{$product_specifications->motherboard_chipset}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-motherboard-format')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_format}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-functions')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_functions}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-ram-type')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_memory}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-motherboard-ram-slots')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_memory_slots}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-motherboard-ram-insertion')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_memory_insertion}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-ram-frequency')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_memory_frequency}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-motherboard-extern')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_extern}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-motherboard-intern')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_intern}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-motherboard-pci-x16')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_pci_x16}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-motherboard-pci-x1')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_pci_x1}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-m2')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_m2}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-usb20')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_usb20}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-usb32')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_usb32}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border bg-gray-100">
            <td class="text-left p-4">{{__('products.product-usb31')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_usb31}}</td>
        </tr>
        <tr class="border-solid border-gray-300 border">
            <td class="text-left p-4">{{__('products.product-sata')}}</td>
            <td class="text-left p-4">{{$product_specifications->motherboard_sata}}</td>
        </tr>
    </table>
</section>