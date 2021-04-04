<div>
    <form wire:submit.prevent="passwordUpdate" action="#" method="POST">
        @csrf
        @method('PUT')
        <aside class="mt-4">
            <p class="md:flex md:justify-between m-1">
                <span class="break-words">Staré heslo:</span> <input type="password" name="current_password" class="w-full md:w-3/4 border border-black p-1" wire:model="current_password">
            </p>
            @error('current_password') <span class="text-red-500">{{ $message }}</span> @enderror
            <p class="md:flex md:justify-between m-1">
                <span class="break-words">Nové heslo:</span> <input type="password" name="new_password" class="w-full md:w-3/4 border border-black p-1" wire:model="new_password">
            </p>
            @error('new_password') <span class="text-red-500">{{ $message }}</span> @enderror
            <p class="w-full">
                <input type="submit" value="{{__('profile.update-pwd')}}" class="w-full p-2 bg-green-500 text-white mt-1 cursor-pointer">
            </p>
        </aside>
    </form>
</div>
