@extends('layouts.app')

@section('title')
      {{ __("Frequently asked questions") }}
@endsection

@section('content')

    <section class="my-breadcrumb">
        <div class="container page-banner">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <h1>{{ __("FAQs") }}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">{{ __("Home") }}</a></li>
                        <li><a href="{{ route('contacto') }}">{{ __("Contact") }}</a></li>
                        <li class="active">{{ __("FAQs") }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="faq light-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 heading">
                    <span class="heading-letter-style">{{ __("FAQs") }}</span>
                    <div class="main-heading-container">
                        <h1>{{ __("Frequently asked questions") }}</h1>
                        <h3>{{ __("Knowledge base") }}</h3>
                        <p>{{ __("FAQs you must take into consideration") }}</p>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ul class="accordion">
                           <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("How do I start an investment with you?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("First of all, you must create an account with us. You will have total control of your account. Then you need to fund your account to activate the ability to buy and sell financial assets.") }}</p>
                            </div>
                        </li>

                         <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("What's the minimum amount to invest?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("We cater to all budgets. In our opinion it is the maximum that you can afford without jeopardizing your lifestyle.") }}</p>
                            </div>
                        </li>

                        <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("How often can I expect returns of my investment?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("Investment returns are set depending on the strategy and advisory you applied for in your account. Most common returns are monthly, quartely, or yearly.") }}</p>
                            </div>
                        </li>



                        <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("What is a financial investment?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("A financial investment is an asset that you put money into with the hope that it will grow or appreciate into a larger sum of money. The idea is that you can later sell it at a higher price or earn money on it while you own it. You may be looking to grow something over the next year, such as saving up for a car, or over the next 30 years, such as saving for retirement.") }}</p>
                            </div>
                        </li>

                        <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("What is the stock market?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("The stock market refers to the collection of markets and exchanges where the issuing and trading of equities or stocks of publicly held companies, bonds, and other classes of securities take place.") }}</p>
                            </div>
                        </li>




                    </ul>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ul class="accordion">

                         <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("What is a financial Leverage?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("Leverage enables the traders to trade bigger amount of money by having a small amount of money in their accounts. Usually, leverage is set by the market itself. Each financial product can work an specific leverage that allows you to access a bigger amount of money limiting your risk and enhancing your gains.") }}</p>
                            </div>
                        </li>

                        <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("What is a cryptocurrency?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("A cryptocurrency is a digital or virtual currency designed to work as a medium of exchange. It uses cryptography to secure and verify transactions as well as to control the creation of new units of a particular cryptocurrency. Essentially, cryptocurrencies are limited entries in a database that no one can change unless specific conditions are fulfilled.") }}</p>
                            </div>
                        </li>

                         <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("What is a seasonal investment?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("A seasonal investment is a strategy to take advantage of the seasonal patterns of the U.S. stock market by allocating to equities during the strong season (loosely defined as Fall and Winter) and into low risk interest as a demand is approching).") }}</p>
                            </div>
                        </li>

                         <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("How do you know it is a good time to invest?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("A good investment happens because of a series of annual recurring events. Our job is to analys and examine if the annual events are likely to recur prior to a period of seasonal strength. If annual recurring events are less likely to occur, our recommendation will avoid a trade") }}</p>
                            </div>
                        </li>


                         <li>
                            <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> {{ __("What is an investment fund?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("An investment fund is a way of investing money alongside other investors in order to benefit from the inherent advantages of working as part of a group. These advantages include an ability to:hire professional investment managers, which may potentially be able to offer better returns and more adequate risk management.") }}</p>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
   {{--  <section class="funfacts arch-funfacts">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 nopadding">
                    <div class="conter-grid">
                        <div class="counter-seprator">
                            <div class="icon-container">
                                <img src="images/funfact/1.png" alt="">
                            </div>
                            <div class="counter-box">
                                <h5 class="counter-stats">53,000</h5>
                                <h3 class="count-title">Happy Clients</h3>
                            </div>
                        </div>
                        <div class="counter-seprator">
                            <div class="icon-container">
                                <img src="images/funfact/2.png" alt="">
                            </div>
                            <div class="counter-box">
                                <h5 class="counter-stats">65,900</h5>
                                <h3 class="count-title">Websites Served</h3>
                            </div>
                        </div>
                        <div class="counter-seprator">
                            <div class="icon-container">
                                <img src="images/funfact/3.png" alt="">
                            </div>
                            <div class="counter-box">
                                <h5 class="counter-stats">18390</h5>
                                <h3 class="count-title">TB Capacity</h3>
                            </div>
                        </div>
                        <div class="counter-seprator">
                            <div class="icon-container">
                                <img src="images/funfact/4.png" alt="">
                            </div>
                            <div class="counter-box">
                                <h5 class="counter-stats">29,800</h5>
                                <h3 class="count-title">Working Hours</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    @include('web.partials.requestcall')

  @include('web.partials.actcall')

@endsection
