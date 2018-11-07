@extends('layouts.app')

@section('title')
      {{ __("Our services") }}
@endsection

    @section('content')
   <section id="services">
         <div class="container">
            <div class="row">

               <div class="col-md-12 col-sm-12 col-xs-12 heading">
                  <span class="heading-letter-style">{{ __("Services") }}</span>
                  <div class="main-heading-container">
                     <h1>{{ __("Our services") }}</h1>
                     <h3>{{ __("Better strategies in your financial plan") }}</h3>
                     <p>{{ __("Investing shouldn't be difficult") }}</p>
                  </div>
               </div>

               <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                  <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
                     <div class="services-box">
                        <div class="iconbox">
                           <i class="ti-lock"></i>
                           <div class="iconbox-meta">
                              <h4><a href="">{{ __("Security") }}</a></h4>
                              <p>{{ _("Each account openning or advisory We provide you with high  standards into the compliance security process.") }} </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
                     <div class="services-box">
                        <div class="iconbox">
                           <i class="ti-settings"></i>
                           <div class="iconbox-meta">
                              <h4><a href="">{{ __("Financial planning") }}</a></h4>
                              <p>{{ __("Whether you want a simple investment solution, or investing advice, we offer a range of options.") }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
                     <div class="services-box">
                        <div class="iconbox">
                           <i class="ti-face-smile"></i>
                           <div class="iconbox-meta">
                              <h4><a href="{{route('cuentas')}}">{{ __("Individual accounts") }}</a></h4>
                              <p>{{ __("These accounts are for individuals that search diversification on their portfolios and seek for different opportunities.") }} </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
                     <div class="services-box">
                        <div class="iconbox">
                           <i class="ti-align-left"></i>
                           <div class="iconbox-meta">
                              <h4><a href="">{{ __("Market analysis") }}</a></h4>
                              <p>{{ __("Innovation must be part of our corporation filosofy implemented in technical analysis") }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
                     <div class="services-box">
                        <div class="iconbox">
                           <i class="ti-agenda"></i>
                           <div class="iconbox-meta">
                              <h4><a href="{{route('cuentas')}}">{{ __("Corporate accounts") }}</a></h4>
                              <p>{{ __("Designed to adquired diversification on the markets, getting the most relevant market opportunities.") }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
                     <div class="services-box">
                        <div class="iconbox">
                           <i class="ti-headphone"></i>
                           <div class="iconbox-meta">
                              <h4><a href="">{{ __("Client services") }}</a></h4>
                              <p>{{ __("Our services are based to bring each client the best experience") }}</p>
                           </div>
                        </div>
                     </div>
                  </div>


               </div>
            </div>
         </div>
      </section>
      @include('web.partials.actcall')
    @endsection

