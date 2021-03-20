<div class="w-full bg-red-500 p-4">
    <ul>
        @foreach ($errors->all() as $error)
            <li class="bg-red-400 p-2 rounded-md mb-1">{{ $error }}</li>
        @endforeach
    </ul>
</div>