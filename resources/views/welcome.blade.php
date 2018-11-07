<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!--SEO Meta Tags-->
    <meta charset="utf-8">
    <!-- SITE TITLE -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'CoinSys') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
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


  <body  data-spy="scroll" data-target="#data-scroll">

    <!-- Navbar -->
    <div class="navbar navbar-custom sticky" role="navigation">
        <div class="container">
            <!-- TradingView Widget BEGIN -->
            <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span
                    class="blue-text"></span></a></div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
                        {
                            "symbols"
                            :
                            [
                            {
                                "title": "S&P 500",
                                "proName": "INDEX:SPX"
                            },
                            {
                                "title": "CRUDE OIL/USD",
                                "proName": "NYMEX:CLZ2018"
                            },
                            {
                                "title": "GOLD/USD",
                                "proName": "OANDA:XAUUSD"
                            },
                            {
                                "title": "BTC/USD",
                                "proName": "BITFINEX:BTCUSD"
                            },
                            {
                                "title": "ETH/USD",
                                "proName": "BITFINEX:ETHUSD"
                            }
                            ],
                            "locale"
                            :
                            "en",
                            "linkPageTemplate"
                            :
                            "https://mycgo.net/member/exchange?950"
                        }
                    </script>
                </div>
                <!-- TradingView Widget END -->

                <!-- Navbar-header -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="ti-menu"></i>
                    </button>
                    <!-- LOGO -->

                    <a class="navbar-brand logo" href="{{ route('inicio') }}">
                        <img src="/theme/images/mycgologo.png" width="100" height="30" alt="">
                    </a>
                </div>
                <!-- end navbar-header -->
                @if (Route::has('login'))

                <!-- menu -->
                <div class="navbar-collapse collapse" id="data-scroll">
                    <ul class="nav navbar-nav navbar-left">

                        <li class="active">
                            <a class="scroll-func" href="{{ url('/') }}">Inicio</a>
                        </li>

                        <li>
                            <a class="scroll-func" href="#About">Nosotros</a>
                        </li>

                        <li>
                            <a href="#Currencies">Divisas</a>
                        </li>
                    </ul>
                    @auth
                    <ul class="nav navbar-nav navbar-right">
                        <li class="mx-2">
                         <a class="btn btn-danger btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-logout"></i>
                         Salir
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST"
                     style="display: none;">
                     {{ csrf_field() }}
                 </form>
             </li>
         </ul>

         @else
         <ul class="nav navbar-nav navbar-right">
            <li class="mx-2">
                <button class="btn btn-primary btn-block" onclick="window.location.href='{{ route('register') }}'"><i class="glyphicon glyphicon-user"></i> Registrarse</button>
            </li>

            <li class="mx-2">
             <button class="btn btn-success btn-block" onclick="window.location.href='{{ route('login') }}'"><i class="fa fa-key"></i> Ingreso</button>
         </li>
     </ul>
     @endauth

     @endif
 </div>
 <!--/Menu -->
</div>
<!-- end container -->
</div>



<!-- HOME -->
<section class="home bg-image2 home-small" id="home">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="home-wrapper home-intro row vertical-content">
                    <div class="col-md-6 text-center">
                        <h1>CGO Markets</h1>
                        <h4 class="normal-font-w">Líderes en mercados corporativos. Brindando herramientas de alta calidad.</h4>
                        <a href="{{ route('usertickets') }}" class="btn btn-custom"><i class="fa fa-line-chart"></i> Mercados</a>
                        <a href="https://www.youtube.com/watch?v=LhgxkatKmuQ" class="btn btn-success popup-video"><i class="glyphicon glyphicon-play"></i> Conózcanos</a>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    <!-- end container -->
</section>
<!-- END HOME -->



