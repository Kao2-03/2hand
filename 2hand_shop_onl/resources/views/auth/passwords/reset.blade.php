@extends('layouts.apps')

@section('content')
    <div class="body">
        <div class="login">
            <div class="login__inner">
                <div class="login__row">
                    <p class="login__heading">Reset Password</p>
                    <a href="{{ route('login') }}" class="btn-register">Login</a>
                </div>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value={{ $token }}>
                    <div class="login-input-wrap">
                        <input id="email" type="email" class="login-input @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="login-input-wrap">
                        <input id="password" type="password" class="login-input @error('password') is-invalid @enderror"
                            name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="login-input-wrap">
                        <input id="password-confirm" type="password" class="login-input" name="password_confirmation"
                            placeholder="Confirm Password" required autocomplete="new-password">
                        <span class="text-danger">@error('password_confirmation'){{$message}} @enderror</span>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="pwd-cons">The password must be at least 8 characters long, contain at least 1 uppercase letter, at least 1 special character, and at least 1 digit</p>
                    <button type="submit" class="btn btn-login">
                        Reset Password
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
