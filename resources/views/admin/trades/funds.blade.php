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

    <div class="row">
        <div class="col-md-12">

            <div class="panel-heading">
                <h3 class="panel-title"><strong>Summary</strong></h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td><strong>Item</strong></td>
                                <td class="text-center"><strong>Action</strong></td>
                                <td class="text-center"><strong>Type</strong></td>
                                <td class="text-center"><strong>Credited</strong></td>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- foreach ($order->lineItems as $line) or some such thing here -->
                            @php setlocale(LC_MONETARY, 'en_US'); 
@endphp

                            <tr>
                                <td class="text-center">AF</td>
                                <td class="text-center">{{ $trade->action }}</td>
                                <td class="text-center">Credit</td>
                                <td class="text-center">{{ money_format('%i', $trade->total)}}</td>
                                <td class="text-right"></td>
                            </tr>

                            <tr>

                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line"></td>
                                <td class="thick-line text-center"><strong>Subtotal</strong></td>
                                <td class="thick-line text-right">{{ money_format('%i', $trade->total) }}</td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Trade fee</strong></td>
                                <td class="no-line text-right"></td>
                            </tr>
                            <tr>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line"></td>
                                <td class="no-line text-center"><strong>Total</strong></td>
                                <td class="no-line text-right">{{ money_format('%i', $trade->total - $trade->debit )}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- fin --}}
<!---->
@endsection