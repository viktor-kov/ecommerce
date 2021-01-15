<section class="flex justify-evenly text-white">
    <div class="navigation w-64 h-32 list-none">
        <div class="line h-px w-full bg-white mt-4 mb-4"></div>
        <nav class="ml-4">
            <li><a href="">Domovská stránka</a></li>
            <li><a href="">Kategórie</a></li>
            <li><a href="">Kontakt</a></li>
            <li><a href="{{ route('login')}}">Prihlásiť sa</a></li>
            <li><a href="{{ route('register')}}">Registrovať sa</a></li>
        </nav>
    </div>
    <div class="common-questions  w-64 h-32 list-none">
        <div class="line h-px w-full bg-white mt-4 mb-4"></div>
        <nav class="ml-4">
            <li><a href="">Prečo práve my?</a></li>
            <li><a href="">Doprava</a></li>
            <li><a href="">Kariéra</a></li>
        </nav>
    </div>
    <div class="subscribe  w-2/5 h-32">
        <aside class="mt-3">
            <p>Chcete odoberať novinky zo strány easy-components.sk?</p>
            <p>Zadajte svoj email na odoberanie noviniek</p>
            <form action="{{route('subscribe.update')}}" method="post">
                @csrf
                <input type="mail" name="email" placeholder="email@email.com" class="w-full text-gray-700 p-1">
                <input type="submit" value="ODOBERAŤ" class="bg-green-500 p-2 mt-2 float-right cursor-pointer">
            </form>
        </aside>
    </div>
</section>