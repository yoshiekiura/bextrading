@extends('layouts.master')
@section('content')
    {{--inicio--}}
    {!! Charts::styles() !!}
    <h3>Dashboard
    </h3>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- First Row Starts Here -->
        @include('users.partials.ebalance')
        <!-- First Row Ends Here -->
        </div>
    </div>
    <!--Content starts Here -->
    <!-- First Row Ends Here -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Criptodivisas Precios y Gráficos
                    <a href="javascript:void(0);" data-perform="panel-dismiss" data-toggle="tooltip" title=""
                       class="pull-right" data-original-title="Close Panel">
                        <em class="fa fa-times"></em>
                    </a>
                    <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title=""
                       class="pull-right" data-original-title="Collapse Panel">
                        <em class="fa fa-plus"></em>
                    </a>
                </div>
                <div class="panel-wrapper collapse">
                    <div class="panel panel-default">
                        <div class="panel-heading">Cryptocurrencies |
                            <small>All Crypto Markets</small>
                        </div>
                        <div class="panel-body">
                            <!-- Table Starts Here -->
                            <section class="main-content">
                                <h3>Value in USD
                                    <br>
                                    <small>Market Capital With Gainers OR Loosers</small>
                                </h3>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">Current Coin Prices |
                                                <small>With Market Capital</small>
                                            </div>

                                            <div class="panel-body">
                                                <table id="RealTimeCryptoPricing"
                                                       class="table table-striped table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Market Cap</th>
                                                        <th>Price</th>
                                                        <th>24hour VWAP</th>
                                                        <th>Available Supply</th>
                                                        <th>24hour Volume</th>
                                                        <th>%24hr</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody></tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Market Cap</th>
                                                        <th>Price</th>
                                                        <th>24hour VWAP</th>
                                                        <th>Available Supply</th>
                                                        <th>24hour Volume</th>
                                                        <th>%24hr</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Table Ends Here -->
                        </div>
                    </div>
                    <div class="panel-footer">Cryptocurrencies | Values</div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Cryptocurrencies Orders
                    <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title=""
                       class="pull-right" data-original-title="Collapse Panel">
                        <em class="fa fa-minus"></em>
                    </a>
                </div>
                <div class="panel-heading border-none">
                    <div class="pull-right">
                        <label>
                            <select class="form-control input-sm">
                                <option value="">Display Row...</option>
                                <option value="">10</option>
                                <option value="">25</option>
                                <option value="">50</option>
                                <option value="">100</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="panel-body">
                    @if ($tickets->count() > 0)
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive m-t-10">
                                    <table class="table table-striped table-hover table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Ticket Nº</th>
                                            <th>Date</th>
                                            <th>Type</th>
                                            <th>Action</th>
                                            <th>Description</th>
                                            <th>Fee</th>
                                            <th>Amount</th>
                                            <th>Exchange Rate</th>
                                            <th>Exchange Qty</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($tickets as $ticket)
                                            <tr>
                                                <?php
                                                setlocale(LC_MONETARY, 'en_US');
                                                $filling = 1;
                                                if (empty($ticket->product->symbol)) {
                                                    $product = 'None';
                                                } else {
                                                    $product = $ticket->product->symbol;
                                                }

                                                if (empty($ticket->fee)) {
                                                    $total = 0;
                                                } else {

                                                }
                                                $qty = 0;
                                                ?>
                                                <td> 857{{$ticket->id}} </td>
                                                <td> {{$ticket->entry->format('d M y')}} </td>
                                                <td> {{$ticket->type}} </td>
                                                <td>{{$ticket->action}}</td>
                                                <td> {{$product.' | '.$ticket->product->name}} </td>
                                                <td> {{ money_format('%i',$ticket->fee) }} </td>
                                                <td> {{ money_format('%i',$ticket->amount) }} </td>
                                                <td> {{ money_format('%i',$ticket->rate) }} </td>
                                                <td> {{$ticket->qty.' '.$ticket->product->symbol}} </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    @else
                                        <div class="col-6">
                                            <h5>No records found...</h5>
                                        </div>
                                    @endif

                                    {{ $tickets->render() }}
                                    <table>
                                        <div class="app">
                                            <center>
                                                {!! $charty->html() !!}
                                            </center>
                                        </div>
                                        <div class="container">
                                            <h4> Total Crypto Currency</h4>
                                            @foreach($suma as $item =>$value)
                                                <li>{{$item.' = '. $value}}</li>
                                            @endforeach
                                        </div>
                                    </table>

                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    {{--posiciones cerradas--}}

    <div class="app">
        <center>
            {!! $charty->html() !!}
        </center>
    </div>
    </section>


    {!! Charts::scripts() !!}
    {!! $charty->script() !!}
    {{-- final --}}
@endsection
