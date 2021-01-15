
<nav class="flex text-white leading-9">
    <div class="logo w-1/4">
        <h1 class="text-center"><a href="http://localhost/www/ecommerce/public/">easy-components</a></h1>
    </div>

    <ul class="flex w-9/12 justify-end">
        @if (! auth()->user())
            <li class="pr-8"><a href="{{ route('login')}}">Prihlásiť sa</a></li>
            <li class="pr-4"><a href="{{ route('register')}}">Zaregistrovať sa</a></li>
        @else
        <li class="pr-4"><a href="{{route('profile')}}">{{auth()->user()->email}}</a></li>
        <li class="pr-4"> 
            <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                Odhlásiť sa
            </a>
            </form>
        </li>
        @endif
    </ul>
</nav>