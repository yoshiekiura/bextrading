@extends('layouts.app')

@section('title')
{{ __("Contact") }}
@endsection

@section('content')
<!-- BREAADCRUMB SECTION -->
<section class="my-breadcrumb">
    <div class="container page-banner">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <h1>{{ __("Contact") }}</h1>

                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">{{ __("Home") }}</a></li>
                    <li><a href="{{ route('contacto') }}">{{ __("Contact") }}</a></li>
                    <li class="active">{{ __("Contact") }}</li>
                </ol>

            </div>
        </div>
    </div>
</section>
<section class="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 heading">
                <span class="heading-letter-style">{{ __("Contact") }}</span>
                <div class="main-heading-container">
                    <h1>{{ __("Do you have any questions?") }}</h1>
                    <h3>{{ __("Please write to us") }}</h3>
                    <p>{{ __("We are here to serve you and answer any questions you might have.") }}</p>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <div class="col-md-12 col-sm-12 col-xs-12 alert-success alert_message"></div>
                    <div class="loader-img" id="loader"><img src="/pages/images/loader.gif" alt="loader"
                     class="img-responsive"></div>
                     <form class="row" action="{{ route('contactForm') }}" method="post">

                        @csrf

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" {{ $errors->has('nombre') ? 'has-error' : '' }}>
                                <label>{{ __("Name") }} <span class="required">*</span></label>
                                <input placeholder="{{__('Full name')}}" name="nombre" class="form-control" type="text"
                                value="{{ old('nombre') }}">
                                {!! $errors->first('nombre', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" {{ $errors->has('asunto') ? 'has-error' : '' }}>
                                <label>{{ __("Subject") }} <span class="required">*</span></label>
                                <input placeholder="{{__('Subject')}}" name="asunto" class="form-control" type="text"
                                value="{{ old('asunto') }}">
                                {!! $errors->first('asunto', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" {{ $errors->has('email') ? 'has-error' : '' }}>
                                <label>{{ __("Email") }} <span class="required">*</span></label>
                                <input placeholder="{{ __("Email") }}" name="email" class="form-control" type="email"
                                value="{{ old('email') }}">
                                {!! $errors->first('email', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group" {{ $errors->has('telefono') ? 'has-error' : '' }}>
                                <label>{{ __("Telephone") }} <span class="required">*</span></label>
                                <input placeholder="{{ __("Telephone") }}" name="telefono" class="form-control" type="text"
                                value="{{ old('telefono') }}">
                                {!! $errors->first('telefono', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group" {{ $errors->has('mensaje') ? 'has-error' : '' }}>
                                <label>{{ __("Message") }} <span class="required">*</span></label>
                                <textarea cols="6" name="mensaje" rows="6" placeholder="{{ __("Message") }}"
                                class="form-control">{{ old('mensaje') }}</textarea>
                                {!! $errors->first('mensaje', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <input class="btn btn-custom" value="{{ __("Send") }}" type="submit">
                        </div>
                    </form>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="contact-detail-box">
                        <div class="icon-box">
                            <i class="ti-book"></i>
                        </div>
                        <div class="content-area">
                            <h4>Borsenstrasse, Switzerland
                            </h4>
                            <p>Zurich</p>
                        </div>
                    </div>
                    <div class="contact-detail-box">
                        <div class="icon-box">
                            <i class="ti-alarm-clock"></i>
                        </div>
                        <div class="content-area">
                            <h4>{{ __("Working hrs") }}</h4>
                            <p>{{ __('Mon - Fri, 8AM - 6PM') }} </p>
                        </div>
                    </div>
                    <div class="contact-detail-box">
                        <div class="icon-box">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="content-area">
                            <h4>{{ __("Office telephone") }}</h4>
                            <p><span>{{ __("Telephone") }}</span> +41 435-080800</p>
                        </div>
                    </div>
                    <div class="contact-detail-box">
                        <div class="icon-box">
                            <i class="ti-email"></i>
                        </div>
                        <div class="content-area">
                            <h4>{{ __("Email") }}</h4>
                            <p><span>{{ __("Email") }}</span>info@berlingercapital.com </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.partials/actcall')
@endsection
