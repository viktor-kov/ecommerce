@extends('layouts.adminlayout')

@section('navigation')

@endsection

@section('stats')
 
 <section class="grid grid-cols-2 gap-x-1 mt-12">
     <section>
        <h1>Email: {{$user['email']}}</h1>
        <p>Registrácia: {{$user['created_at']}}</p>
        <p>Rola</p>
        <aside>
            <form action="../userupdate/{{$user['id']}}" method="post" class="flex bg-gray-300">
                @csrf
                <select name="role" id="role" class=" bg-gray-300 w-full">
                    <option value="1" <?php echo ($user['current_team_id'] == 1) ? 'selected' : ''?>>Admin</option>     
                    <option value="0" <?php echo ($user['current_team_id'] == 0) ? 'selected' : ''?>>Customer</option>
                    <input type="submit" value="Update" class="p-4 bg-red-600 text-white">
                </select>
            </form>
        </aside>
     </section>
    <aside class="mx-auto">
        <img src="{{asset('img/avatars/'.$user['profile_photo_path'])}}" alt="" class="h-72 w-72 rounded-full border border-black">
    </aside>
 </section>
@endsection