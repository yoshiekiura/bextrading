@extends('layouts.app')
@section('title')
{{ __("Login") }}
@endsection
@push('styles')
<link rel="stylesheet" href="/wizard/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/wizard/css/form-elements.css">
{{-- <link rel="stylesheet" href="/wizard/css/style.css"> --}}
@endpush

@section('content')
<div class="container">
   <br>

   <header><h3>{{ __('Access your Account') }}</h3></header>
   <div class="col-md-10 offset-2">
       <div class="clearfix"></div>

       <div class="card">
        <div class="card-header"></div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field()  }}

                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-8 offset-md-2">

                    <button type="submit" class="btn btn-primary" >
                           Login
                        </button>
                    </div>

                </div>

                <div class="form-group col-md-8">
                     <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>

                    {{ __("Not a member yet?") }}

                    <div class="form-group row">
<a href="{{ route('register') }}">{{ __("Open an account for free") }}</a> {{ __("in less than 5 minutes!") }}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
