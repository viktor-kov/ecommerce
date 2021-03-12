
<nav class="grid grid-cols-1 md:grid-cols-2 text-white pr-4 pl-4 leading-9 flex-wrap">
    <div class="flex justify-between">
        <h1><a href="{{route('home.index')}}">easy-components</a></h1>
        <li class="flex">
            @foreach (Config::get('language') as $lang => $language)
                <a href="{{route('lang', ['lang' => $lang])}}" class="pr-1">
                    @if ($lang == App::getLocale())
                        <strong class="text-green-400">{{$language}}</strong>
                    @else
                        {{$language}}
                    @endif
                </a>
            @endforeach
        </li>
    </div>

    <ul class="flex justify-between md:justify-self-end">
            <li class="pr-2 {{(Cart::count() > 0) ? 'text-green-400' : ''}}">
                <a href="{{route('cart.index')}}"><i class="fas fa-shopping-cart mr-1"></i>{{(Cart::count() > 0) ? Cart::count() : ''}}</a>
            </li>
        @if (! auth()->user())
            <li class="pr-2"><a href="{{ route('login')}}">{{__('auth.login')}}</a></li>
            <li class="pr-2"><a href="{{ route('register')}}">{{__('auth.register')}}</a></li>
        @else
            <li class="pr-2"><a href="{{route('profile')}}">{{auth()->user()->email}}</a></li>
            <li class="pr-2"> 
                <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{__('auth.logout')}}
                </a>
                </form>
            </li>
        @endif
    </ul>
</nav>