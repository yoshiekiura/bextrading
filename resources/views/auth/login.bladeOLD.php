<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!--SEO Meta Tags-->
    <meta charset="utf-8">
    <!-- SITE TITLE -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'CoinSys') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('theme/app/css/bootstrap.css') }}">

    <!-- Icon CSS -->
    <link href="{{ asset('theme/css/themify-icons.css') }}" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{ asset('theme/plugins/fontawesome/css/font-awesome.css') }}">

    <!-- Owl Carousel CSS -->
    <link href="{{ asset('theme/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- Magnific-popup -->
    <link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css') }}">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('theme/app/css/app.css') }}">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body data-spy="scroll" data-target="#data-scroll">

    <!-- Navbar -->
    <div class="navbar navbar-custom sticky navbar-dark" role="navigation">
        <div class="container">

            <!-- Navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="ti-menu"></i>
                </button>
                <!-- LOGO -->

                <a class="navbar-brand logo" href="{{ route('inicio') }}">
                    <div class="brand-logo"><img src="/theme/images/mycgologo.png" width="100" height="30" alt="Mycgo"> </div>
                </a>
            </div>
            <!-- end navbar-header -->
            @if (Route::has('login'))
            @auth
            @else

            <!-- menu -->
            <div class="navbar-collapse collapse" id="data-scroll">
                <ul class="nav navbar-nav navbar-left">

                    <li class="active">
                        <a class="scroll-func" href="{{ url('/') }}">Home</a>
                    </li>
                    @endauth
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li class="mx-2">
                        <button class="btn btn-primary btn-block"
                        onclick="window.location.href='{{ route('register') }}'"><i
                        class="glyphicon glyphicon-user"></i> Register
                    </button>
                </li>

                <li class="mx-2">
                    <button class="btn btn-success btn-block"
                    onclick="window.location.href='{{ route('login') }}'"><i class="fa fa-key"></i>
                    Login
                </button>
            </li>
        </ul>


        @endif
    </div>
    <!--/Menu -->
</div>
<!-- end container -->
</div>



<!-- HOME -->
<section class="home home-small" id="home">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home-wrapper home-intro row vertical-content">

                    <div class="col-md-6 col-sm-8">
                        <div class="tabbable-panel">
                            <div class="tabbable-line">
                                <div class="tab-content tab-content-BuySell m-t-9">
                                  <div class="tab-pane active" id="tab_default_2">
                                    <div class="panel panel-body">
                                     <form class="intro-form" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}
                                        <h5><i class="fa fa-key"></i> Sign in<span>Tienes una cuenta? Registrese & inicie trading</span></h5>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input type="email" placeholder="Email Address" name="email" required="required">
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif


                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                               <input name="password" id="password" class="password" placeholder="Password" type="password" required="required">
                                               @if ($errors->has('password'))
                                               <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span> @endif
                                        </div>
                                        <button type="submit" class="btn btn-warning btn-block">Sign In</button>

                                        <p>Olvido su <a href="{{ route('password.request') }}">contraseña?</a>  </p>
                                    </form>
                                    <span id="result"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
</div>
<!-- end container -->
</section>
<!-- END HOME -->


<footer class="bg-dark footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-12">
                <h4 class="logo"><div class="brand-logo"><img src="/theme/images/mycgologo.png" width="100" height="30" alt="Mycgo"> </div></h4>
                <p>En MY CGO MARKETS hemos recorrido un camino de cambios, optimizaciones y crecimiento. Todo esto con
                    una visión de alta tecnología e inteligencia desde el desarrollo, manejo de riesgo. Así mismo, nos
                    caracterizamos por los resultados a plazos determinados, asset management y principalmente en la
                satisfacción de nuestros socios, clientes e inversionistas.</p>

                <ul class="list-inline social">
                    <li>
                        <a href="javascript:void(0);" class="bg-twitter"><i class="ti-twitter-alt"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="bg-dribbble"><i class="ti-dribbble"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="bg-linkedin"><i class="ti-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="bg-googleplus"><i class="ti-google"></i></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="bg-facebook"><i class="ti-facebook"></i></a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6 col-md-offset-2">
                <h5>Soluciones</h5>
                <ul class="list-unstyled footer-list">
                    <li><a href="#">Fee Info</a></li>
                    <li><a href="#">Start Trading</a></li>
                    <li><a href="#">We are Hiring</a></li>
                    <li><a href="#">Blog Posts</a></li>
                    <li><a href="#">API Docs</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6">
                <h5>Enlaces importantes</h5>
                <ul class="list-unstyled footer-list">
                    <li><a href="#About">Nosotros</a></li>
                    <li><a href="#">Help &amp; Support</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">FAQ</a></li>
                </ul>
            </div>

        </div> <!-- end row -->


    </div> <!-- end container -->
</footer>
<!-- end FOOTER -->


<!-- COPYRIGHT -->
<div class="footer-alt bg-dark">
    <p class="copy-rights">2018 © {{config('app.name')}}. All Rights Reserved</p>
</div>




<script src="{{ asset('theme/plugins/jquery/jquery.js') }}"></script>
<script src="{{ asset('theme/plugins/bootstrap/js/bootstrap.js') }}"></script>

<!-- Sticky Header -->
<script src="{{ asset('theme/js/jquery.sticky.js') }}"></script>

<!-- Jquery easing -->
<script src="{{ asset('theme/js/jquery.easing.1.4.1.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('theme/js/owl.carousel.min.js') }}"></script>

<!-- Magnific Popup -->
<script src="{{ asset('theme/js/jquery.magnific-popup.js') }}"></script>

<!-- Custom js -->
<script src="{{ asset('theme/js/landing.js') }}"></script>

<script src="{{ asset('theme/app/js/app.js') }}"></script>

</body>
</html>
