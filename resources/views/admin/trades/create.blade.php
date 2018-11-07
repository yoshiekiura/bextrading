@extends('layouts.main')
@section('content')
<div class="container">
    <div class="col-md-10">
        <h2>Adding Funds</h2>
    </div>
</div>
<section class="main-content">
    <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">

        <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Lista de Clientes
    </a>
    <h3>
        Balances
    </h3>
    <div class="row">
        <div class="col-md-10">
            <!-- First Row Starts Here -->
            <div class="row">
                <div class="col-lg-12">
                    {{--dashboard--}}
                    @include('admin.partials.adminbalance')

                    <h3>{{ $fecha->format('d M, Y' ) }}</h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">Depósitos</div>
                        <div class="panel-body">

                            {{--
                            <div data-pick-time="false" class="datetimepicker input-group date mb-lg">--}} {{--
                                <input type="text" class="form-control">--}} {{--
                                <span class="input-group-addon">--}}
                                  {{--<span class="fa-calendar fa"></span>--}} {{--
                                </span>--}} {{--
                            </div>--}}

                            <form class="form-group" action="{{ route('trade.store') }}" method="post">
                                {{ csrf_field() }}



                                <div class="col-md-6">
                                    <label class=" col-md-3 control-label">Fecha</label>
                                    <div class="col-md-9">
                                        <div class="input-group" {{ $errors->has('fecha') ? 'has-error' : '' }}>
                                            <span class="input-group-addon">
                                               <span class="fa fa-calendar"></span>
                                           </span>
                                           <input name="fecha" type="date" class="form-control" value="{{ old('fecha') }}{{ $fecha->format('Y-m-d' ) }}" />                                            {!! $errors->first('fecha', '<span style="color: #ff2c23" class="help-block">:message</span>')
                                           !!}
                                       </div>
                                   </div>
                               </div>



                               <div class="col-md-6">

                                <label class="col-md-3 control-label">Clients</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                           <span class="fa fa-users"></span>
                                       </span>
                                       <select name="user" class="form-control select">
                                        <option value="" selected>Seleccione</option>
                                        @foreach ($users as $user)
                                        <option
                                        value="{{ $user->id }}" {{ old('user') == $user->id ? 'selected' : ''}} >{{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            {!! $errors->first('user', '<span style="color: #ff2c23" class="help-block">:message</span>')
                            !!}
                        </div>

                    </div>


                    <div class="col-md-6">

                        <label class="col-md-3 control-label">Action</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon">
                                   <span class="fa fa-users"></span>
                               </span>
                               <select name="action" class="form-control select">
                                <option value="" selected>Seleccione</option>
                                <option value="Account Funding">Account Funding</option>
                                <option value="Additional Funds">Additional Funds</option>
                                <option value="Bank Trans Fee">Bank Trans Fee</option>
                                <option value="Broker Guaranty">Broker
                                    Guaranty
                                </option>
                                <option value="Broker Guaranty Payment">Broker
                                    Guaranty Payment
                                </option>
                                <option value="CGO Referral Bonus">Referral Bonus
                                </option>
                                <option value="CGO Enhancement Bonus">Enhancement
                                    Bonus
                                </option>Bonus</option>
                                <option value="Withdrawal Funds">Withdrawal Funds
                                </option>
                                <option value="Credit Funds">Credit Funds</option>
                            </select>
                        </div>
                        {!! $errors->first('action', '
                        <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                    </div>

                </div>


                <div class="col-md-6">
                    <div class="form-group" style="color: #0C1021">
                        <label class="col-md-3 control-label">Amount</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <span class="input-group-addon">
                                   <span class="fa fa-dollar-sign"></span>
                               </span>
                               <input name="amount" type="text" class="form-control" value="{{ old('amount') }}" />
                           </div>
                           {!! $errors->first('amount', '
                           <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                       </div>
                   </div>
               </div>

               <div class="col-md-6">
                <hr>
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt"></i> Add Credit
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
</div>
</section>
@endsection
