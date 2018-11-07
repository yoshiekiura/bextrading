@extends('layouts.app')

@section('content')

    {{-- inicio --}}
    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2>Trade Ticket</h2>
                    <h3 class="pull-right">Order # 857{{ $trade->id }}</h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Client:</strong><br>
                            {{ $trade->ticket->user->name }}<br>
                            <br> <strong>Order Date:</strong>
                            {{ $trade->ticket->entrydate->format('M,d Y') }}<br>
                            {{ $trade->ticket->user->email }}
                            <br>
                        </address>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel-heading">
            <h3 class="panel-title"><strong>Ticket summary</strong></h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <td><strong>Item</strong></td>
                        <td class="text-center"><strong>Action</strong></td>
                        <td class="text-center"><strong>Type</strong></td>
                        <td class="text-center"><strong>Quantity</strong></td>
                        <td class="text-center"><strong>Debited</strong></td>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                    @php
                        setlocale(LC_MONETARY, 'en_US');
                    @endphp
                    <tr>
                        <td class="text-center">{{ $trade->ticket->product->symbol.$trade->ticket->month->code.$trade->ticket->year->year }}</td>
                        <td class="text-center">{{ $trade->action }}</td>
                        <td class="text-center">{{ $trade->ticket->type }}</td>
                        <td class="text-center">{{ $trade->ticket->qty }}</td>
                        <td class="text-center">{{ money_format('i%',$trade->ticket->total) }}</td>
                        <td class="text-right"></td>
                    </tr>
                    <tr>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line"></td>
                        <td class="thick-line text-center"><strong>Subtotal</strong></td>
                        <td class="thick-line text-right">{{ $trade->ticket->qty * $trade->ticket->price }}</td>
                    </tr>
                    <tr>
                        {{-- 
                            {{-- $fee = $trade->ticket->fee->amount * $trade->ticket->qty; --}}
                      
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center"><strong>Trade fee</strong></td>
                        <td class="no-line text-right">Fee</td>
                    </tr>
                    <tr>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line"></td>
                        <td class="no-line text-center"><strong>Total</strong></td>
                        <td class="no-line text-right">{{ $trade->ticket->qty * $trade->ticket->price + $trade->ticket->fee->amount * $trade->ticket->qty }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!---->
    {{-- fin --}}
@endsection