<!-- SERVICES -->
<section class="section bg-lightgray" id="About">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">

                    <p><span class="fa fa-bar-chart color-blue"></span> Que hacemos</p>
                    <h2 class="text-uppercase text-blue">Negocie en Confianza</h2>
                </div>
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <hr class="light">
                <p class="text-faded">
                    Proveemos individuos y empresas una experiencia de clase mundial para los mercados internacionales.
                    En el mundo actual, los inversionistas buscan  mejorar; sea nuevo o veterano en los mercados. Nuestra plataforma fue hecha para usted!
                </p>
                <div class="row"><a href="{{ route('usertickets') }}" class="btn btn-primary">Inicie Ya! <i class="fa fa-sign-in"></i></a></div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- end container -->
</section>
<!-- end SERVICES -->

<!-- FEATURES -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                <i class="fa fa-money fa-3x color-blue"></i>
                <h3 class="title">Tasas Bajas</h3>
                <p>Tasas competitivas y exclusivas flat fee. Consulte a nuestro asesor nuestras tasas y paquetes.</p>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                <i class="fa fa-lock fa-3x color-blue"></i>
                <h3 class="title">Seguridad</h3>
                <p>La mayoría de datos digitales son resguardados de forma segura y con respaldos encriptados offline.</p>
            </div>


            <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                <i class="fa fa-users fa-3x color-blue"></i>
                <h3 class="title">Experiencia</h3>
                <p>Nuestro equipo de expertos nos ayudan a contruir los mejores resultados para brindar un servicio de alta calidad a nuestros clientes.</p>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12 text-center">
                <i class="fa fa-support fa-3x color-blue"></i>
                <h3 class="title">24/7 Soporte</h3>
                <p>Nuestra plataforma nos brinda soporte de 24/7, esto no s ayuda a mantener un contacto directo en la plataforma de servicio al cliente.</p>
            </div>


        </div>
        <!-- end row -->

    </div> <!-- end container -->
</section>
<!-- end FEATURES -->


<!-- Currencies -->
<section class="section bg-lightgray" id="Currencies">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <p><span class="fa fa-money color-blue"></span>Criptodivisas para intercambio</p>
                    <h2 class="text-uppercase text-blue text-blue">Monedas disponibles</h2>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
                <a href="{{ route('exchangeindex') }}">
                    <img class="w-80" src="/theme/images/logos/ada.png" alt="ada">
                </a>
                <span class="label label-primary">Cardano</span><span class="label label-warning">New</span>

            </div>

            <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
               <a href="{{ route('exchangeindex') }}">
                <img class="w-80" src="/theme/images/logos/ark.png" alt="ark">
            </a>
            <span class="label label-primary">Ark</span><span class="label label-warning">New</span>

        </div>

        <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
           <a href="{{ route('exchangeindex') }}">
            <img class="w-80" src="/theme/images/logos/trx.png" alt="trx">
        </a>
        <span class="label label-primary">Tron</span><span class="label label-warning">New</span>
    </div>

    <div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
       <a href="{{ route('exchangeindex') }}">
        <img class="w-80" src="/theme/images/logos/eos.png" alt="eos">
    </a>
    <span class="label label-primary">Eos</span><span class="label label-warning">New</span>
</div>

<div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
   <a href="{{ route('exchangeindex') }}">
    <img class="w-80" src="/theme/images/logos/qtum.png" alt="qtum">
</a>
<span class="label label-primary">Qtum</span><span class="label label-warning">New</span>
</div>
<div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
   <a href="{{ route('exchangeindex') }}">
    <img class="w-80" src="/theme/images/logos/btc.png" alt="btc">
</a>
<span class="label label-primary">Bitcoin</span><span class="label label-warning">Top</span>
</div>
<div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
   <a href="{{ route('exchangeindex') }}">
    <img class="w-80" src="/theme/images/logos/eth.png" alt="eth">
</a>
<span class="label label-primary">Ethereum</span><span class="label label-warning">Old</span>
</div>
<div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
   <a href="{{ route('exchangeindex') }}">
    <img class="w-80" src="/theme/images/logos/ltc.png" alt="ltc">
