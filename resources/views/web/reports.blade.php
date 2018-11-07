@extends('layouts.app')

@section('title')
      {{ __("Market reports") }}
@endsection

    @section('content')
   <section id="services">
         <div class="container">
            <div class="row">

               <div class="col-md-12 col-sm-12 col-xs-12 heading">
                  <span class="heading-letter-style">{{ __("Market Reports") }}</span>
                  <div class="main-heading-container">
                     <h1>{{ __("Research Intelligent Report") }}</h1>
                     <h3>{{ __("Strategy reports") }}</h3>
                     <p>{{__("Investing shouldn't be difficult")}}</p>
                  </div>
               </div>

               <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                  <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
                     <div class="services-box">
                        <div class="iconbox">
                           <i class="ti-stats-up"></i>
                           <div class="iconbox-meta">
                              <h4><a href="https://berlingercapital.com/rep/gold_report2018.pdf" target="_blank">{{ __("Gold Market Report") }}</a></h4>
                              <p>{{ __("Where is Gold heading these comming up months? are you ready for an investment oppportunity to hedge or take adventage?.") }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
                     <div class="services-box">
                        <div class="iconbox">
                           <i class="ti-bar-chart"></i>
                           <div class="iconbox-meta">
                              <h4><a href="https://berlingercapital.com/rep/" target="_blank">{{ __("Seasonality Market Report") }}</a></h4>
                              <p>{{ __("This report reveals all the seasonality best investments where we focus to find the top market opportunities. Do you like to test it out?") }}</p>
                           </div>
                        </div>
                     </div>
                  </div>

                   <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
                     <div class="services-box">
                        <div class="iconbox">
                           <i class="ti-bar-chart"></i>
                           <div class="iconbox-meta">
                              <h4><a href="https://berlingercapital.com/rep/">{{ __("Bitcoin Market Report") }}</a></h4>
                              <p>{{ __("As you may know crypto currency is generating more and more followers. We have created a secure and fast way for you not to miss any cryptocurrency investment opportunity.") }}</p>
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

