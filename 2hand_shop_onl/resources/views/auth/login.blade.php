@extends('layouts.apps')

@section('content')
    <div class="body">
        <div class="login">
            <div class="login__inner">


                <div class="login__row">
                    <p class="login__heading">Login</p>
                    <a href="{{ route('register') }}" class="btn-register">Register</a>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
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
                    <div class="login__row-check">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="forget-password" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-login">
                        Đăng nhập
                    </button>

                    <div class="or">
                        <div class="separate"></div>
                        <p>OR</p>
                        <div class="separate"></div>
                    </div>

                    <a href="{{ route('facebook-auth') }}" class="login-with">
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
