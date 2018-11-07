@extends('layouts.main')
@section('content')
<div class="container">
    <div class="col-md-10">
        <h2>Detalle Trades</h2>
    </div>
</div>
<section class="main-content">
    <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">
        <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Client List
    </a>
    <h3>
        Balance
    </h3>
    <div class="row">
        <div class="col-md-12">
            <!-- First Row Starts Here -->
            <div class="row">
                <div class="col-lg-10">
                    {{--dashboard--}}
                    @include('admin.partials.adminbalance')

                    <div class="container">
                        <h3> Open Tickets Account # {{ $client->id }} {{ $client->name}}</h3>

                        <div class="col-lg-10">
                            <p>
                                <a href="{{ route('trade.markets') }}" class="btn btn-danger btn-xs">Set
                                Market Value</a>
                            </p>
                            <a href="{{ route('crear_tickets') }}" class="btn btn-success btn-xs pull-right">New
                            Ticket</a>
                            <a href="{{ route('trade.create') }}"
                            class="btn btn-warning btn-xs pull-right">Funding</a>
                            <a href="{{ route('ausertrades', [$client->id]) }}"
                             class="btn btn-primary btn-xs pull-right">Historical</a>
                         </div>
                     </div>

                     <!-- First Row Ends Here -->
                     <div class="table-responsive">
                        <div class="panel-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>TNº</td>
                                        <td>Fecha</td>
                                        <td>Acción</td>
                                        <td>Cantidad</td>
                                        <td>Descripción</td>
                                        <td>Expiración</td>
                                        <td>Precio</td>
                                        <td>Valor Unitario</td>
                                        <td>Valor Mercado</td>
                                        <td>Status</td>
                                        <td>Sell Out</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($openTickets as $open)
                                    <tr>
                                        <td>857{{ $open->id }}</td>
                                        <td>{{ $open->entrydate->format('M-d-y') }}
                                        </td>
                                        <td>{{ $open->action }}</td>
                                        <td>{{ $open->qty }}</td>
                                        <td>
                                            {{ $open->month->month.' | '.$open->product->symbol.$open->month->code.$open->year->year.'-'.$open->product->name.'-'.$open->strike.'-'.$open->type}}
                                        </td>

                                        <td>{{ $open->expdate->format('M d y') }}
                                        </td>
                                        <td>{{ money_format('%i', $open->price) }}
                                        </td>

                                        <td class="text-right">${{ $open->marketvalue }}</td>
                                        <td class="text-right">${{ $open->marketvalue * $open->qty }}
                                        </td>
                                        <td class="text-right">{{ $open->status }}</td>
                                        <td align="center">
                                            <a href="{{ route('sellticket',$open->id) }}"
                                             class="btn btn-danger btn-xs">Sell Out</a>
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
                                            <p>{{ money_format('%i', $open->qty * $open->price) }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center">Comisión</td>
                                        <td class="no-line text-right">
                                            ${{ money_format('%i', $open->fee->amount * $open->qty) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"> Total</td>
                                        <td class="no-line text-right">
                                            ${{ money_format('%i', $open->total) }}
                                        </td>
                                    </tr>

                                </tbody>
                                @endforeach

                            </table>
                            <td class="no-line text-right"><strong><h5 style="color: #1e3878;">Cash
                            Balance</h5>
                        </strong></td>
                        <td class="no-line text-left">
                            <h5 style="color: #1e3878;">${{ money_format('%i' ,$balances) }}
                            </h5>
                        </td>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        Balance Portafolio
                                    </th>
                                    <th>Balance Total</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>${{ money_format('%i',$marketValue) }}</th>

                                    <th>${{ money_format('%i',$marketValue + $balances) }}</th>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                    </div>
                    @if ($guaranty > 0)
                    <h4 style="color: #b71c1c">La cuenta será debitada por Broker Guaranty en la suma de
                        ${{ money_format('%i' , $guaranty) }}
                    </h4>
                    @endif
                </div>
            </div>
        </div>
        <!-- Chart Starts Here -->
    </div>


    <div class="row">
        <div class="col-lg-10">

            <div class="panel-heading">
                <h3> Closed Tickets **Sell Out** </h3>
                <h6 class="panel-body">
                </h6>
            </div>
            <div class="table-responsive">
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>

                                <td>TNº</td>
                                <td>Trans Date</td>
                                <td>Action</td>
                                <td>Quantity</td>
                                <td>Item</td>
                                <td>Exp Date</td>
                                <td>Price</td>
                                <td class="text-right">Status</td>
                            </tr>
                        </thead>
                        @foreach ($tickets as $ticket)
                        @if ($ticket->status != false)

                        <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            <tr>
                                <td>857{{ $ticket->id }}</td>
                                <td>
                                    {{ $ticket->entrydate->format('M-d-y') }}
                                </td>
                                <td>{{ $ticket->action }}</td>
                                <td>{{ $ticket->qty }}</td>
                                <td>{{ $ticket->product->symbol.$ticket->month->code.$ticket->year->year.'-'.$ticket->product->name.'-'.$ticket->strike.'-'.$ticket->type }}</td>
                                <td>{{ $ticket->expdate->format('M-d-y') }}</td>
                                <td> {{ money_format('%i', $ticket->price) }}</td>
                                <td class="text-right">{{ $ticket->status }}</td>
                            </tr>
                            <tr>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center">Subtotal</td>
                                <td class="thick-line text-right">
                                    {{ money_format('%i', $ticket->qty * $ticket->price) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center">
                                    Trade fee
                                </td>
                                @php
                                $ganancia = $ticket->price - 980;
                                if($ganancia < 0){
                                    $comision=0 ;
                                }else{
                                    $comision=( $ganancia * $ticket->fee->porcentaje / 100) * $ticket->qty;
                                }
                                @endphp
                                <td class="no-line text-right">
                                    {{ money_format('%i', $comision) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center">Total</td>
                                <td class="no-line text-right">
                                    {{ money_format('%i', $ticket->qty * $ticket->price - $comision) }}
                                </td>
                            </tr>

                        </tbody>
                        @endif
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-10">
            <div class="panel-heading">
                <h3> Exchange Crypto Monedas</h3>
                <h6 class="panel-body">*1% porcent commission is set on exchange*</h6>
            </div>

            <div class="table-responsive">
                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>TNº</td>
                                <td>Item</td>
                                <td>Date</td>
                                <td>Action</td>
                                <td>Fee %</td>
                                <td>Amount</td>
                                <td>Quantity</td>
                                <td class="text-right">Status</td>
                            </tr>
                        </thead>
                        @foreach ($exchanges as $exchange) @if ($exchange->status != false)
                        <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            @php $fee = $exchange->fee * $exchange->amount / 100;
                            @endphp
                            <tr>
                                <td>857{{ $exchange->id }}</td>
                                <td>
                                    {{ $exchange->product->name }}</td>
                                    <td>
                                        {{ $exchange->entry->format('M-d-y') }}</td>
                                        <td>{{ $exchange->action }}</td>
                                        <td>{{ $exchange->fee }}</td>
                                        <td>
                                            {{ money_format('%i', $exchange->amount) }}
                                        </td>
                                        <td>{{ $exchange->qty }}</td>
                                        <td class="text-right">{{ $exchange->status }}</td>
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
                                            ${{ money_format('%i', $exchange->amount) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center"> Trade fee</td>
                                            <td class="no-line text-right"> {{ -$fee }} </td>
                                        </tr>
                                        <tr>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line"></td>
                                            <td class="no-line text-center">Total</td>
                                            <td class="no-line text-right">
                                                ${{ money_format('%i', $exchange->total) }}</td>
                                            </tr>
                                        </tbody>
                                        @endif
                                        @endforeach
                                    </table>
                                    <div class="container">
                                        <h2> Summary Crypto Currency</h2>
                                        @foreach($coins as $coin =>$value)
                                        <li><a href="{{ route('exchange') }}">{{$coin.' = '. $value}}</a>
                                        </li>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endsection

