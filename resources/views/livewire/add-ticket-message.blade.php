<div>
    <form wire:submit.prevent="saveMessage" action="#" method="POST">
        @csrf
        <textarea name="ticket_text" rows="10" class="w-full border border-black p-2" wire:model.defer="ticket_text" placeholder="{{__('ticket.ticket-message')}}"></textarea>
        @error('ticket_text') <span class="text-red-500">{{ $message }}</span> @enderror
        <button type="submit" class="p-2 bg-green-500 text-white block mt-2 cursor-pointer w-full">{{__('ticket.send-message')}}</button>
    </form>
</div>
