@extends('layouts.main')
@section('content')
    <section class="main-content">
        <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">
        <span class="btn-label"><i class="fa fa-users"></i>
        </span>Client list
        </a>
        <a class="btn btn-labeled btn-warning pull-right" href="{{route('prod.create')}}">
            <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Create Product
        </a>
        <h3>
            Balance
        </h3>
        <!-- First Row Starts Here -->
        <div class="row">
            <h1>Tickets</h1>
            <div class="col-lg-12">
                {{--dashboard--}}
                @include('admin.partials.adminbalance')
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Ticket</div>
                    <div class="panel-body">

                        <form class="form-group" action="{{ route('update_tradeticket',$ticket->id) }}" method="post">
                            {{ csrf_field() }} {{ method_field('put') }}

                            <div class="col-md-6">
                                <input type="hidden" name="action" value="Buy">
                                <input type="hidden" name="status" value="Open">
                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Date:YYYY-MM</label>
                                    <div class="col-md-9">
                                        <div class="input-group" {{ $errors->has('fecha') ? 'has-error' : '' }}>
                                              <span class="input-group-addon">
                                               <span class="fa fa-calendar"></span>
                                             </span>
                                            <input name="fecha" type="text" class="form-control"
                                                   value="{{ old('fecha', $ticket->entrydate->format('Y-m-d')) }}"/> {!! $errors->first('fecha', '
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
                                                    <option value="{{ $user->id }}" {{ old( 'user', $ticket->user_id) == $user->id ? 'selected' : ''}} >{{ $user->name }}</option>
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
                                    <label class="col-md-3 control-label">Qty</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                              <span class="input-group-addon">
                                               <span class="fa fa-plus"></span>
                                             </span>
                                            <input name="qty" type="text" class="form-control"
                                                   value="{{ old('qty', $ticket->qty) }}"/>
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
                                            <input name="type" type="text" class="form-control"
                                                   value="{{ old('type', $ticket->type) }}"/>
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
                                            <select name="product" class="form-control select">
                                                <option value="" selected>Select</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" {{ old( 'product', $ticket->product->id) == $product->id ? 'selected' : ''}} >{{ $product->name }}</option>
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
                                    <label class="col-md-3 control-label">Precio</label>
                                    <div class="col-md-9">
                                        <div class="input-group" {{ $errors->has('precio') ? 'has-error' : '' }}>
        <span class="input-group-addon">
         <span class="fa fa-dollar"></span>
       </span>
                                            <input name="precio" type="text" class="form-control"
                                                   value="{{ old('precio', $ticket->price) }}"/> {!! $errors->first('precio', '
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
         <span class="fa fa-dollar"></span>
       </span>
                                            <select name="fee" class="form-control select">
                                                <option value="" selected>Select</option>
                                                @foreach ($fees as $fee)
                                                    <option value="{{ $fee->id }}" {{ old( 'fee', $ticket->fee->id) == $fee->id ? 'selected' : ''}} >{{ $fee->amount }}</option>
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
         <span class="fa fa-clock"></span>
       </span>
                                            <select name="month" class="form-control select">
                                                <option value="" selected>Select</option>
                                                @foreach ($months as $month)
                                                    <option value="{{ $month->id }}" {{ old( 'month', $ticket->month->id) == $month->id ? 'selected' : ''}} >{{ $month->month }}</option>
                                                @endforeach
                                            </select>
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
         <span class="fa fa-clock"></span>
       </span>
                                            <select name="year" class="form-control select">
                                                <option value="" selected>Select</option>
                                                @foreach ($years as $year)
                                                    <option value="{{ $year->id }}" {{ old( 'year', $ticket->year->id) == $year->id ? 'selected' : ''}} >{{ $year->year }}</option>
                                                @endforeach
                                            </select>
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
                                            <input name="strike" type="text" class="form-control"
                                                   value="{{ old('strike', $ticket->strike) }}"/> {!! $errors->first('strike', '
       <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Exp Date:YYYY-MM</label>
                                    <div class="col-md-9">
                                        <div class="input-group" {{ $errors->has('expdate') ? 'has-error' : '' }}>
        <span class="input-group-addon">
          <span class="fa fa-calendar"></span>
        </span>
                                            <input name="expdate" type="text" class="form-control"
                                                   value="{{ old('expdate',$ticket->expdate->format('Y-m-d')) }}"/> {!! $errors->first('expdate', '
        <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <br>

                                <div class="form-group">

                                    <div class="col-md-8 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-sign-in"></i> Update Ticket
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection