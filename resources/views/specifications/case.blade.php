<section class="p-8">
    <table class="w-full table-fixed">
        <tr>
            <th class="w-1/4 text-left">specifikácia</th>
            <th class="w-3/4 text-right">dáta</th>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-size')}}</td>
            <td class="text-right">{{$product_specifications->case_size}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-color')}}</td>
            <td class="text-right">{{$product_specifications->case_color}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-motherboard-format')}}</td>
            <td class="text-right">{{$product_specifications->case_motherboard_format}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-supply-format')}}</td>
            <td class="text-right">{{$product_specifications->case_supply}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-width')}}</td>
            <td class="text-right">{{$product_specifications->case_width}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-height')}}</td>
            <td class="text-right">{{$product_specifications->case_height}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-depth')}}</td>
            <td class="text-right">{{$product_specifications->case_depth}}</td>
        </tr>
        <tr>
            <td class="text-left">{{__('products.product-weight')}}</td>
            <td class="text-right">{{$product_specifications->case_weight}}</td>
        </tr>
    </table>
</section>