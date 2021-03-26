<section class="grid grid-cols-2 lg:grid-cols-3 text-white p-4">
    <div class="list-none grid justify-around">
        <nav>
            <ul>
                <li><a href="{{route('home.index')}}">{{__('other.home-page')}}</a></li>
                <li><a href="{{route('contact')}}">{{__('other.contact')}}</a></li>
                <li><a href="{{ route('login')}}">{{__('auth.login')}}</a></li>
                <li><a href="{{ route('register')}}">{{__('auth.register')}}</a></li>
            </ul>
        </nav>
    </div>
    <div class="list-none grid justify-around">
        <nav>
           <ul>
                <li><a href="{{route('whyus')}}">{{__('other.why-us')}}</a></li>
                <li><a href="{{route('delivery')}}">{{__('other.delivery')}}</a></li>
                <li><a href="{{route('career')}}">{{__('other.career')}}</a></li>
           </ul>
        </nav>
    </div>
    <div class="grid col-span-full p-2 lg:col-span-1 lg:p-0">
        <aside>
            <p>{!! __('other.subscribe-text') !!}</p>
            <form action="{{route('subscribe.update')}}" method="post">
                @csrf
                <input type="email" name="email" placeholder="email@email.com" class="w-full text-gray-700 p-1">
                <input type="submit" value="{{__('other.subscribe-btn')}}" class="bg-green-500 p-2 mt-2 float-right cursor-pointer">
            </form>
        </aside>
    </div>
</section>