</a>
<span class="label label-primary">Litecoin</span><span class="label label-warning">Old</span>
</div>
<div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
   <a href="{{ route('exchangeindex') }}">
    <img class="w-80" src="/theme/images/logos/dash.png" alt="dash">
</a>
<span class="label label-primary">Dash</span><span class="label label-warning">Old</span>
</div>
<div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
   <a href="{{ route('exchangeindex') }}">
    <img class="w-80" src="/theme/images/logos/sc.png" alt="sc">
</a>
<span class="label label-primary">Siacoin</span><span class="label label-warning">Old</span>
</div>
<div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
   <a href="{{ route('exchangeindex') }}">
    <img class="w-80" src="/theme/images/logos/xem.png" alt="xem">
</a>
<span class="label label-primary">Nem</span><span class="label label-warning">Old</span>
</div>
<div class="col-md-1 col-sm-2 col-xs-4 m-t-9 text-center">
   <a href="{{ route('exchangeindex') }}">
    <img class="w-80" src="/theme/images/logos/rep.png" alt="rep">
</a>
<span class="label label-primary">Augur</span><span class="label label-warning">Old</span>
</div>
</div>
</div>
</div> <!-- end container -->
</section>
<!-- end Currencies -->

<!-- FOOTER -->
<footer class="bg-dark footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-12">
                <h4 class="logo"> <div class="brand-logo"><img src="/theme/images/mycgologo.png" width="100" height="30" alt="Mycgo"> </div></h4>
                <p>En MY CGO MARKETS hemos recorrido un camino de cambios, optimizaciones y crecimiento.  Todo esto con una visión de alta tecnología e inteligencia desde el desarrollo, manejo de riesgo. Así mismo, nos caracterizamos por los resultados a plazos determinados, asset management y principalmente en la satisfacción de nuestros socios, clientes e inversionistas.</p>

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
                <h5>Reportes</h5>
                <ul class="list-unstyled footer-list">
                 <li><a href="http://cgomarkets.com/cgowhitepaper2018.pdf" target="_blank">Reporte Inversión: Bitcoin</a></li>
                 <li><a href="http://cgomarkets.com/Gasolina2018-CGOmarkets.pdf" target="_blank">Reporte Inversón: Gasolina</a></li>
                 <li><a href="http://cgomarkets.com/cgowhitepaper2018-DowJones.pdf" target="_blank">Reporte Inversión: DowJones </a></li>
                 <li><a href="http://cgomarkets.com/recursos.html#toggle1-3f" target="_blank">Preguntas Frecuentes</a></li>
                 <li><a href="http://cgomarkets.com/PorQueCGOMarkets.html" target="_blank">Más de nosotros</a></li>
             </ul>
         </div>

         <div class="col-md-3 col-sm-6">
            <h5>Enlaces importantes</h5>
            <ul class="list-unstyled footer-list">
                <li><a href="#About">Nosotros</a></li>
                <li><a href="http://cgomarkets.com/Contacto.html" target="_blank">Soporte 24/7</a></li>
                <li><a href="#">Políticas y Privacidad</a></li>
                <li><a href="#">Términos &amp; Condiciones</a></li>
                <li><a href="http://cgomarkets.com/recursos.html#toggle1-3f" target="_blank">FAQ</a></li>
            </ul>
        </div>

    </div> <!-- end row -->


</div> <!-- end container -->
</footer>
<!-- end FOOTER -->


<!-- COPYRIGHT -->
<div class="footer-alt bg-dark">
    <p class="copy-rights">2018 © {{config('app.name')}}. All Rights Reserved. </p>
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

<script>
    jQuery(document).ready(function($) {
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:false,
            autoplay: true,
            autoplayTimeout: 4000,
            responsive:{
                0:{
                    items:1
                }
            }
        });

    });
</script>

</body>
</html>
