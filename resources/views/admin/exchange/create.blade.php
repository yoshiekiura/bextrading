@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2>Exchange Cryptocurrencies</h2>
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
        <div class="row">
            <div class="col-md-10">
                <!-- First Row Starts Here -->
                <div class="row">
                    <div class="col-lg-12">
                        {{--dashboard--}}
                        @include('admin.partials.adminbalance')

                        <h3>{{ $fecha->format('d M, Y' ) }}</h3>
                        <div class="panel panel-default">
                            <div class="panel-heading">Exchange Cryptocurrencies</div>
                            <div class="panel-body">

                                {{--
                                <div data-pick-time="false" class="datetimepicker input-group date mb-lg">--}} {{--
                                <input type="text" class="form-control">--}} {{--
                                <span class="input-group-addon">--}}
                                {{--<span class="fa-calendar fa"></span>--}} {{--
                                </span>--}} {{--
                            </div>--}}

                                <form class="form-group" action="{{ route('exchangestore') }}" method="post">

                                    {{ csrf_field() }}


                                    <input type="hidden" name="action" value="Buy">
                                    <input type="hidden" name="status" value="Open">

                                    <div class="col-md-6">
                                        <div class="form-group" style="color: #0C1021">
                                            <label class="col-md-3 control-label">Date</label>
                                            <div class="col-md-9">
                                                <div class="input-group" {{ $errors->has('fecha') ? 'has-error' : '' }}>
                    <span class="input-group-addon">
                     <span class="fa fa-calendar"></span>
                   </span>

                                                    <input name="fecha" type="date" class="form-control"
                                                           value="{{ old('fecha') }}"/> {!! $errors->first('fecha', '
                   <span style="color: #ff2c23" class="help-block">:message</span>') !!}
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
                                                    <select name="user" class="form-control select">
                                                        <option value=" " selected>Select</option>
                                                        @foreach ($users as $user)

                                                            <option
                                                                    value="{{ $user->id }}" {{ old('user') == $user->id ? 'selected' : ''}} >{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {!! $errors->first('user', '
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
                <span class="fab fa-product-hunt"></span>
              </span>
                                                    <select name="product" class="form-control select">
                                                        <option value="" selected>Select</option>
                                                        @foreach ($products as $product)
                                                            @if ($product->category->description)
                                                                <option
                                                                        value="{{ $product->id }}" {{ old('product') == $product->id ? 'selected' : ''}} >{{ $product->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {!! $errors->first('product', '
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" style="color: #0C1021">
                                            <label class="col-md-3 control-label">Inversión</label>
                                            <div class="col-md-9">
                                                <div class="input-group" {{ $errors->has('amount') ? 'has-error' : '' }}>
              <span class="input-group-addon">
               <span class="fa fa-dollar-sign"></span>
             </span>
                                                    <input name="amount" type="text" class="form-control"
                                                           value="{{ old('amount') }}"/> {!! $errors->first('amount', '
             <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" style="color: #0C1021">
                                            <label class="col-md-3 control-label">Exchange Rate</label>
                                            <div class="col-md-9">
                                                <div class="input-group" {{ $errors->has('exchange') ? 'has-error' : '' }}>
              <span class="input-group-addon">
               <span class="fa fa-dollar-sign"></span>
             </span>
                                                    <input name="exchange" type="text" class="form-control"
                                                           value="{{ old('exchange') }}"/> {!! $errors->first('exchange', '
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
                <span class="fab fa-product-hunt"></span>
              </span>
                                                    <select name="fee" class="form-control select">
                                                        <option value="" selected>Select Fee</option>
                                                        @foreach ($fees as $fee)

                                                            <option
                                                                    value="{{ $fee->id }}" {{ old('fee') == $fee->id ? 'selected' : ''}} >{{ $fee->porcentaje }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {!! $errors->first('fee', '
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <hr>
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary pull-right">
                                                <i class="fas fa-sign-in-alt"></i> Exchange Ticket
                                            </button>
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