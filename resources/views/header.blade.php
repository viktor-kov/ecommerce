
<nav class="flex justify-between text-white pr-4 pl-4 leading-9">
    <div class="hidden desktop:block">
        <h1><a href="http://localhost/www/ecommerce/public/">easy-components</a></h1>
    </div>

    <ul class="flex">
            <li class="pr-8">
                @foreach (Config::get('language') as $lang => $language)
                    <a href="{{route('lang', ['lang' => $lang])}}">
                        @if ($lang == App::getLocale())
                            <strong class="text-green-400">{{$language}}</strong>
                        @else
                            {{$language}}
                        @endif
                    </a>
                @endforeach
            </li>
            <li class="mr-8 {{(Cart::count() > 0) ? 'text-green-400' : ''}}">
                <a href="{{route('cart.index')}}"><i class="fas fa-shopping-cart mr-1"></i>{{(Cart::count() > 0) ? Cart::count() : ''}}</a>
            </li>
        @if (! auth()->user())
            <li class="pr-8"><a href="{{ route('login')}}">{{__('auth.login')}}</a></li>
            <li class="pr-4"><a href="{{ route('register')}}">{{__('auth.register')}}</a></li>
        @else
            <li class="pr-4"><a href="{{route('profile')}}">{{auth()->user()->email}}</a></li>
            <li class="pr-4"> 
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