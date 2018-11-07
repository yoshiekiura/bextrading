@extends('layouts.master')
@section('content') {{--inicio--}}
<h3>Dashboard</h3>
<div class="row">
    <div class="col-md-9">
        <!-- First Row Starts Here -->
        @include('users.partials.ebalance')
        <!-- First Row Ends Here -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Currency markets
                        <a href="javascript:void(0);" data-perform="panel-dismiss" data-toggle="tooltip" title="" class="pull-right" data-original-title="Close Panel">
                            <em class="fa fa-times"></em>
                        </a>
                        <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                            <em class="fa fa-plus"></em>
                        </a>
                    </div>
                    <div class="panel-wrapper collapse">
                        <div class="panel panel-default">
                            <div class="panel-heading">Criptocurrencies |
                                <small>All Crypto Currencies</small>
                            </div>
                            <div class="panel-body">
                                <!-- Table Starts Here -->
                                <section class="main-content">
                                    <h3>Current values in USD
                                        <br>
                                        <small>Gains vs Loss</small>
                                    </h3>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">current price  |
                                                    <small> Market Capital</small>
                                                </div>

                                                <div class="panel-body">
                                                    <table id="RealTimeCryptoPricing" class="table table-striped table-hover">
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
                        <div class="panel-footer">Cryptocurrency</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Chart Starts Here -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="1400" class="panel widget">
                        <div class="panel-heading">Open tickets
                            <a href="javascript:void(0);" data-perform="panel-dismiss" data-toggle="tooltip" title="" class="pull-right" data-original-title="Close Panel">
                                <em class="fa fa-times"></em>
                            </a>
                            <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                                <em class="fa fa-plus"></em>
                            </a>
                        </div>
                        <div class="panel-wrapper collapse">
                            <div class="panel panel-default">
                                <div class="panel-heading">All markets |
                                    <small>Option Markets</small>
                                </div>
                                <div class="panel-body">
                                    <div class="panel-heading">
                                        <h2>Option Open Tickets</h2>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table table-condensed">
                                            <thead>
                                                <tr>
                                                    <td class="text-center">TNº</td>
                                                    <td class="text-center">Purchase Date</td>
                                                    <td class="text-center">Action</td>
                                                    <td class="text-center">Quantity</td>
                                                    <td class="text-center">Item</td>
                                                    <td class="text-center">Exp Date</td>
                                                    <td class="text-center">Cost</td>
                                                    <td class="text-right">Statement</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php setlocale(LC_MONETARY, 'en_US');
                                                @endphp @foreach ($openTrades as $open) @if ($open->status != false)
                                                <tr>
                                                    <td class="text-center">
                                                        <p>857{{ $open->id }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>{{ $open->entrydate->format('M-d-Y') }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>{{ $open->action }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p>{{ $open->qty }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $open->month->month.'|'.$open->product->symbol.$open->month->code.$open->year->year.'-'.$open->product->name.'-'.$open->type.'-'.$open->strike
                                                    }}
                                                </td>

                                                <td class="text-center">
                                                  {{ $open->expdate->format('M-d-Y') }}
                                              </td>

                                              <td class="text-center">
                                                  {{ $open->price }}
                                              </td>

                                              <td class="text-right">
                                                 {{ $open->status }}
                                             </td>
                                         </tr>

                                         <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center">
                                                <p>Subtotal</p>
                                            </td>
                                            <td class="thick-line text-right">
                                                <p>{{ $open->qty * $open->price }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center">
                                                <p>Trade fee</p>
                                            </td>
                                            <td class="no-line text-right">
                                                <p>{{ $open->fee->amount * $open->qty }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center">
                                                <p>Total</p>
                                            </td>
                                            <td class="no-line text-right">
                                                <p>{{ money_format('%i' ,$open->total)}}</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endif @endforeach
                                </table>
                                        {{-- <div class="no-line text-left"><strong><h4 style="color: #1e3878;">
                                                        Balance Efectivo</h4>
                                                </strong></div>
                                        <div class="no-line text-left">
                                            <h4 style="color: #1e3878;"> {{ '$'. money_format('%i' , $total) }}
                                            </h4>
                                        </div> --}}

{{-- <div class="no-line text-left"><strong><h3 style="color: #red;">
                                                      Valor Total del Portafolio</h3>
                                                </strong></div>
                                        <div class="no-line text-left">
                                            <h3 style="color: darkblue;"> {{ '$'. money_format('%i' , $total + $marketValue) }}
                                            </h3>
                                        </div> --}}
                                        <table class="table">
                                            <thead>
                                              <tr>
                                               <th>Equity Balance </th>
                                               <th>Cash Equity</th>
                                               <th>Total</th>
                                           </tr>
                                       </thead>
                                       <tbody>
                                           <tr>
                                             <th>${{ money_format('%i',$marketValue) }}</th>
                                             <th>${{ money_format('%i',$bal) }}</th>
                                             <th>${{ money_format('%i',$bal + $marketValue) }}</th>
                                         </tr>
                                     </tbody>
                                 </table>

                             </div>
                         </div>

                     </div>
                     @if ($uguaranty > 0)
                   <h4 style="color: #b71c1c">Your account has outstanding bill for Broker Guaranty of ${{ money_format('%i' , $uguaranty) }}. Please pay all your bills on time, and pay off your debt as quickly as possible.
       </h4>
                     @endif
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Chart Ends Here -->
 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="1400" class="panel widget">
                <div class="panel-heading">Closed Tickets
                    <a href="javascript:void(0);" data-perform="panel-dismiss" data-toggle="tooltip" title="" class="pull-right" data-original-title="Close Panel">
                        <em class="fa fa-times"></em>
                    </a>
                    <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                        <em class="fa fa-plus"></em>
                    </a>
                </div>
                <div class="panel-wrapper collapse">
                    <div class="panel panel-default">
                        <div class="panel-heading">Option Market |
                            <small>Closed Orders</small>
                        </div>
                        <div class="panel-body">
                            <div class="panel-heading">
                                <h2>Closed ticket orders</h2>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <td class="text-center">
                                                TNº
                                            </td>
                                            <td class="text-center">
                                             Sell date
                                         </td>
                                         <td class="text-center">
                                            Action
                                        </td>
                                        <td class="text-center">
                                            Quantity
                                        </td>
                                        <td class="text-center">
                                         Descrtiption
                                     </td>
                                     <td class="text-center">
                                        Price
                                    </td>
                                    <td class="text-center">
                                     Gains
                                 </td>
                                 <td class="text-right">
                                    State
                                </td>
                            </tr>
                        </thead>
                        @foreach ($closeTrades as $ticket) @if ($ticket->status != false)
                        <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <tr>
                                <td class="text-center">
                                    <p>357{{ $ticket->id }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ $ticket->entrydate->format('d M,y') }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ $ticket->action }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ $ticket->qty }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ $ticket->month->month.'|'.$ticket->product->symbol.$ticket->month->code.$ticket->year->year.'|'.$ticket->product->name.'|'.
                                    $ticket->type.'| '.$ticket->strike }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ $ticket->price }}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{ $ticket->price - 997.5 }}</p>
                                </td>

                                <td class="text-right">
                                    <p>{{ $ticket->status }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center">
                                    <p>Subtotal</p>
                                </td>
                                <td class="thick-line text-right">
                                    <p>{{ $ticket->qty * $ticket->price }}</p>
                                </td>
                            </tr>
                            @php $ganancia = 980 - $ticket->price; $comision = ($ganancia * $ticket->fee->porcentaje / 100) * $ticket->qty;
                            @endphp
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center">
                                    <p>Trade fee {{$ticket->fee->porcentaje}}% </p>
                                </td>
                                <td class="no-line text-right">
                                    <p>{{ $comision }}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center">
                                    <p>Total</p>
                                </td>
                                <td class="no-line text-right">
                                    <p>{{ money_format('%i',$ticket->total + $comision) }}</p>
                                </td>
                            </tr>
                        </tbody>
                        @endif @endforeach
                    </table>
                </div>

                <table class="table">
                    <thead>
                      <tr>
                         <th>Portfolio Equity </th>
                         <th>Cash Equity</th>
                         <th>Total</th>
                     </tr>
                 </thead>
                 <tbody>
                   <tr>
                     <th>${{ money_format('%i',$marketValue) }}</th>
                     <th>${{ money_format('%i',$bal) }}</th>
                     <th>${{ money_format('%i',$bal + $marketValue) }}</th>
                 </tr>
             </tbody>
         </table>
         @if ($uguaranty > 0)
       <h4 style="color: #b71c1c">Your account has outstanding bill for Broker Guaranty of ${{ money_format('%i' , $uguaranty) }}. Please pay all your bills on time, and pay off your debt as quickly as possible.
       </h4>
         @endif
     </div>
 </div>
</div>
</div>
</div>
</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="1400" class="panel widget">
                <div class="panel-heading">Crypto Currency
                    <a href="javascript:void(0);" data-perform="panel-dismiss" data-toggle="tooltip" title="" class="pull-right" data-original-title="Close Panel">
                        <em class="fa fa-times"></em>
                    </a>
                    <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                        <em class="fa fa-plus"></em>
                    </a>
                </div>
                <div class="panel-wrapper collapse">
                    <div class="panel panel-default">
                        <div class="panel-heading">Exchange Cryptocurrencies |
                            <small>Exchange</small>
                        </div>
                        <div class="panel-body">
                            <div class="panel-heading">
                                <h2>Exchange Tickets</h2>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <td class="text-center" width="10">TNº</td>
                                            <td class="text-center">Date</td>
                                            <td class="text-center">Action</td>
                                            <td class="text-center">Description</td>
                                            <td class="text-center">Fee</td>
                                            <td class="text-center">Purchanse amount</td>
                                            <td class="text-center">
                                                Tax
                                            </td>
                                            <td class="text-center">Currency amount</td>
                                            <td class="text-right">
                                                <p>Status</p>
                                            </td>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($exchanges as $exchange)
                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                        <tr>
                                            <td class="text-center">
                                                857{{ $exchange->id }}
                                            </td>
                                            <td class="text-center">
                                                {{$exchange->entry->format('d/m/Y')}}
                                            </td>
                                            <td class="text-center">{{ $exchange->action }}</td>

                                            <td class="text-center">
                                                {{$exchange->product->name}}
                                            </td>
                                            <td class="text-center"> ${{ $exchange->rate }} </td>
                                            <td class="text-center"> ${{ $exchange->amount }} </td>
                                            <td class="text-center">{{ $exchange->fee}}%
                                            </td>
                                            <td class="text-center">{{ $exchange->qty }}</td>
                                            <td class="text-right">
                                                <p>{{ $exchange->status }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line"></td>
                                            <td class="thick-line text-center">Subtotal</td>
                                            <td class="thick-line text-right">
                                                ${{ $exchange->qty * $exchange->rate }}</td>
                                            </tr>

                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center">Fee</td>
                                                <td class="no-line text-right">${{$exchange->amount * $exchange->fee / 100}}</td>
                                            </tr>
                                            <tr>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line"></td>
                                                <td class="no-line text-center"> Total </td>
                                                <td class="no-line text-right">
                                                    ${{ $exchange->amount }}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th>Portfolio Equity </th>
                                        <th>Chas Equity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <tr>
                                     <th>${{ money_format('%i',$marketValue) }}</th>
                                     <th>${{ money_format('%i',$bal) }}</th>
                                     <th>${{ money_format('%i',$bal + $marketValue) }}</th>
                                 </tr>
                             </tbody>
                         </table>
                         @if ($uguaranty > 0)
                        <h4 style="color: #b71c1c">Your account has outstanding bill for Broker Guaranty of ${{ money_format('%i' , $uguaranty) }}. Please pay all your bills on time, and pay off your debt as quickly as possible.
       </h4>
                         @endif
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>


<!-- Chart Ends Here -->
        {{--
        <div class="row">--}} {{--
            <div class="col-md-6">--}} {{--
                <div data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="1400" --}} {{--class="panel widget">--}} {{--
                    <div class="panel-body">--}} {{--
                        <div class="text-right text-muted">--}} {{--
                            <em class="fa fa-gavel fa-2x text-danger"></em>--}} {{--
                        </div>--}} {{--
                        <h3 class="mt0">Bid Price</h3>--}} {{--
                        <p class="text-danger"><i class="fa fa-money"></i> $0.02</p>--}} {{--
                        <p><i class="fa fa-btc"></i> 0.00000284</p>--}} {{--
                    </div>--}} {{--
                </div>--}} {{--
            </div>--}} {{--
            <div class="col-md-6">--}} {{--
                <div data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="1400" --}} {{--class="panel widget">--}} {{--
                    <div class="panel-body">--}} {{--
                        <div class="text-right text-muted">--}} {{--
                            <em class="fa fa-bullhorn fa-2x text-green"></em>--}} {{--
                        </div>--}} {{--
                        <h3 class="mt0">Ask Price</h3>--}} {{--
                        <p class="text-green"><i class="fa fa-money"></i> $0.02</p>--}} {{--
                        <p><i class="fa fa-btc"></i> 0.00000285</p>--}} {{--
                    </div>--}} {{--
                </div>--}} {{--
            </div>--}} {{--
        </div>--}}
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">Side Market Charts</div>
            </div>
            <div class="list-group">
                <div class="list-group-item">
                    <div class="media">
                        <div class="pull-left">
                            <span class="fa-stack fa-lg">
                                <em class="fa fa-circle fa-stack-2x text-green"></em>
                                <em class="fa fa-level-up fa-stack-1x fa-inverse text-white"></em>
                            </span>
                        </div>
                        <div class="media-body clearfix">
                            <script type="text/javascript" src="https://oilprice.com/widgets/crude/crudechart.js"></script>
                            <noscript>
                                <!--Please Enable Javascript for this <a href="https://oilprice.com/">Oil Price</a> widget to work--></noscript>

                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <span class="fa-stack fa-lg">
                                    <em class="fa fa-circle fa-stack-2x text-danger"></em>
                                    <em class="fa fa-level-down fa-stack-1x fa-inverse text-white"></em>
                                </span>
                            </div>
                            <div class="media-body clearfix">
                                <!-- Gold Price Script - GOLDPRICEOZ.COM -->
                                <div style="width:238px; border:1px solid #2D6AB4;height:auto;background-color:#FFFFFF;font-family:Arial,sans-serif;">
                                    <div style="background-color:#2D6AB4;width:100%; margin:0 auto;font-weight:bold;text-align:center; padding-top:0px;">
                                        <a href="###" style="font-size:20px; color:#FFFFFF;text-decoration:none;" rel="nofollow">Gold Price</a></div>
                                        <script type="text/javascript" src="https://www.goldpriceoz.com/goldwidget.php?m=000000&g=FFFFFF&c=2D6AB4&i=FFFFFF&l=76A4FB&o=E6F2FA&w=240"></script>
                                    </div>
                                    <!-- End of Gold Price Script -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Coin Status Ends Here -->
        {{--
        <div class="panel panel-default">--}} {{--
            <div class="panel-heading">--}} {{--
                <div class="pull-right"><i class="fa fa-bullhorn"></i></div>--}} {{--
                <div class="panel-title">Upcoming News</div>--}} {{--
            </div>--}} {{--
            <div class="list-group">--}} {{--
                <a href="#" class="list-group-item">--}}
                    {{--<div class="media">--}}
                        {{--<div class="media-body">--}}
                            {{--<small class="pull-right">2h</small>--}}
                            {{--<strong class="media-heading text-primary">James</strong>--}}
                            {{--<p>--}}
                                {{--<small>Posted by James@example</small>--}}
                            {{--</p>--}}
                            {{--<p class="mb-sm">--}}
                                {{--<small>We are adding iota coins read full notice example.com/adding-iota</small>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--</a>--}} {{--
                    <a href="#" class="list-group-item">--}}
                        {{--<div class="media">--}}
                            {{--<div class="media-body">--}}
                                {{--<small class="pull-right">2h</small>--}}
                                {{--<strong class="media-heading text-primary">Jimmy</strong>--}}
                                {{--<p>--}}
                                    {{--<small>Posted by Jimmy@example</small>--}}
                                {{--</p>--}}
                                {{--<p class="mb-sm">--}}
                                    {{--<small>We have scheduled update for BTC on 03/04/2018 example.com/btc-update</small>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}} {{--
                    <a href="#" class="list-group-item">--}}
                        {{--<div class="media">--}}
                            {{--<div class="media-body">--}}
                                {{--<small class="pull-right">2h</small>--}}
                                {{--<strong class="media-heading text-primary">Franky</strong>--}}
                                {{--<p>--}}
                                    {{--<small>Posted by Franky@example</small>--}}
                                {{--</p>--}}
                                {{--<p class="mb-sm">--}}
                                    {{--<small>Vote for your favorite coin to be added example.com/vote-coin</small>--}}
                                {{--</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}} {{--
            </div>--}} {{--
            <div class="panel-footer clearfix">--}} {{--
                <a href="#" class="pull-left">--}}
                    {{--<small>Read All</small>--}}
                    {{--</a>--}} {{--
                    <a href="#" class="pull-right">--}}
                        {{--<small>Dismiss All</small>--}}
                    {{--</a>--}} {{--
            </div>--}} {{--
            <div class="panel-footer clearfix">--}} {{--
                <p>Upcoming News</p>--}} {{--
            </div>--}} {{--
        </div>--}}
    </div>
</div>{{-- final --}}
@endsection
