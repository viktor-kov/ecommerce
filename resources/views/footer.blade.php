<section class="grid grid-cols-2 lg:grid-cols-3 text-white p-4">
    <div class="list-none grid justify-around">
        <nav>
            <ul>
                <li><a href="{{ route('show.gdpr')}}">{{__('other.gdpr')}}</a></li>
                <li><a href="{{ route('show.termsOfUse')}}">{{__('other.terms-of-use')}}</a></li>
                <li><a href="{{route('contact')}}">{{__('other.contact')}}</a></li>
                <li><a href="{{ route('comparison.show')}}">{{__('comparison.compare')}}</a></li>
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
            @livewire('email-subscribe')
        </aside>
    </div>
</section>
