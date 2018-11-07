<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta content="MyCGO-Interface" name="description" />
    <meta name="keywords" content="crypto, commodities, bitcoins, ethereum, dogecoin, iota, ripple, siacoin, exchange, trading platform, crypto trading">
    <title>{{ config('app.name', 'TradeSys') }}</title>
    <link rel="stylesheet" href=" {{ asset('theme/app/css/bootstrap.css') }}">
    <link rel="stylesheet" href=" {{ asset('theme/plugins/fontawesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/magnific-popup.css')}}">
    <link rel="stylesheet" href=" {{ asset('theme/plugins/animo/animate+animo.css') }}">
    <link rel="stylesheet" href=" {{ asset('theme/plugins/csspinner/csspinner.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('theme/app/css/app.css') }}">
    <script src="{{ asset('theme/plugins/modernizr/modernizr.js') }}"></script>
    <script src="{{ asset('theme/plugins/fastclick/fastclick.js') }}"></script>
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
                <a href="{{ route('main') }}" class="navbar-brand">
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
                            Account Nº {{ Auth::id() }} </strong>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" data-play="fadeIn" class="dropdown-toggle">
                            <em class="fa fa-user"></em>
                        </a>
                        <ul class="dropdown-menu">
                            {{--
                            <li><a href="#">Profile</a>
                            </li> --}}
                            <li><a href="{{ route('userconfig') }}">Settings</a>
                            </li>
                            <li class="divider"></li>
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
        </div>
    </nav>

    <aside class="aside">
        <nav class="sidebar">
            <ul class="nav">
                @if(Auth::user()->hasRole('admin')) {{--admin menu--}}
                <li>
                    <div data-toggle="collapse-next" class="item user-block has-submenu">
                        <div class="user-block-picture">
                            <img src="{{ asset('theme/app/img/user/12.png') }}" width="60" height="60" class="img-thumbnail img-circle account-img-mb">
                        </div>
                        <div class="user-block-info">
                            <span class="user-block-name item-text">{{Auth::user()->name}}</span>
                            <span class="user-block-role"><i class="fa fa-check text-green"></i> Verified</span>
                            <div class="label label-primary"><i class="fa fa-chevron-down"></i> Main Actions
                            </div>
                        </div>
                    </div>
                    <ul class="nav collapse">
                        <li><a href="{{route('exchangecreate')}}">New Exchange Order</a>
                        </li>
                        <li><a href="{{route('crear_tickets')}}"> New Option Order</a>
                        </li>
                        <li>
                            <li>
                                <a href="{{ route('trade.create') }}">New Funds</a>
                            </li>
                            <li>
                                <a href="{{ route('newcat') }}">New Category</a>
                            </li>
                            <li>
                                <a href="{{ route('prod.create') }}">New Product</a>
                            </li>
                            <li>
                                <a href="{{ route('fee.create') }}">New Fee</a>
                            </li>

                            <li class="divider"></li>
                            <li><a href="javascript:void(0);" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#" title="Markets" data-toggle="collapse-next" class="has-submenu">
                    <em class="fa fa-home"></em>
                    <div class="label pull-right"><i class="fa fa-line-chart"></i></div>
                    <span class="item-text">Markets</span>
                </a>
                <ul class="nav collapse in">
                    <li class="active">
                        <a href="{{ route('trades')}}" title="Trade History" data-toggle="" class="no-submenu">
                            <span class="item-text">Trade History</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tickets') }}" title="Trade Tickets" data-toggle="" class="no-submenu">
                            <span class="item-text">Trade Tickets</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('trade.markets') }}" title="Market Value" data-toggle="" class="no-submenu">
                            <span class="item-text">Market Value</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('admin') }}" title="With Footer" data-toggle="" class="no-submenu">
                            <span class="item-text">Financial Graphics</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="{{route('usuarios')}}" title="List of Customers" class="">
                    <em class="fa fa-users"></em>
                    <span class="item-text">Clients List</span>
                </a>
            </li>



            <li>
                <a href="{{route('exchange')}}" title="Exchange" data-toggle="collapse-next" class="has-submenu">
                  <em class="fa fa-btc"></em>
                  <span class="item-text">Exchange</span>
              </a>

              <ul class="nav collapse ">
                <li>
                    <a href="{{ route('exchange') }}" title="Exchange list" data-toggle="" class="no-submenu">
                        <span class="item-text">Criptodivisas</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('exchangecreate') }}" title="New Cripto" data-toggle="" class="no-submenu">
                        <span class="item-text">New Cripto</span>
                    </a>
                </li>
            </ul>
        </li>









                        {{--
                        <li>
                            <a href="{{route('exchange')}}" title="Criptodivisas" class="">
                            <em class="fa fa-btc"></em>
                            <span class="item-text">Criptodivisas</span>
                        </a>

                    </li> --}} {{-- Category --}}
                    <li>
                        <a href="{{route('categories')}}" title="Category" data-toggle="collapse-next" class="has-submenu">
                          <em class="fa fa-location-arrow"></em>
                          <span class="item-text">Categories</span>
                      </a>

                      <ul class="nav collapse ">
                        <li>
                            <a href="{{ route('categories') }}" title="Category list" data-toggle="" class="no-submenu">
                                <span class="item-text">Categories</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('newcat') }}" title="New Category" data-toggle="" class="no-submenu">
                                <span class="item-text">New Category</span>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- FIN Category --}} {{-- fees --}}
                <li>
                    <a href="{{route('fee.index')}}" title="Fees" data-toggle="collapse-next" class="has-submenu">
                        <em class="fa fa-dollar"></em>
                        <span class="item-text">Fees</span>
                    </a>

                    <ul class="nav collapse ">
                        <li>
                            <a href="{{route('fee.index')}}" title="Fees list" data-toggle="" class="no-submenu">
                                <span class="item-text">Fee list</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('fee.create') }}" title="Create fees" data-toggle="" class="no-submenu">
                                <span class="item-text">New Fee</span>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- FIN FEES --}} {{-- PRODUCTS --}}
                <li>
                    <a href="{{route('prod.index')}}" title="Products" data-toggle="collapse-next" class="has-submenu">
                        <em class="fa fa-product-hunt"></em>
                        <span class="item-text">Products</span>
                    </a>

                    <ul class="nav collapse ">
                        <li>
                            <a href="{{route('prod.index')}}" title="Products list" data-toggle="" class="no-submenu">
                                <span class="item-text">Products list</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('prod.create') }}" title="Create Product" data-toggle="" class="no-submenu">
                                <span class="item-text">New Product</span>
                            </a>
                        </li>

                    </ul>
                </li>
                {{-- FIN PRODUCTS --}}
                <li>
                    <a href="{{ route('admin') }}" title="Depósitos y Retiros" data-toggle="collapse-next" class="has-submenu">
                        <em class="fa fa-gear"></em>
                        <span class="item-text">Settings</span>
                    </a>

                    <ul class="nav collapse ">
                        <li>
                            <a href="{{ route('admin') }}" title="Admin Settings" data-toggle="" class="no-submenu">
                                <span class="item-text">Admin Settings</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin') }}" title="Message Client" data-toggle="" class="no-submenu">
                                <span class="item-text">Message Client</span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif
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
        @yield('content')
    </section>
     {{-- inicio modal --}}
    <div id=" " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" data-dismiss="modal" aria-hidden="true" class="close">×</button>
                    <h4 id="myModalLabel" class="modal-title">Compra de posición</h4>
                </div>
                <div class="modal-body">
                    {!! Form::label('Fecha', \Carbon\Carbon::now()->format('d, M y')) !!} {!! Form::open(['route' => ['sendusercompra'], 'method'=>'post'])
                !!}

                    <div class="form-group">
                        {!! Form::selectRange('cantidad', 1, 100, null,['placeholder'=>'Seleccione Cantidad','class'=>'form-control'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::select('producto',[ 'Gold'=>'Gold', 'Silver'=>'Silver', 'Dollar Index'=>'Dollar Index', 'Oil'=>'Oil', 'Heating
                            Oil'=>'Heating Oil', 'Natural Gas'=>'Natural Gas', 'Gasoline'=>'Gasoline', 'Cotton'=>'Cotton', 'Coffee'=>'Coffee',
                            'Bitcoin'=>'Bitcoin', 'Euro'=>'Euro' ], null, ['placeholder'=>'Seleccione producto','class'=>'form-control'])
                            !!}
                    </div>
                    <div class="form-group">
                        {!! Form::select('tipo',[ 'Call'=>'Call', 'Put'=>'Put', ], null, ['placeholder'=>'Selecciona Tipo','class'=>'form-control'])
                        !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Comprar', ['class'=>'btn btn-sm btn-primary']) !!}
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
<link rel='stylesheet' href='/theme/js/libs/semantic-ui/semantic.min20fd.css?ver=4.9.2' type='text/css' media='all' />
<link rel='stylesheet' href='/theme/js/libs/datatables.net/dataTables.semanticui.min20fd.css?ver=4.9.2' type='text/css' media='all'
/>
<script type='text/javascript' src='/theme/js/bower_components/qrcode.js/qrcode.js'></script>
<script type='text/javascript' src='/theme/js/bower_components/select2/dist/js/select2.min.js'></script>

<script type='text/javascript' src="/theme/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
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

</body>

</html>
