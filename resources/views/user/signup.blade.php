@extends('layouts.guest', ['title' => 'Signup'])
@section('content')
    <div class="col-md-3 m-auto">
        <form id="login-form" method="POST" action="{{ route('user.create') }}" enctype='multipart/form-data'>
            @csrf
            @include('layouts.partials.message');
            <h2 class="text-center">Create Account</h2>

            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp">
                @if ($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                @if ($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
            </div>

               <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input name="password_confirmation" type="" class="form-control" id="exampleInputPassword1">
                @if ($errors->has('password_confirmation'))
                    <div class="error">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <p>Already have an account go back to login. <a class="btn btn-primary" href="{{ route('user.login.index') }}">
                    Login</a></p>
        </form>
    </div>
@endsection
