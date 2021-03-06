<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!--[if IE]>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ScriptsBundle">
    <title> @yield('title',  'Inicio') | {{ config('app.name') }}</title>
    <link rel="icon" href="/pages/images/favicon.ico" type="image/x-icon">
    <!-- BOOTSTRAPE STYLESHEET CSS FILES -->
    <link rel="stylesheet" href="/pages/css/bootstrap.css">
    <!-- JQUERY SELECT -->
    <link href="/pages/css/select2.min.css" rel="stylesheet"/>
    <!-- JQUERY MENU -->
    <link rel="stylesheet" href="/pages/css/megamenu.css">
    <!-- ANIMATION -->
    <link rel="stylesheet" href="/pages/css/animate.min.css">
    <!-- OWl  CAROUSEL-->
    <link rel="stylesheet" href="/pages/css/owl.carousel.css">
    <link rel="stylesheet" href="/pages/css/owl.style.css">
    <link href="/pages/css/magnific-popup.css" rel="stylesheet">
    <!-- TEMPLATE CORE CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="/pages/css/style.css">
    <!-- ICON FONTS -->
    <link rel="stylesheet" type="text/css" href="/pages/css/font-awesome.min.css">
    <link rel="stylesheet" href="/pages/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="/pages/css/et-line-fonts.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/pages/fonts/seo-and-marketing/flaticon.css">
    <!--  MASTER SLIDER -->
    <link rel="stylesheet" href="/pages/masterslider/css/masterslider.css" />
    <link href="/pages/masterslider/css/style.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/pages/masterslider/css/layer-style.css">
    <link href="/pages/masterslider/css/ms-staff-style.css" rel='stylesheet' type='text/css'>
    @stack('styles')

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,500,700,800%7COpen+Sans:400,600,700" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{--  registro de cuenta  --}}

    <!-- Fin de registro de cuenta -->
  </head>

  <body>

    <div class="header-top clear">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-6 hidden-xs">
            <div class="header-top-left header-top-info">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-top-white">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="header-top-left header-top-info">
              <a href="{{ route('main') }}">
                <img src="/pages/images/logo-white.png" alt="logo" class="img-responsive"> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- menu start -->
      <nav id="menu-1" class="mega-menu low-height">
        <section class="menu-list-items">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <ul class="menu-logo">
                  <li></li>
                </ul>
                <div class="clearfix"></div>

                  @guest

                <ul class="menu-links pull-right">
                  <li>
                    <a href="{{ route('login') }}">
                      <i class="fa fa-power-off"></i> {{ __('Login') }} </a>
                    </li>
                    <li>
                      <a href="{{route('register')}}">
                        <i class="fa fa-user"></i>{{ __('Register') }}</a>
                      </li>
                      @else
                      <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
                @endguest
                  <li>
                    <a href="">
                     {{ __("Language") }}
                      <i class="fa fa-angle-down fa-indicator"></i>
                    </a>
                    <ul class="drop-down-multilevel">
                      <li>
                        <a href="{{ route('set_language',['es']) }}">{{ __('Spanish') }}</a>
                      </li>
                      <li>
                        <a href="{{ route('set_language',['en']) }}"> {{ __('English') }}</a>
                      </li>

                    </ul>
                  </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </nav>
  <!-- menu end -->
  <div class="clearfix"></div>

  @if (Session::has('success'))
  <div class="alert alert-danger"><h3>{{ Session::get('success') }}</h3></div>
  @endif

  @yield('content')

  @include('web.partials.footer')

  @stack('scripts')

</body>

</html>
