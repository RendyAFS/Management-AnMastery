@extends('layouts.app')

@section('content')
<style>
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
    <div class="row justify-content-center mt-5 pt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body shadow-lg">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="d-flex justify-content-center mt-5 pt-5">
                                <img src="{{asset('storage/logo/logoOnly2.png')}}" alt="" id="imglogo">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-12 col-form-label ">{{ __('Name:') }}</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control shadow @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-12 col-form-label ">{{ __('Email Address:') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control shadow @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-12 col-form-label ">{{ __('Password:') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control shadow @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-12 col-form-label ">{{ __('Confirm Password:') }}</label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control shadow" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-3" style="display:none">
                                    <label for="level" class="col-md-12 col-form-label ">{{ __('Level') }}</label>

                                    <div class="col-md-12" >
                                        <input id="level" type="text" class="form-control" name="level" value="user">
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-12 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
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
