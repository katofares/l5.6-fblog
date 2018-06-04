@extends('layouts.auth')

@section('title') Register @endsection
@section('content')
<div class="login-content">
    <div class="login-logo">
        <a href="{{ route('blogs.index') }}">
            <h2>My blog</h2>
        </a>
    </div>
    <div class="login-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="User Name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
            <div class="social-login-content">
                <div class="social-button">
                    <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Register with facebook</button>
                    <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Register with twitter</button>
                </div>
            </div>
            <div class="register-link m-t-15 text-center">
                <p>Already have account ? <a href="{{ route('login') }}"> Login</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
