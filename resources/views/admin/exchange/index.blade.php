@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2>Exchange Cryptocurrencies</h2>
        </div>
    </div>
    <section class="main-content">
         <a class="btn btn-labeled btn-primary pull-right" href="{{route('exchangecreate')}}">

        <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>New Exchange
        </a>
        <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">

        <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Client list
        </a>
        <h3>
            Balances
        </h3>
        <!-- First Row Starts Here -->
        <div class="row">
            <div class="col-lg-12">
                {{--dashboard--}}
                @include('admin.partials.adminbalance')
                <h3>{{ $fecha->format('d M, Y' ) }}</h3>
                <div class="panel panel-default">
                    <div class="panel-heading">Exchange Cryptocurrencies</div>

                    <div class="panel-body">
                        @if ($trades->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Ticket</th>
                                        <th>Date</th>
                                        <th>Client</th>
                                        <th>Action</th>
                                        <th>Currency</th>
                                        <th>Description</th>
                                        <th>Fee</th>
                                        <th>Amount</th>
                                        <th>Exchange Rate</th>
                                        <th>Qty</th>
                                        <th>Amount Exchanged</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($trades as $trade)
                                        <tr>
                                            <?php
                                            setlocale(LC_MONETARY, 'en_US');
                                            ?>
                                            <td> 857{{$trade->id}} </td>
                                            <td> {{$trade->entry->format('d M y')}} </td>
                                            <td>{{$trade->user->name}}</td>
                                            <td>Buy</td>
                                            <td> {{$trade->product->symbol}} </td>
                                            <td> {{ $trade->product->name}} </td>

                                            <td> {{ $trade->fee.'%' }}</td>

                                            <td> {{money_format('%i',$trade->amount)}} </td>
                                            <td>{{money_format('%i',$trade->rate)}} </td>
                                            <td> {{$trade->qty}} </td>
                                            <td>{{ money_format('%i',$trade->total) }}</td>
                                            <td>
                                                <a href="{{ route('editexchange',$trade->id) }}"
                                                   class="btn btn-default btn-xs"><i
                                                            class="fa fa-pencil"></i></a>
                                            </td>

                                            <td>
                                                <form action="{{ route('deleteexchange',$trade->id) }}"
                                                      method="post">
                                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-xs">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $trades->render() }}
                                <div class="app">
                                    <center>
                                        {!! $charty->html() !!}
                                    </center>
                                </div>
                                <div class="container">
                                    <h4> Total Crypto Currency</h4>
                                    @foreach($suma as $item =>$value)
                                        <li><a href="{{route('exchange', $trade->id)}}">{{$item.' = '. $value}}</a>
                                        </li>
                                    @endforeach
                                </div>

                                @else
                                    <div class="col-6">
                                        <h5>No open tickets found...</h5>
                                    </div>

                            </div>
                        @endif
                        {{--inicio closed--}}
                        <div class="panel panel-default">
                            <div class="panel-heading">Sell Out Transactions</div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Transc</th>
                                            <th>Date</th>
                                            <th>Client</th>
                                            <th>Action</th>
                                            <th>Currency</th>
                                            <th>Description</th>
                                            <th>Fee</th>
                                            <th>Exchange Rate</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                            <th>Total Exchanged</th>

                                            <th class="pull-right">Edit</th>

                                            <th class="pull-right">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($ctrades as $ctrade)
                                            <tr>
                                                @php
                                                    setlocale(LC_MONETARY, 'en_US');
                                                @endphp

                                                <td> 857{{$ctrade->id}} </td>
                                                <td> {{$ctrade->entry->format('d M y')}} </td>
                                                <td>{{$ctrade->user->name}}</td>
                                                <td>{{ $ctrade->action }}</td>
                                                <td> {{$ctrade->product->symbol}} </td>
                                                <td> {{ $ctrade->product->name}} </td>
                                                <td> {{ $ctrade->fee.'%' }}</td>
                                                <td>{{money_format('%i',$ctrade->rate)}} </td>
                                                <td>{{ $ctrade->qty}} </td>
                                                <td> {{money_format('%i',$ctrade->amount)}} </td>
                                                <td>{{ money_format('%i',$ctrade->total) }}</td>

                                                <td class="pull-right">
                                                    <a href="{{ route('editexchange', $ctrade->id) }}"
                                                       class="btn btn-default btn-xs"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                </td>
                                                <td class="pull-right">
                                                    <form action="{{ route('deleteexchange',$ctrade->id) }}"
                                                          method="post">
                                                        {{ csrf_field() }} {{ method_field('DELETE') }}
                                                        <button type="submit" class="btn btn-danger btn-xs">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    {{ $ctrades->render() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--fin closed--}}

                    <div class="panel panel-default">
                        <div class="panel-heading">Sell Out Exchange</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <form class="form-group" action="{{route('userexchange')}}" method="post">
                                        {{ csrf_field() }}
                                        <select name="user" class="form-control">
                                            <option value="" selected>Select Client</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" {{ old('user') == $user->id ? 'selected' : ''}} >{{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select> {!! $errors->first('user', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        <hr>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-sign-in-alt"></i> Sell Out
                                        </button>
                                    </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {!! Charts::scripts() !!}
    {!! $charty->script() !!}
@endsection
