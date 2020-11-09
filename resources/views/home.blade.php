
@component('components.layout')
    <x-header title="header title 2" meta="meta"/>
    <div class="container">
        <ul class="list-group">
       @foreach($users as $user)

               <li>{{$user['name']}}</li>

        @endforeach
        </ul>
    </div>

@endcomponent
