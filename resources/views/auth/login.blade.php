@extends('layouts.app')

@section('content')
<style>
    #a{
        text-decoration: none;
        color: #00ADB5;
    }
    .card {
        background-color: #C7C7C7;
        border-radius: 15px;
    }

    #imglogo{
        width:500px
    }
    .animatedC {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

</style>
<div class="container animatedC">
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-8">
            <div class="card shadow-lg ">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-center mt-5">
                                <img src="{{asset('storage/logo/logoOnly2.png')}}" alt="" id="imglogo">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-lg-12 col-form-label">{{ __('Email Address:') }}</label>
                                    <div class="col-lg-12">
                                        <input id="email" type="email" class="form-control shadow border border-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-lg-12 col-form-label">{{ __('Password:') }}</label>
                                    <div class="col-lg-12">
                                        <input id="password" type="password" class="form-control shadow border border-3 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-12">
                                        <div class="form-check">
                                            <input class="form-check-input shadow border border-3" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary shadow-lg">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" id="a" href="{{ route('password.request') }}">
                                               Lupa Password?
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
