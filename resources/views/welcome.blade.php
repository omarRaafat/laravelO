
@component('components.layout')
    <x-header title="header title"/>
    <div class="container">


       <img src="{{asset('files/'.\App\User::find(1)->file)}}" >
        <form action="/postpo" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="file" accept="image/*" required>
            <input type="submit" value="send">
        </form>

        <hr>

        @if(session()->has('message'))
            <div class="alert alert-success">

                <span class="">{{session()->get('message')}}</span>
            </div>
        @endif

        <form role="form" action="{{route('user-check')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('email')}}" placeholder="Enter email">
                @error('email')
                <span id="emailHelp" class="text-center text-danger">{{$message}}</span>
                    @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                @error('password')
                    <span id="emailHelp" class="text-center text-danger">{{$message}}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endcomponent
