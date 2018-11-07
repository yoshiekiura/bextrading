@extends('layouts.main')
@section('content')

    <section class="main-content">
        <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">
        <span class="btn-label"><i class="fa fa-users"></i>
        </span>Client list
        </a>
        <a class="btn btn-labeled btn-warning pull-right" href="{{route('fee.create')}}">
            <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Create Fee
        </a>
        <h3>
            Balance USUARIO
        </h3>
        <!-- First Row Starts Here -->
        <div class="row">
            <h1>Client Trades</h1>
            <div class="col-lg-12">
                {{--dashboard--}}
                @include('admin.partials.adminbalance')
                <div class="panel panel-default">
                    <div class="panel-heading">All Transactions </div>
                    <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td class="text-center">TNº</td>
                                                <td class="text-center">Date</td>
                                                <td class="text-center">Action</td>
                                                <td class="text-center">Quantity</td>
                                                <td class="text-center">Description</td>
                                                <td class="text-center">Debit</td>
                                                <td class="text-center">Credit</td>
                                                <td class="text-center">Profit/Lost</td>
                                                <td class="text-center">Market Value</td>
                                                <td class="text-center">Total</td>
                                                <td class="text-center">Status</td>

                                            </tr>
                                        </thead>
                                        @php
                                        setlocale(LC_MONETARY, 'en_US');
                                        @endphp

                                        <tbody>

                                            @foreach ($trades as $open)

                                            @php
                                            if (empty($open->ticket->product->name)) {
                                             $product = '--';
                                         } else {
                                             $product = $open->ticket->product->name;
                                         }
                                         @endphp

                                         <tr>
                                            <td class="text-center">857{{ $open->ticket_id }}</td>
                                            <td class="text-center">{{ $open->ticket->entrydate->format('M-d-y') }}
                                            </td>
                                            <td class="text-center">{{ $open->action }}</td>
                                            <td class="text-center">{{ $open->ticket->qty }}</td>
                                            <td class="text-center">{{ $product }}</td>
                                            <td class="text-center">{{ $open->debit }}</td>
                                            <td class="text-center">{{ $open->credit }}</td>
                                            <td class="text-center">{{ money_format('%i',$open->profit) }}</td>
                                            <td class="text-center">{{ money_format('%i',$open->market_value) }}</td>
                                            <td class="text-center">{{ money_format('%i',$open->total) }}</td>
                                            <td class="text-center">{{ $open->ticket->status }}</td>

                                        </tr>

                                    </tbody>

                                    @endforeach
                                </table>
                                <hr>
                                {{$trades->render()}}
                                <td class="no-line text-right"><strong><h5 style="color: #1e3878;">Cash Balance</h5>
                                </strong></td>
                                <td class="no-line text-left">
                                    <h5 style="color: #1e3878;">${{ money_format('%i' ,$balances) }} USD
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
                            <h4 style="color: #b71c1c">Your account will be debited for a Broker Guaranty in the amount
                                of {{ money_format('%i' , $guaranty) }} USD
                            </h4>
                            @endif

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
