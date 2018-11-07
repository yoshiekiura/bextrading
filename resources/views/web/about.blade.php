@extends('layouts.app')

@section('title')
      {{ __("About us") }}
@endsection

@section('content')
         <!-- BREAADCRUMB SECTION -->
      <section class="my-breadcrumb">
         <div class="container page-banner">
            <div class="row">
               <div class="col-sm-12 col-md-12 col-xs-12">
                  <h1>{{ __("About us") }}</h1>
                  <ol class="breadcrumb">
                     <li><a href="{{ route('home') }}">{{ __("Home") }}</a></li>
                     <li><a href="{{ route('about') }}">{{ __("About us") }}</a></li>
                     <li class="active">{{ __("About us") }}</li>
                  </ol>
               </div>
            </div>
         </div>
      </section>

      <section id="about-2" class="light-blue">
         <div class="container">
            <div class="row">
               <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3">
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                     <div class="heading-2">
                        <h3> {{ __("Smart Solutions") }}</h3>
                        <h2>{{ __("We provide a financial planning") }}</h2>
                     </div>
                  </div>
                  <p align="justify"> {{ __("We are on a mision to provide financial solutions. We curretly have an investment community that is focused on the growth of an investor's capital") }} </p>
                  <p align="justify"> {{ __("When you are our client you will have an advisor asigned to complete your financial goals, generating a solid in a long term relationship") }} </p>

               </div>
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <img src="/pages/images/nosotros.jpg" class="img-responsive center-block" alt="" />
               </div>
            </div>
         </div>
      </section>

      <section class="">
         <div class="container">
            <div class="row">
               <div class="col-md-5 col-sm-6 hidden-sm">
                  <img src="/pages/images/trading.jpg" class="img-responsive" alt="">
               </div>
               <div class="col-md-7 col-sm-12 col-xs-12">
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                     <div class="heading-2">
                        <h3> {{ __("Technology and experience") }}</h3>
                        <h2> {{ __("An extraordinary combitation.") }} </h2>
                     </div>
                  </div>
                  <p align="justify"> {{ __("We believe that technology  and markets are part of our life. Connectivity is escential to our personal and working life. Our part is providing you with tools to connect investment financial vehicules to speculate in the markets, enhancing your financial control . We want to be your favorite broker") }} </p>
                  <p class="marginbottom30">{{ __("We believe in human attention and we are interesting to know our clients to understand the best way to get your goals.") }} </p>

                  <a href="{{ route('requestcall') }}" class="btn btn-custom">{{ __("Request advisory") }}</a>
               </div>
            </div>
         </div>
      </section>

      @include('web.partials.actcall')
@endsection
