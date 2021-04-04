<div>
    <form wire:submit.prevent="subscribe" action="#" method="post">
        @csrf
        <input type="email" name="email" placeholder="email@email.com" class="w-full text-gray-700 p-1" wire:model="email">
        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        <input type="submit" value="{{__('other.subscribe-btn')}}" class="bg-green-500 p-2 mt-2 float-right cursor-pointer">
    </form>
    <div>
        @if (session()->has('success'))
            <p class="text-green-400">{{session()->get('success')}}</p>
        @endif
    </div>
</div>
