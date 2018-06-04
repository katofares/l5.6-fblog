@extends('layouts.auth')

@section('content')
<div class="login-content">
    <div class="login-form">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary btn-flat m-b-15">Send Password Reset Link</button>

        </form>
    </div>
</div>
@endsection
