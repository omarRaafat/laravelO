
@component('components.layout')
    <x-header title="header title"/>
    <div class="container">
        <ul class="list-group">
            @if(session()->has('users'))
            @foreach(session()->get('users') as $user)

                <li>{{$user['name']}}</li>

            @endforeach
            @endif
        </ul>

       <img src="{{asset('files/'.\App\User::find(1)->file)}}" width="300px" height="300px">
        <form action="/postpo" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept="image/png">
            <input type="submit" value="send">
        </form>
    </div>

@endcomponent
