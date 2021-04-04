<div>
    <div>
        @if (session()->has('success'))
            <section class="w-full bg-green-400">
                <p class="text-center text-white p-2">{{session()->get('success')}}</p>
            </section>
        @endif
        <form wire:submit.prevent="updateInformations" action="#" method="POST" class="p-1 w-full">
            @csrf 
            @method('PUT')
                <p class="w-full block">
                    {{__('profile.name')}} <input type="text" name="name" class="border border-black block w-full p-1" wire:model="name">
                </p>
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                <p class="w-full block">
                    {{__('profile.lastname')}} <input type="text" name="lastname" class="border border-black block w-full p-1" wire:model="lastname">
                </p>
                @error('lastname') <span class="text-red-500">{{ $message }}</span> @enderror
                <p>
                    {{__('profile.town')}} <input type="text" name="town" class="border border-black block p-1 w-full" wire:model="town">
                </p>
                @error('town') <span class="text-red-500">{{ $message }}</span> @enderror
                <p>
                    {{__('profile.zip')}} <input type="text" name="psc" class="border border-black block p-1 w-full" wire:model="psc">
                </p>
                @error('zip') <span class="text-red-500">{{ $message }}</span> @enderror
                <p>
                    {{__('profile.street')}} <input type="text" name="street" class="border border-black block p-1 w-full" wire:model="street">
                </p>
                @error('street') <span class="text-red-500">{{ $message }}</span> @enderror
                <p>
                    {{__('profile.house-id')}} <input type="text" name="house_id" class="border border-black block p-1 w-full" wire:model="house_id">
                </p>
                @error('house_id') <span class="text-red-500">{{ $message }}</span> @enderror
                <p>
                    {{__('profile.phone-number')}} <input type="text" name="phone_number" class="border border-black block p-1 w-full" wire:model="phone_number">
                </p>
                @error('phone_number') <span class="text-red-500">{{ $message }}</span> @enderror
                <p>
                    <input type="submit" value="{{__('profile.update-info')}}" class="p-2 bg-green-500 text-white mt-2 mb-2 w-full cursor-pointer">
                </p>
        </form>
    </div>
    
</div>
