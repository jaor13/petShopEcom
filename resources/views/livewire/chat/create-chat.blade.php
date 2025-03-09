<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    @foreach ($users as $user)



    <ul class="list-group w-75 mx-auto mt-3 container-fluid">

    <li class="list-group-item list-group-item-action">{{$user->username}}</li>
    
    </ul>

    @endforeach

</div>