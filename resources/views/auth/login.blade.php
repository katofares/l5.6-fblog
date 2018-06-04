@extends('layouts.auth')


@section('title') Login @endsection
@section('content')
<div class="login-content">
    <div class="login-logo">
        <a href="{{ route('blogs.index') }}">
            <h2>My blog</h2>
        </a>
    </div>
    <div class="login-form">
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                @if ($errors->has('password'))
                <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} > Remember Me
                </label>
                <label class="pull-right">
                    <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                </label>

            </div>
            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
            <div class="social-login-content">
                <div class="social-button">
                    <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                    <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                </div>
            </div>
            <div class="register-link m-t-15 text-center">
                <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
