<section class="grid grid-cols-2 lg:grid-cols-3 text-white p-4">
    <div class="list-none grid justify-around">
        <nav>
            <ul>
                <li><a href="">Domovská stránka</a></li>
                <li><a href="">Kategórie</a></li>
                <li><a href="">Kontakt</a></li>
                <li><a href="{{ route('login')}}">Prihlásiť sa</a></li>
                <li><a href="{{ route('register')}}">Registrovať sa</a></li>
            </ul>
        </nav>
    </div>
    <div class="list-none grid justify-around">
        <nav>
           <ul>
                <li><a href="">Prečo práve my?</a></li>
                <li><a href="">Doprava</a></li>
                <li><a href="">Kariéra</a></li>
           </ul>
        </nav>
    </div>
    <div class="grid col-span-full p-2 lg:col-span-1 lg:p-0">
        <aside>
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