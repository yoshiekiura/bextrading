@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2>Market Value</h2>
        </div>
    </div>
    <section class="main-content">
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
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="invoice-title">
                                <h2>Market Value Options</h2>
                            </div>
                            <hr> {!! Form::open(['method' => 'POST', 'class' => 'form-horizontal']) !!}
                            <div class="col-md-4 ">
                                <select name="product" class="form-control">
                                    <option value="">
                                        -Select-
                                    </option>
                                    @foreach ($products  as $ticket)
                                        <option value="{{ $ticket }} ">{{$ticket->product->name.'=>'. $ticket->strike.' '.$ticket->month->month.' '.$ticket->type.' V. Actual $'. $ticket->marketvalue}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4 ">
                                <div class="form-group{{ $errors->has('marketval') ? ' has-error' : '' }}">
                                    {!! Form::label('marketval', 'Market Value:') !!}
                                    {!! Form::number('marketval',null, ['class' => 'form-control', 'required' => 'required', 'step'=>'any']) !!}
                                    <small class="text-danger">{{ $errors->first('marketval') }}</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="btn-group">
                                    {!! Form::reset("Reset", ['class' => 'btn btn-warning ']) !!}
                                    {!! Form::submit("Change Market Value", ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!---->
@endsection
