@extends('layouts.apps')

@section('content')
    <div class="body">
        <div class="login">
            <div class="login__inner">
                <div class="login__row">
                    <p class="login__heading">Reset Password</p>
                    <a href="{{ route('register') }}" class="btn-register">Đăng ký</a>
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-ssuccess">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="login-input-wrap">
                        <input id="email" type="email" class="login-input @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email"
                            autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-login">
                        Send Password Reset Link
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
