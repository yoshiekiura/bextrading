@extends('layouts.app')

@section('title')
     {{ __("Account types") }}
@endsection

@section('content')
         <!-- BREAADCRUMB SECTION -->
      <section class="my-breadcrumb">
         <div class="container page-banner">
            <div class="row">
               <div class="col-sm-12 col-md-12 col-xs-12">
                  <h1>{{ __("Account types") }}</h1>
                  <ol class="breadcrumb">
                     <li><a href=" {{ route('home') }}">{{ __("Home") }}</a></li>
                     <li><a href="{{ route('cuentas') }}">{{ __("Account types") }}</a></li>
                     <li class="active">{{ __("Account types") }}</li>
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
                        <h3>{{ __("Smart Solutions") }}</h3>
                        <h2>{{ __("Individual Account") }}</h2>
                     </div>
                  </div>
                  <p align="justify">{{ __("This is a personal account to fullfill your financial goals. It takes no more than ten minutes to open an account") }}</p>
                  <p align="justify">{{ __("Personal account allows you to operate your investment very easy.") }} </p>
                  <p align="justify"> {{ __("When become our customer an advisor will be assigned to you, providing strategiest need it to acomplish your goals.") }} </p>

               </div>
               <a href="{{route('register')}}" class="btn btn-custom">Open an Account</a>
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
                        <h2>{{ __("Corporative account") }} </h2>
                     </div>
                  </div>
                  <p align="justify"> {{ __("Corporate account takes no more than 10 minutes to open.") }} </p>
                  <p align="justify">  {{ __("We believe that technology and markets are a very important part of a our life. Connectivity, is essencial to focus on your main goal. Corporate account will enhance this connectivity towards investment opportunities that will let you to speculate with financial markets, providing you control in a digital world.") }}  </p>
                  <p class="marginbottom30"> {{ __("We understand your needs, that's why client services and all our team is focus to help you reach your financial goals.") }} </p>

                  <a href="{{route('register')}}" class="btn btn-custom">{{ __("Open an account") }}</a>
               </div>
            </div>
         </div>
      </section>

      @include('web.partials.actcall')
@endsection
