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
        <!-- First Row Starts Here -->
        <div class="row">
            <div class="col-lg-12">
                {{--dashboard--}}
                 @include('admin.partials.adminbalance')

                <div class="panel panel-default">
                    <div class="panel-heading">Exchange Edit | {{ $fecha->format('d M, Y' ) }}</div>

                    <div class="panel-body">

                        <form class="form-group" action="" method="post">
                            {{ csrf_field() }} {{ method_field('put') }}

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
                                                   value="{{ old('fecha', $exchange->entry->format('Y-m-d')) }}"/> {!! $errors->first('fecha', '
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

                                                @foreach ($users as $user)
                                                    <option
                                                            value="{{ $user->id }}" {{ old('user') == $user->id ? 'selected' : ''}} >{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {!! $errors->first('user', '<span style="color: #ff2c23" class="help-block">:message</span>') !!}
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
                                                @foreach ($products as $product)
                                                    @if ($product->category->description)
                                                        <option
                                                                value="{{ $product->id }}" {{ old('product',$exchange->product_id) == $product->id ? 'selected' : ''}} >{{ $product->name }}</option>
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
                                                   value="{{ old('amount',$exchange->amount) }}"/> {!! $errors->first('amount', '
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
                                                   value="{{ old('exchange', $exchange->rate) }}"/> {!! $errors->first('exchange', '
             <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group">
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
    </section>
    <!---->
@endsection
