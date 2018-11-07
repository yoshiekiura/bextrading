@extends('layouts.app')

@section('content')
    {!! Charts::styles() !!}
    <div class="container">

        <div class="row">
            <h1>User Exchange</h1>
        </div>
        <h3 style="color: #1f648b" class="text-center">Current Exchanges</h3>
        @if ($tickets->count() > 0)
            <div class="panel-body">
                <table class="table datatable">
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

                            // $filling = ($ticket->price / $filling);
                            // if (false === $filling) {
                            //     $filling = $ticket->price;
                            // } else {
                            //     $filling = ($ticket->price / $filling);
                            // }
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
                        <h5>No open tickets found...</h5>
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
            {{--posiciones cerradas--}}

    </div>

    {!! Charts::scripts() !!}
    {!! $charty->script() !!}
@endsection
