<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta content="MyCGO-Interface" name="description"/>
    <meta name="keywords"
          content="crypto, commodities, bitcoins, ethereum, dogecoin, iota, ripple, siacoin, exchange, trading platform, crypto trading">
    <title>{{ config('app.name', 'TradeSys') }}</title>
    <link rel="stylesheet" href=" {{ asset('theme/app/css/bootstrap.css') }}">
    <link rel="stylesheet" href=" {{ asset('theme/plugins/fontawesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css')}}">
    <link rel="stylesheet" href=" {{ asset('theme/plugins/animo/animate+animo.css') }}">
    <link rel="stylesheet" href=" {{ asset('theme/plugins/csspinner/csspinner.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('theme/app/css/app.css') }}">
    <script src=" {{ asset('theme/plugins/modernizr/modernizr.js') }}"></script>
    <script src=" {{ asset('theme/plugins/fastclick/fastclick.js') }}"></script>
</head>
<body>

<div id="overlayLoader">
    <div id="preloader">
        <span></span>
        <span></span>
    </div>
</div>

<section class="wrapper">
    <nav class="navbar navbar-default navbar-top navbar-fixed-top">
        <div class="navbar-header">
            <a href="{{route('usertickets')}}" class="navbar-brand">
                <div class="brand-logo"><img src="/pages/images/logo.png" width="170" height="30" alt=""></div>
                <div class="brand-logo-collapsed"><i class="fa fa-line-chart"></i></div>
            </a>
        </div>
        <div class="nav-wrapper">
            <ul class="nav navbar-nav mt0">
                <li>
                    <a href="#" data-toggle="aside">
                        <em class="fa fa-align-left"></em>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right mt0">
                <li class="dropdown dropdown-list">
                    <a href="#" data-toggle="dropdown" data-play="fadeIn" class="dropdown-toggle">
                        <strong style="color: black"><i class="fa fa-user-circle">&nbsp;</i>{{Auth::user()->name}}
                            Cuenta Nº {{ Auth::id() }} </strong>
                    </a>

                    <ul class="dropdown-menu">
                        {{--
                        <li><a href="#">Profile</a>
                        </li> --}}
                        <li><a href="{{ route('userconfig') }}">Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                Salir
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <aside class="aside">
        <nav class="sidebar">
            <ul class="nav">

                {{--menu cliente--}}
                <li>
                    <div data-toggle="collapse-next" class="item user-block has-submenu">
                        <div class="user-block-picture">
                            <img src="{{ asset('theme/app/img/user/avatar.png') }}" width="60" height="60"
                                 class="img-thumbnail img-circle account-img-mb">
                        </div>
                        <div class="user-block-info">
                            <span class="user-block-name item-text">{{Auth::user()->name}}</span>
                            <span class="user-block-role"><i class="fa fa-check text-green"></i> Verified</span>

                        </div>
                    </div>
                </li>


                <li class="active">
                    <a href="#" title="Markets" data-toggle="collapse-next" class="has-submenu">
                        <em class="fa fa-home"></em>
                        <div class="label pull-right"><i class="fa fa-line-chart"></i></div>
                        <span class="item-text">Markets</span>
                    </a>
                    <ul class="nav collapse in">
                        <li class="active">
                            <a href="{{ route('userdeposit') }}" title="Default" data-toggle="" class="no-submenu">
                                <i class="fa fa-usd"> </i><span class="item-text"> Deposit Funds</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{ route('usertradesumary', Auth::id()) }}" title="Default" data-toggle=""
                               class="no-submenu"><i class="fa fa-line-chart"> </i>
                                <span class="item-text">Tickets</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('usertickets') }}" title="Open Tickets" data-toggle=""
                               class="no-submenu"><i
                                        class="fa fa-folder-open"> </i>
                                <span class="item-text">Open orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('userticketsclose') }}" title="Ordenes Cerradas" data-toggle=""
                               class="no-submenu"><i class="fa fa-lock"> </i>
                                <span class="item-text">Closed orders</span>
                            </a>
                        </li>

                        <li>
                            <a href=" {{route('usertrades')}} " title="Historial Transacciones" data-toggle=""
                               class="no-submenu"><i class="fa fa-history"> </i>
                                <span class="item-text">Transaction History</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('contactbroker')}}" title="Solicitar asesoría" data-toggle=""
                               class="no-submenu"><i class="fa fa-angle-double-right"> </i>
                                <span class="item-text">Request advisory</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('graficas') }}" title="With Footer" data-toggle="" class="no-submenu"><i
                                        class="fa fa-line-chart"> </i>
                                <span class="item-text">Portfolio Graphs</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="{{route('exchangeindex')}}" title="Dashboard" class="">
                        <em class="fa fa-btc"></em>
                        <span class="item-text">Cryptocurrencies</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('graficas') }}" title="Pages" data-toggle="collapse-next" class="has-submenu">
                        <em class="fa fa-dollar"></em>
                        <span class="item-text">Deposits & Withdrawal</span>
                    </a>
                    <ul class="nav collapse ">

                        <li>
                            <a href="{{ route('userdeposit') }}" title="Depositar Fondos" data-toggle=""
                               class="no-submenu"><i class="fa fa-usd"> </i>
                                <span class="item-text">Deposit Funds</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('userwithdraw') }}" title="Retirar Fondos" data-toggle=""
                               class="no-submenu"><i
                                        class="fa fa-institution"> </i>
                                <span class="item-text">Withdrawal Funds</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="{{ route('graficas') }}" title="Pages" data-toggle="collapse-next" class="has-submenu">
                        <em class="fa fa-gear"></em>
                        <span class="item-text">Settings</span>
                    </a>
                    <ul class="nav collapse ">

                        <li>
                            <a href="{{route('userconfig')}}" title="Editar Perfil" data-toggle=""
                               class="no-submenu">
                                <span class="item-text">Client Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
    </aside>
    {{--MAIN MENU--}}
    <section>

        @if (session('flash'))
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            {{session('flash')}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <section class="main-content">
            <button data-toggle="modal" data-target="#myModal" type="button"
                    class="btn btn-oval btn-info m-t-9 pull-right"><i
                        class="fa fa-gavel"> </i>Buy!
            </button>
        </section>
        @yield('content')
    </section>
    {{-- inicio modal --}}
    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    <h4 id="myModalLabel" class="modal-title">Position purchase</h4>
                </div>
                <div class="modal-body">
                    {!! Form::label('Date', \Carbon\Carbon::now()->format('d, M y')) !!} {!! Form::open(['route' => ['sendusercompra'], 'method'=>'post'])
                !!}

                    <div class="form-group">
                        {!! Form::selectRange('cantidad', 1, 100, null,['placeholder'=>'Quantity','class'=>'form-control'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::select('producto',[ 'Gold'=>'Gold', 'Silver'=>'Silver', 'Dollar Index'=>'Dollar Index', 'Oil'=>'Oil', 'Heating
                            Oil'=>'Heating Oil', 'Natural Gas'=>'Natural Gas', 'Gasoline'=>'Gasoline', 'Cotton'=>'Cotton', 'Coffee'=>'Coffee',
                            'Bitcoin'=>'Bitcoin', 'Euro'=>'Euro' ], null, ['placeholder'=>'Select Product','class'=>'form-control'])
                            !!}
                    </div>
                    <div class="form-group">
                        {!! Form::select('tipo',[ 'Call'=>'Call', 'Put'=>'Put', ], null, ['placeholder'=>'Select Type','class'=>'form-control'])
                        !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Purchase now!', ['class'=>'btn btn-sm btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}


                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button> {{-- <button type="button"
                    class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    {{-- fin modal --}}

</section>

</body>

<script src=" {{ asset('theme/plugins/jquery/jquery.js') }}"></script>
<script src=" {{ asset('theme/plugins/velocity/velocity.js') }}"></script>
<script src=" {{ asset('theme/plugins/velocity/velocity.ui.js') }}"></script>
<script src=" {{ asset('theme/plugins/bootstrap/js/bootstrap.js') }}"></script>
<script src=" {{ asset('theme/plugins/chosen/chosen.jquery.js') }}"></script>
<script src=" {{ asset('theme/plugins/slider/js/bootstrap-slider.js') }}"></script>
<script src=" {{ asset('theme/plugins/filestyle/bootstrap-filestyle.js') }}"></script>
<script src=" {{ asset('theme/plugins/animo/animo.js') }}"></script>
<script src=" {{ asset('theme/plugins/sparklines/jquery.sparkline.js') }}"></script>
<script src=" {{ asset('theme/plugins/slimscroll/jquery.slimscroll.js') }}"></script>
<script src=" {{ asset('theme/plugins/datatable/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('theme/plugins/datatable/extensions/datatable-bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{ asset('theme/plugins/datatable/extensions/datatable-bootstrap/js/dataTables.bootstrapPagination.js') }}"></script>
<script src=" {{ asset('theme/tradify/highcharts.js') }}"></script>
<script src=" {{ asset('theme/tradify/exporting.js') }}"></script>
<script src=" {{ asset('theme/plugins/datatable/extensions/ColVis/js/dataTables.colVis.js') }}"></script>
<link rel='stylesheet' href='/theme/js/libs/semantic-ui/semantic.min20fd.css?ver=4.9.2' type='text/css'
      media='all'/>
<link rel='stylesheet' href='/theme/js/libs/datatables.net/dataTables.semanticui.min20fd.css?ver=4.9.2'
      type='text/css' media='all'/>
<script type='text/javascript' src='/theme/js/bower_components/qrcode.js/qrcode.js'></script>
<script type='text/javascript' src='/theme/js/bower_components/select2/dist/js/select2.min.js'></script>
<script type='text/javascript' src='/theme/js/libs/moment/moment.min.js'></script>
<script type='text/javascript' src='/theme/js/libs/chart.js/chart.bundle.min.js'></script>
<script type='text/javascript' src='/theme/js/libs/socket.io/socket.io.js'></script>
<script type='text/javascript' src='/theme/js/libs/semantic-ui/semantic.min.js'></script>
<script type='text/javascript' src='/theme/js/libs/jquery-number/jquery.number.min.js'></script>
<script type='text/javascript' src='/theme/js/libs/datatables.net/jquery.dataTables.min.js'></script>
<script type='text/javascript' src='/theme/js/libs/datatables.net/dataTables.semanticui.min.js'></script>
<script type='text/javascript' src='/theme/js/main.js'></script>
<!--[if lt IE 8]>
<script src="js/excanvas.min.js') }}"></script><![endif]-->
<script src=" {{ asset('theme/app/js/tradify.js') }}"></script>
<script>
    $(document).ready(function () {
        // Candlestick
        $.getJSON('/theme/tradify/data.json', function (data) {

            // create the chart
            Highcharts.stockChart('candlestickChart', {

                chart: {},


                rangeSelector: {
                    selected: 1
                },

                series: [{
                    type: 'candlestick',
                    name: 'BTC-SC',
                    data: data,
                    dataGrouping: {
                        units: [
                            [
                                'week', // unit name
                                [1] // allowed multiples
                            ], [
                                'month',
                                [1, 2, 3, 4, 6]
                            ]
                        ]
                    }
                }]
            });
        });
    });

</script>
<script>
    (function (b, i, t, C, O, I, N) {
        window.addEventListener('load', function () {
            if (b.getElementById(C)) return;
            I = b.createElement(i), N = b.getElementsByTagName(i)[0];
            I.src = t;
            I.id = C;
            N.parentNode.insertBefore(I, N);
        }, false)
    })(document, 'script', 'https://widgets.bitcoin.com/widget.js', 'btcwdgt');

</script>
<script type="text/javascript">
    var options = {bullion: 'gold'};
    var priceWidget = new BullionVaultPriceWidget('bannerContainer', options);
</script>
</html>
