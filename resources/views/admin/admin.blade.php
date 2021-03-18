@extends('layouts.adminlayout')

@section('extra-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
@endsection

@section('navigation')
    <section class="grid grid-cols-1 lg:grid-cols-4">
        <nav class="w-full">
            <ul class="text-lg font-semibold">
                <li class="p-4 bg-gray-300 border border-black mb-1">{{__('admin.users')}}: {{$users}}</li>
                <li class="p-4 bg-gray-300 border border-black mb-1">{{__('admin.newsletter')}} {{$subscriptions}}</li>
                <li class="mb-1"><a href="{{route('allproducts')}}" class="block p-4 border border-black hover:bg-gray-100">{{__('admin.products')}}{{$products}}</a></li>
                <li class="mb-1"><a href="{{route('newproduct')}}" class="block p-4 border border-black hover:bg-gray-100">{{__('admin.add-product')}}</a></li>
                <li class="mb-1"><a href="{{route('allusers')}}" class="block p-4 border border-black hover:bg-gray-100">{{__('admin.users')}}</a></li>
                <li class="mb-1"><a href="{{route('orders')}}" class="block p-4 border border-black hover:bg-gray-100">{{__('admin.orders')}}</a></li>
                <li class="mb-1"><a href="{{route('review.index')}}" class="block p-4 border border-black hover:bg-gray-100">{{__('admin.see-reviews')}}</a></li>
            </ul>
        </nav>
        <aside class="col-span-3">
            <canvas id="myChart"></canvas>
        </aside>
    </section>
@endsection

@section('footer-js')
<script>
    let data = {{$actions}}
    let days = {!!$days!!}
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: days,
            datasets: [{
                label: 'Traffic',
                data: data,
                backgroundColor: [
                    'rgba(77, 175, 124, 0.2)',
                    'rgba(250, 128, 114, 0.2)',
                    'rgba(250, 128, 114, 0.2)',
                    'rgba(250, 128, 114, 0.2)',
                    'rgba(250, 128, 114, 0.2)',
                    'rgba(250, 128, 114, 0.2)',
                    'rgba(250, 128, 114, 0.2)',
                ],
                borderColor: [
                    'rgba(77, 175, 124, 1)',
                    'rgba(250, 128, 114, 1)',
                    'rgba(250, 128, 114, 1)',
                    'rgba(250, 128, 114, 1)',
                    'rgba(250, 128, 114, 1)',
                    'rgba(250, 128, 114, 1)',
                    'rgba(250, 128, 114, 1)',
                ],
                borderWidth: 2
            }]
        },
    });
</script>
@endsection