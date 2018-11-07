@extends('layouts.app')
@section('content')
    @include('web.partials.slider')
    <section id="features" class="light-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="heading-2">
                        <h3>{{ __("Why us?") }}</h3>

                        <h2>{{ __("Why Do Our Customers Love Us?") }}</h2>
                        <p>{{ __("We are focused on being a complement to your investments with the latest advisory generation") }}</p>
                    </div>
                    <div class="feature-icon-box">
                        <i class="ti-target"></i>
                        <p>{{ __("We make your financial goals possible.") }} </p>
                    </div>
                    <div class="feature-icon-box">
                        <i class="ti-headphone-alt"></i>
                        <p>{{ __("Creating customer loyalty through service customization.") }}</p>
                    </div>
                    <div class="feature-icon-box">
                        <i class="ti-mobile"></i>
                        <p>{{ __("Live account access.") }}</p>
                    </div>
                    <div class="feature-icon-box">
                        <i class="ti-money"></i>
                        <p>{{ __("We have what you are seeking financially.") }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <ul class="accordion">
                        <li>
                            <h3 class="accordion-title"><a href="#"> <i
                                            class="ti-align-left"></i> {{ __("How do we complement your investment?") }}
                                </a></h3>
                            <div class="accordion-content">
                                <p>{{ __("In the best way to improve each portfolio. We seek for market niches that offer the best advisory experience.") }}</p>
                            </div>
                        </li>
                        <li>
                            <h3 class="accordion-title"><a href="#"> <i
                                            class="ti-align-left"></i>{{ __("How our platform works?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("It's an easy and self-explanatory platform designed for our clients to easily umderstand their investment.") }}</p>
                            </div>
                        </li>
                        <li>
                            <h3 class="accordion-title"><a href="#"> <i
                                            class="ti-align-left"></i>{{ __("How do I open an account?") }}</a></h3>
                            <div class="accordion-content">
                                <p>{{ __("Opening an account is easy! Just fill-out the online form with your data and personal budget to invest. After, you will immediately be granted all access to initiate your investment.") }}</p>

                            </div>
                        </li>
                        <li>
                            <h3 class="accordion-title"><a href="#"> <i
                                            class="ti-align-left"></i>{{ __("What type of accounts do we manage?") }}
                                </a></h3>
                            <div class="accordion-content">
                                <p>{{ __("We work individual and corporate accounts, our vision is always to offer the best service to our clients.") }}</p>
                            </div>
                        </li>
                        <li>
                            <h3 class="accordion-title"><a href="#"> <i
                                            class="ti-align-left"></i>{{ __("What do I need to do to get a free financial advisor?") }}
                                </a></h3>
                            <div class="accordion-content">
                                <p>{{ __("Our advice is free and focus on your financial goals. In order to receive one, just fill out the 'GET ADVICE' form.") }}</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="call-to-action-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
                    <div class="call-to-action-detail-section">
                        <div class="heading-2">
                            <h3>{{ __("Limited offer") }}</h3>
                            <h2>{{ __("Get a free professional financial advisor") }}</h2>
                        </div>
                        <p>{{ __("Market investments shouldn't be that hard to understand.") }} </p>
                        <ul>
                            <li><i class="fa fa-check"></i> {{ __("Individual account") }}</li>
                            <li><i class="fa fa-check"></i> {{ __("Corporate account") }}</li>
                            <li><i class="fa fa-check"></i>{{ __("Management account") }}</li>
                        </ul>
                        <a href="{{ route('requestcall') }}" class="btn-custom btn">{{ __("Request advice") }}<i
                                    class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 nopadding hidden-sm">
                    <div class="call-to-action-img-section-right">
                        <img src="/pages/images/bolsabursatil.jpg" class="img-responsive" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('web.partials.actcall')


@endsection
