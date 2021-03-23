<div>
    <form wire:submit.prevent="saveMessage">
        <textarea name="ticket_text" rows="10" class="w-full border border-black p-2" wire:model="ticket_text"></textarea>
        <button type="submit" class="p-2 bg-green-500 text-white block mt-2 cursor-pointer w-full">Submit</button>
    </form>
</div>
