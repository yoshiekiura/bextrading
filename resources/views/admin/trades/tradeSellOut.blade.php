@extends('layouts.main') 
@section('content')
<div class="container">
    <section class="main-content">
        <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">
            <span class="btn-label"><i class="fa fa-dollar"></i>
            </span>Client List
            </a>
        <h3>
            Balances
        </h3>
        <div class="row">
            <div class="col-md-12">
                <!-- First Row Starts Here -->
                <div class="row">
                    <div class="col-lg-10">
                        {{--dashboard--}}
    @include('admin.partials.adminbalance')
                        <h1>Sell Ticket</h1>
                        <h5><a class="btn btn-warning pull-right" href="{{route('crear_tickets')}}">New Ticket</a>
                        </h5>
                        <h5><a class="btn btn-warning pull-right" href="{{ route('trade.create') }}">Add Deposit</a>
                        </h5>

                        @if($guaranty > 0)
                        <h6 style="color:#da3e29; text-align: center">
                            This client owns a Broker Guaranty for ${{$guaranty}}!
                        </h6>
                        @endif

                        <div class="panel-body">
                            <a class="btn btn-danger btn-xs" href=" {{ route('ticketuser',$ticket->user->id) }} ">
                                    Back To Client
                                </a> {{--inicio con check porcentaje en cantidad--}}
                            <form class="form-inline" action="{{ route('checkporcent',$ticket->user_id) }}" method="post">

                                {{ csrf_field('POST') }}
                                <button type="submit" class="btn btn-warning form-group">Porcentage</button>
                                <input name="checkporcent" type="number" max="100" step="any" class="form-control" value="{{ old('checkporcent') }}" placeholder="Porcentage %"
                                />
                            </form>
                            {{--fin de check con cantidad--}}
                            <hr>

                            <form class="form-group" action="{{route('soldout', $ticket->id)}}" method="post">
                                {{ csrf_field() }} {{ method_field('put') }}

                                <div class="col-md-6">
                                    <label for="date">
                                            <h6 style="color: #000;"> Purchase
                                                Date: {{ $ticket->entrydate->format('M d, Y') }}</h6>
                                        </label>
                                    <input type="hidden" name="action" value="Sold Out">
                                    <input type="hidden" name="status" value="Closed">

                                    <br>
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Date:</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('fecha') ? 'has-error' : '' }}>
                                                <span class="input-group-addon">
                                                   <span class="fa fa-calendar"></span>
                                                </span>

                                                <input name="fecha" type="date" class="form-control" value="{{ $hoy->format('Y-m-d' ) }}" />                                                {!! $errors->first('fecha', '
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 pull-left">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <h6 style="color: #1e3878;">Ticket ID Nº 857{{ $ticket->id }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Clients</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                             <span class="fa fa-users"></span>
                                                </span>
                                                {{ $ticket->user->name }}
                                            </div>
                                            <input name="user" type="hidden" class="form-control" value="{{ old('user', $ticket->user->id) }}" />                                            {!! $errors->first('user', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Qty</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                           <span></span>                                                {{ $ticket->qty }}
                                                </span>
                                                <input name="qty" type="number" class="form-control" value="{{ old('qty', $ticket->qty) }}" />
                                            </div>
                                            {!! $errors->first('qty', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Type</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                             <span class="fa fa-suitcase"></span>
                                                </span>
                                                {{ $ticket->type }}
                                                <input name="type" type="hidden" class="form-control" value="{{ old('type', $ticket->type) }}" />
                                            </div>
                                            {!! $errors->first('type', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Product</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                              <span class="fa fa-product-hunt"></span>
                                                </span>
                                                {{ $ticket->product->name }}
                                                <input name="product" type="hidden" class="form-control" value="{{ old('product', $ticket->product->id) }}" />
                                            </div>
                                            {!! $errors->first('product', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Last Price</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('precio') ? 'has-error' : '' }}>
                                                <span class="input-group-addon">
                                                                <span class="fa fa-dollar"></span>
                                                </span>
                                                {{ $ticket->price }}
                                                <input name="precio" type="hidden" class="form-control" value="{{ old('precio', $ticket->price) }}" />                                                {!! $errors->first('precio', '
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{--
                                <div class="col-md-6">--}} {{--
                                    <div class="form-group" style="color: #0C1021">--}} {{--
                                        <label class="col-md-3 control-label">Unit Sell Price</label>--}} {{--
                                        <div class="col-md-9">--}} {{--
                                            <div class="input-group" {{ $errors->has('sellprice') ? 'has-error' : '' }}>--}} {{--
                                                <span class="input-group-addon">--}}
                                {{--<span class="fa fa-dollar-sign"></span>--}}
                                                {{--
                                                </span>--}} {{--
                                                <input name="sellprice" type="number" step="any" class="form-control" --}} {{--value="{{ old('sellprice') }}" />                                                {!! $errors->first('sellprice', '--}} {{--
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}--}}
                                                {{--
                                            </div>--}} {{--
                                        </div>--}} {{--
                                    </div>--}} {{--
                                </div>--}}
                                <!-- venta por porcentaje -->
                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Gain/Loss Porcent</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('porcent') ? 'has-error' : '' }}>
                                                <span class="input-group-addon">
                                                             <span class="fa fa-percent"></span>
                                                </span>
                                                <input name="porcent" type="number" step="any" class="form-control" value="{{ old('porcent') }}" />                                                {!! $errors->first('porcent', '
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Fee</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                             <span class="fa fa-percent"></span>

                                                </span>
                                                <select name="fee" class="form-control select">
                                                        <option value="">Select</option>
                                                        @foreach ($fees as $fee)
                                                            <option
                                                                    value="{{ $fee->id }}" {{ old( 'fee') == $fee->id ? 'selected' : ''}} >{{ $fee->porcentaje }}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            {!! $errors->first('fee', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Month</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                             <span class="fa fa-calendar"></span>
                                                </span>
                                                {{ $ticket->month->month }}
                                                <input type="hidden" name="month" value="{{ $ticket->month->id }}">
                                            </div>
                                            {!! $errors->first('month', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Year</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                             <span class="fa fa-calendar"></span>
                                                </span>
                                                <input type="hidden" name="year" value="{{ $ticket->year->id }}"> {{ $ticket->year->year
                                                }}
                                            </div>
                                            {!! $errors->first('year', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Strike</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('strike') ? 'has-error' : '' }}>
                                                <span class="input-group-addon">
                                                             <span class="fa fa-bolt"></span>
                                                </span>
                                                {{ $ticket->strike }}
                                                <input name="strike" type="hidden" class="form-control" value="{{ old('strike', $ticket->strike) }}" />                                                {!! $errors->first('strike', '
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Exp Date:</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('expdate') ? 'has-error' : '' }}>
                                                <span class="input-group-addon">
                                                              <span class="fa fa-calendar"></span>
                                                </span>
                                                {{ $ticket->expdate->format('M d y') }}
                                                <input name="expdate" type="hidden" class="form-control" value="{{ old('expdate',$ticket->expdate) }}" />                                                {!! $errors->first('expdate', '
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                    <br>

                                    <div class="form-group">

                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-sign-in-alt"></i> Make a Sell
                                                </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection