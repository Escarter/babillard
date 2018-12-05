@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center">
                <h2 class="text-warning ml-0 "><img src="{{ asset('img/babillardcm_logo.png')}}" class="img-fluid w-100"/> </h2>
            </div>
            <div class="card shadow-lg ">
                <div class="card-header">
                    <h3 class="card-title">Please Register </h3>
                </div>
                <div class="card-body ">
                    <!-- <div class="text-center my-4 mx-auto mt-0">
                        <a href="#" class="btn btn-lg btn-google mx-2" autofocus><i class="fab fa-google-plus-square"></i> Google </a>
                        <a href="#" class="btn btn-lg btn-facebook"><i class="fab fa-facebook"></i> Facebook </a>
                    </div>
                    <hr> -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}"  placeholder="{{ __('First Name')}}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}"  placeholder="{{ __('Last Name')}}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('user_phone') ? ' is-invalid' : '' }}" name="user_phone" value="{{ old('user_phone') }}"  placeholder="{{ __('Phone Number') }}" required>

                                @if ($errors->has('user_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('user_phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  placeholder="{{ __('E-Mail Address') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <!-- <input id="country" type="text" class="form-control" required> -->
                                <select class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}"  >
                                  @include("auth.country_dropdown")
                                </select>
                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="{{ __('Password') }}" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="{{ __('Confirm Password') }}" required>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_type" id="inlineRadio1" value="internal">
                                <label class="form-check-label" for="inlineRadio1">{{ __('Belong to a University') }}</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="user_type" id="inlineRadio2" value="external">
                                <label class="form-check-label" for="inlineRadio2">{{ __('Not in a University')}}</label>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">
                                    <i class="fas fa-user-plus"></i> {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <div class="text-right mt-2">
                            {{__('Already  a member?') }}<a href="{{route('login')}}" class="btn btn-link text-facebook"><i class="fa fa-sign-in-alt"></i> {{__('Sign In') }}</a>
                        </div>
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
@endsection
