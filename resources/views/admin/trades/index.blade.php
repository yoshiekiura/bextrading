@extends('layouts.main')
@section('content')
<div class="container">
    <div class="col-md-10">
        <h2>Trading</h2>
    </div>
</div>
<section class="main-content">
    <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">

        <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Client list
    </a>
    <h3>
        Trading History
    </h3>

    <div class="row">
        <div class="col-lg-12">
            {{--dashboard--}}
            <div class="panel-body">
                @if ($trades->count() > 0 or $tradexs->count() > 0)
                <table class="table datatable table-hover">
                    <thead align="center">
                        <tr>
                            <th>
                                <p>Nº</p>
                            </th>
                            <th>
                                <p>Client</p>
                            </th>
                            <th>
                                <p>Date</p>
                            </th>
                            <th>
                                <p>Qty</p>
                            </th>
                            <th>
                                <p>Action</p>
                            </th>
                            <th>
                                <p>Description</p>
                            </th>
                            <th>
                                <p>Credit</p>
                            </th>
                            <th>
                                <p>Debit</p>
                            </th>
                            <th>
                                <p>Market Value</p>
                            </th>
                            <th>
                                <p>Profit</p>
                            </th>
                            <th>
                                <p>Total</p>
                            </th>
                            <th align="center">
                                <p>Ver</p>
                            </th>
                            <th>
                                <p>Vender</p>
                            </th>
                            <th>
                                <p>Borrar</p>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($trades as $trade)
                        <tr>
                            @php
                            setlocale(LC_MONETARY, 'en_US');
                            $total += $trade->credit - $trade->debit;
                            if (empty($trade->ticket->product->name))
                            {
                                $product = '--';
                            } else {
                                $product = $trade->ticket->product->name.' '. $trade->ticket->product->symbol.$trade->ticket->month->code.$trade->ticket->year->year.'
                                | '. $trade->ticket->type.' | '. $trade->ticket->strike; }
                                @endphp
                                <td>
                                    <p>857{{ $trade->ticket->id }}</p>
                                </td>
                                <td>
                                    <p>{{ $trade->user->name}}</p>
                                </td>
                                <td>
                                    <p>{{$trade->created_at->format('d M')}}</p>
                                </td>
                                <td>
                                    <p>{{ $trade->ticket->qty }}</p>
                                </td>
                                <td>
                                    <p>{{ $trade->ticket->action}}</p>
                                </td>
                                <td align="center">
                                    <p>{{ $product }}</p>
                                </td>
                                <td>
                                    <p>{{ $trade->credit }}</p>
                                </td>
                                <td>
                                    <p>{{$trade->debit}}</p>
                                </td>
                                <td>
                                    <p>{{ money_format('%i' ,$trade->market_value) }}</p>
                                </td>
                                <td>
                                    <p>{{money_format('%i',$trade->profit) }}</p>
                                </td>
                                <td>
                                    <p>{{ $total}}</p>
                                </td>

                                <td align="center">
                                    <a href="{{ route('trade_show',[$trade->id]) }}"
                                       class="btn btn-default btn-xs"><i
                                       class="fa fa-eye"></i></a>
                                   </td>
                                   <td>
                                    @if ($trade->action == 'Buy')
                                    <a href="{{ route('trade.sellout',[$trade->id]) }}"
                                       class="btn btn-default btn-xs"><i
                                       class="fa fa-dollar"></i></a>
                                       @else _
                                       @endif
                                   </td>
                                   <td>
                                    <form action="{{ route('trade.delete',$trade->id) }}" method="post">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <button class="btn btn-default btn-xs" type="submit"><i
                                            class="fa fa-times "></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{ $trades->render() }}
                        <hr>

                        <h3 style="color: #1f648b" class="text-center">Historical Exchange</h3>
                        <div class="panel-body">
                            @if ($tradexs->count() > 0)
                            <table class="table datatable table-hover">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Qty</th>
                                        <th>Description</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        {{--
                                        <th>Market Value</th>--}} {{--
                        <th>Profit</th>--}} {{--
                        <th>Total</th> --}} {{--
                        <th>Status</th> --}}

                    </tr>
                </thead>
                {{-- =============================================== --}} {{-- tradex EXCHANGE --}}
                <tbody>
                    @foreach ($tradexs as $tradex)
                    <tr>
                        <?php
                        setlocale(LC_MONETARY, 'en_US');
                        ?>
                        <td>857{{$tradex->id}}</td>
                        <td> {{ $tradex->user->name}} </td>
                        <td> {{$tradex->created_at->format('d M')}} </td>
                        <td> {{ $tradex->action}} </td>
                        <td>{{ $tradex->exchange->qty}} </td>
                        <td>{{ $tradex->exchange->product->name }} </td>
                        <td> {{ $tradex->credit }} </td>
                        <td> {{$tradex->debit}} </td>
                                            {{--
                                            <td> {{ $tradex->market_value }} </td>--}} {{--
                            <td> {{$tradex->profit }} </td>--}} {{--
                            <td>{{ money_format('%i' , $total) }}</td> --}} {{--
                            <td> {{ money_format('%i', $tradex->total) }} </td> --}}
                            <td class="pull-right">
                                <a href="" class="btn btn-default btn-xs"><i
                                    class="fas fa-eye"></i></a>
                                </td>

                                <td class="pull-right">
                                    @if ($tradex->action == 'Buy')
                                    <a href="" class="btn btn-default btn-xs"><i
                                        class="fas fa-dollar-sign"></i></a>                            @else
                                        --- @endif
                                    </td>

                                    <td class="pull-right">
                                        <form action="" method="post">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                            <button class="btn btn-default btn-xs" type="submit"><i
                                                class="fa fa-times "></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>


                            </table>
                            {{ $tradexs ->render()}} @else
                            <div class="col-6">
                                <h3>No tiene ningún registro a mostrar...</h3>
                            </div>
                            @endif

                            <td>
                                <h5>Equity Cash Balance</h5>
                                <h4 style="color: red">{{ money_format('%i' , $balance) }}</h4>
                            </td>
                            <td>
                                <h5>Broker Guaranty</h5>
                                <h4 style="color: red">{{ money_format('%i' , $deuda) }}</h4>
                            </td>
                        </div>

                        {{-- ===================================================================== --}} {{--sell outs--}}
                        <h3 style="color: #1f648b" class="text-center">Sold Out Trades</h3>
                        <div class="panel-body">
                            @if ($trades != false)
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Client</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Description</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        {{--
                                        <th>Market Value</th>--}} {{--
                        <th>Profit</th>--}} {{--
                        <th>Status</th> --}}

                    </tr>
                </thead>
                <tbody>
                    @foreach ($soldtrades as $soldout)

                    <tr style="color: #0c0d10">
                        <?php
                        setlocale(LC_MONETARY, 'en_US');
                                            // $total = ($ticket->fee->amount * $ticket->qty) + ($ticket->price * $ticket->qty);
                        $total += $soldout->credit - $soldout->debit;
                        ?>
                        <td> 857{{ $soldout->id }} </td>
                        <td> {{ $soldout->ticket->user->name }} </td>
                        <td> {{$soldout->created_at->format('d M')}} </td>
                        <td> {{$soldout->action}} </td>
                        <td> {{ $soldout->ticket->product->name }} </td>
                        <td> {{ $soldout->credit }} </td>
                        <td> {{$soldout->debit}} </td>
                                            {{--
                                            <td> {{ $trade->market_value }} </td>--}} {{--
                            <td> {{$trade->profit }} </td>--}} {{--
                            <td>{{ money_format('%i' , $total) }}</td>--}} {{--
                            <td> {{ money_format('%i', $trade->total) }} </td> --}} {{--
                            <td> {{$soldout->ticket->status }} </td> --}}


                            <td class="pull-right">
                                <a href="{{ route('trade_show', [$soldout->id]) }}"
                                   class="btn btn-default btn-xs"><i
                                   class="fas fa-eye"></i></a>
                               </td>
                               <td class="pull-right">
                                <form action="{{ route('trade.delete',$soldout->id) }}" method="post">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button class="btn btn-default btn-xs" type="submit"><i
                                        class="fa fa-times "></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $soldtrades->render() }}
                    <td>
                        <h5>Sold Out Balance</h5>
                        <h4 style="color: red">{{ money_format('%i' , $soldOutTotal) }}</h4>
                    </td>

                    @else
                    <div class="col-6">
                        <h3>No tiene ningún registro a mostrar...</h3>
                    </div>
                    @endif
                </div>
                {{--Credits and more--}}
                <hr>
                <h3 style="color: #1f648b" class="text-center">Client Deposits</h3>
                <div class="panel-body">
                    @if ($trades != false)
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Trade Nº</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Credit</th>
                                <th>Debit</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($deposits as $deposit)

                            <tr style="color: #0c0d10">
                                <?php
                                setlocale(LC_MONETARY, 'en_US');
                                            // $total = ($ticket->fee->amount * $ticket->qty) + ($ticket->price * $ticket->qty);
                                $total += $deposit->credit - $deposit->debit;
                                ?>
                                <td> 857{{ $deposit->id }} </td>
                                <td> {{ $deposit->ticket->user->name }} </td>
                                <td> {{$deposit->created_at->format('d M')}} </td>
                                <td> {{$deposit->action}} </td>

                                <td> {{ $deposit->credit }} </td>
                                <td> {{$deposit->debit}} </td>

                                <td class="pull-right">
                                    <a href="{{ route('trade_show', [$deposit->id]) }}"
                                       class="btn btn-default btn-xs"><i
                                       class="fas fa-eye"></i></a>
                                   </td>
                                   <td class="pull-right">
                                    <form action="{{ route('trade.delete',$deposit->id) }}" method="post">
                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                        <button class="btn btn-default btn-xs" type="submit"><i
                                            class="fa fa-times "></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <td>
                                <h5>Deposit Balance</h5>
                                <h4 style="color: red">{{ money_format('%i' ,$depositbalance) }}</h4>
                            </td>
                            <td>
                                <h5>Broker Guaranty</h5>
                                <h4 style="color: red">{{ money_format('%i' , $deuda ) }}</h4>
                            </td>
                        </table>
                        {{ $deposits->render() }} @else
                        <div class="col-6">
                            <h3>No tiene ningún registro a mostrar...</h3>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>


    </section>
    @endsection
