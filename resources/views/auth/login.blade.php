@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="login-card mx-auto" >
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="text-center">
                    <h2 class="text-warning ml-0 "><img src="{{ asset('img/babillardcm_logo.png')}}" class="img-fluid w-100"/> </h2>
                </div>
                <div class="card shadow-lg ">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Please Sign In') }}</h3>
                    </div>
                    <div class="card-body ">
                        <div class="text-center my-4 mx-auto mt-0">
                            <a href="/login/facebook" class="btn btn-lg btn-facebook mx-1"><i class="fab fa-facebook"></i> Facebook </a>
                            <a href="/login/twitter" class="btn btn-lg btn-twitter"><i class="fab fa-twitter"></i> Twitter </a>
                        </div>
                        <hr>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="{{ __('Password') }}" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 ml-1 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary">
                                        <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-facebook pull-left" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                             <a href="{{route('register')}}" class="btn btn-link text-facebook float-right"> <i class="fas fa-user-plus"></i> {{ __('Register') }}</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
                <div class="text-center my-2 mx-auto mt-0 text-facebook">
                    <a href="/lang/en" class="btn btn-link text-facebook">English</a> |
                    <a href="/lang/fr" class="btn btn-link text-facebook">French </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
