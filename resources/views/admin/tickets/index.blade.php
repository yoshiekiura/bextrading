@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2>Tickets</h2>
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
        @include('admin.partials.adminbalance')
        <h3 style="color: #1f648b" class="text-center">Open Positions</h3>
        @if ($tickets->count() > 0)
            <div class="panel panel-default">
                <div class="panel-heading">Trade Tickets</div>
                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <div class="panel-body">

                                <thead class="thead-dark">
                                <tr>
                                    <th>TNº</th>
                                    <th>Client</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    <th>Qty</th>
                                    <th>Description</th>
                                    <th>Type</th>
                                    <th>Expiration</th>
                                    <th>Fee</th>
                                    <th>Strike</th>
                                    <th>Price</th>
                                    <th>Fill</th>
                                    <th>Cost</th>
                                    <th>Mercado Unitario</th>
                                    <th>Valor Mercado</th>
                                    <th>Acciones</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr style="color: #0c0d10">
                                        <?php
                                        setlocale(LC_MONETARY, 'en_US');
                                        if (empty($ticket->fee->amount)) {
                                            $fee = 1;
                                        } else {
                                            $fee = $ticket->fee->amount;
                                        }
                                        if (empty($ticket->month->code)) {
                                            $month = '';
                                        } else {
                                            $month = $ticket->month->code;
                                        }
                                        if (empty($ticket->year->year)) {
                                            $year = '';
                                        } else {
                                            $year = $ticket->year->year;
                                        }
                                        if (empty($ticket->product->name)) {
                                            $product = '--';
                                        } else {
                                            $product = $ticket->product->symbol . $month . $year . '|' . $ticket->product->name;
                                        }
                                        $total = ($fee * $ticket->qty) + ($ticket->price * $ticket->qty);

                                        $filling = $ticket->price / $ticket->product->leverage;

                                        ?>
                                        <td> 857{{$ticket->id}} </td>
                                        <td>{{$ticket->user->name}} </td>
                                        <td> {{$ticket->entrydate->format('M-d-y')}} </td>
                                        <td>{{$ticket->action }}</td>
                                        <td> {{$ticket->qty}} </td>
                                        <td> {{ $product }} </td>
                                        <td> {{$ticket->type}} </td>
                                        <td> {{$ticket->expdate->format('M-d-y')}} </td>
                                        <td> {{money_format('%i',$fee)}} </td>
                                        <td> {{$ticket->strike}} </td>
                                        <td> ${{$ticket->price}} </td>
                                        <td> {{ $filling }} </td>
                                        <td> ${{money_format('%i',$total)}} </td>
                                        <td> ${{ $ticket->marketvalue }} </td>
                                        <td> ${{ money_format('%i', $ticket->marketvalue * $ticket->qty) }} </td>

                                        <td>
                                            <a href="{{ route('edit_ticket',$ticket->id) }}"
                                               class="btn btn-default btn-xs"><i
                                                        class="fa fa-pencil"></i> Editar</a>
                                            <form action="{{ route('delete_ticket', $ticket->id) }}" method="post">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </div>
                        </table>
                        {{$tickets->render()}} @else
                            <div class="col-6">
                                <h5>No open tickets found...</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{--posiciones cerradas--}}
            <div class="app">
                <center>
                    {!! $options->html() !!}
                </center>
            </div>



            <div class="panel panel-default">
                @if ($soldtickets->count() > 0)
                    <div class="panel-heading">Closed Position</div>
                    <div class="panel-body">
                        <table class="table datatable table-hover">
                            <thead>
                            <tr>
                                <th>TNº</th>
                                <th>Client</th>
                                <th>Date</th>
                                <th>Action</th>
                                <th>Qty</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Expiration</th>
                                <th>Fee</th>
                                <th>Strike</th>
                                <th>Price</th>
                                <th>Fill</th>
                                <th>Total</th>
                                {{--
                                <th>Mercado Unitario</th>
                                <th>Valor Mercado</th> --}}

                                <th width="50" class="pull-right">Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($soldtickets as $closed)
                                <tr>
                                    <?php
                                    setlocale(LC_MONETARY, 'en_US');
                                    $total = $closed->price * $closed->qty;
                                    $fill = $closed->price / $closed->product->leverage;
                                    ?>
                                    <td> 857{{$closed->id}} </td>
                                    <td>{{$closed->user->name}} </td>
                                    <td> {{$closed->entrydate->format('M-d-y')}} </td>
                                    <td>{{ $closed->action }}</td>
                                    <td> {{$closed->qty}} </td>
                                    <td> {{$closed->product->symbol.$closed->month->code. $closed->year->year}} </td>
                                    <td> {{$closed->type}} </td>
                                    <td> {{$closed->expdate->format('M-d-y')}} </td>
                                    <td> {{$closed->fee->porcentaje}}%</td>
                                    <td> {{$closed->strike}} </td>
                                    <td> ${{$closed->price}} </td>
                                    <td> {{ $fill }} </td>
                                    <td> ${{money_format('%i',$total)}} </td>
                                    {{--
                                    <td> ${{$closed->marketvalue}} </td>
                                    <td> ${{$closed->marketvalue * $closed->qty}} </td> --}}
                                    <td class="pull-right">
                                        <a href=""
                                           class="btn btn-default btn-xs">
                                            <i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('delete_ticket', $closed->id) }}" method="post">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$soldtickets->render()}} @else
                            <div class="col-6">
                                <h5>No closed tickets found...</h5>
                            </div>
                        @endif
                    </div>
            </div>
            {!! Charts::scripts() !!} {!! $options->script() !!}
    </section>
@endsection