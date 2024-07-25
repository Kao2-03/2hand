@extends('layouts.apps')

@section('content')
    <div class="body">
        <div class="login">
            <div class="login__inner">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="login__row">
                        <p class="login__heading">Create New Account</p>
                        <a href="{{ route('login') }}" class="btn-register">Login</a>
                    </div>

                    <div class="login-input-wrap">
                        <input id="name" type="text" class="login-input @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="login-input-wrap">
                        <input id="email" type="email" class="login-input @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
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
                    </div>
                    <p class="pwd-cons">The password must be at least 8 characters long, contain at least 1 uppercase
                        letter, at least 1 special character, and at least 1 digit</p>
                    <button type="submit" class="btn btn-login">
                        Create Account
                    </button>

                    <div class="or">
                        <div class="separate"></div>
                        <p>OR</p>
                        <div class="separate"></div>
                    </div>

                    <a href="#!" class="login-with">
                        <img src="{{ asset('icons/facebook.svg') }}" alt="" class="login__icon">
                        <p class="login-with__social">Continue with Facebook</p>
                    </a>
                    <a href="{{ route('google-auth') }}" class="login-with">
                        <img src="{{ asset('icons/google.svg') }}" alt="" class="login__icon">
                        <p class="login-with__social">Continue with Google</p>
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
