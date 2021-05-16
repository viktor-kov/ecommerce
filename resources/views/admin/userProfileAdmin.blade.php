@extends('layouts.adminlayout')

@section('messages')
    @if (session()->get('success'))
        @include('messages.success')
    @endif

    @if (session()->get('error'))
        @include('messages.error')
    @endif
@endsection

@section('extra-js')

    <script type="text/javascript">
        $(document).ready( function() {
            $('#message').delay(5000).fadeOut();
        });
    </script>

@endsection

@section('stats')

 <section class="grid grid-cols-1 md:grid-cols-2 gap-x-1 mt-12 p-2">
     <section>
        <h1>{{__('admin.email')}} {{$user->email}}</h1>
        <p>{{__('admin.registered')}} {{$user->created_at}}</p>
        <p>{{__('admin.role')}}</p>
        <aside>
            <form action="{{route('userupdate', ['id' => $user->id])}}" method="post" class="flex bg-gray-300">
                @csrf
                @method('PUT')
                <select name="role" id="role" class=" bg-gray-300 w-full">
                    <option value="1" <?php echo ($user->current_team_id == 1) ? 'selected' : ''?>>Admin</option>
                    <option value="0" <?php echo ($user->current_team_id == 0) ? 'selected' : ''?>>Customer</option>
                    <input type="submit" value="{{__('admin.update')}}" class="p-4 bg-red-600 text-white">
                </select>
            </form>
        </aside>
     </section>
    <aside class="mx-auto">
        <img src="{{asset('img/avatars/'.$user->profile_photo_path)}}" alt="" class="h-72 w-72 rounded-full border border-black">
    </aside>
 </section>
 <section class="p-2">
     <h1 class="text-3xl">{{__('checkout.ship-adress')}}</h1>
     @if(isset($informations))
         <article>
             <div>
                 <h1>{{__('profile.name')}}</h1> <p class="border border-black block w-full p-1">{{$informations->name}}</p>
             </div>
             <div>
                 <h1>{{__('profile.lastname')}}</h1> <p class="border border-black block w-full p-1">{{$informations->lastname}}</p>
             </div>
             <div>
                 <h1>{{__('profile.town')}}</h1> <p class="border border-black block w-full p-1">{{$informations->town}}</p>
             </div>
             <div>
                 <h1>{{__('profile.zip')}}</h1> <p class="border border-black block w-full p-1">{{$informations->psc}}</p>
             </div>
             <div>
                 <h1>{{__('profile.street')}}</h1> <p class="border border-black block w-full p-1">{{$informations->street}}</p>
             </div>
             <div>
                 <h1>{{__('profile.house-id')}}</h1> <p class="border border-black block w-full p-1">{{$informations->house_id}}</p>
             </div>
             <div>
                 <h1>{{__('profile.phone-number')}}</h1> <p class="border border-black block w-full p-1">{{$informations->phone_number}}</p>
             </div>
         </article>
     @else
        <p class="text-2xl">{{__('admin.no-informations')}}</p>
     @endif
 </section>
 <section class="p-2">
     <h1 class="text-3xl">{{__('products.previous-orders')}}</h1>
     <ul>
         @forelse($invoices as $invoice)
             <li class="bg-gray-300  p-2 border border-black mb-1 flex justify-end">
                 <a href="{{route('order.show', ['id' => $invoice->id])}}" class="w-full" target="_blank">{{$invoice->created_at->format('H:i | d.m.Y')}}</a>
             </li>
         @empty
             <li>
                 <p class="text-2xl">{{__('order.no-order')}}</p>
             </li>
         @endforelse
     </ul>
 </section>
@endsection
