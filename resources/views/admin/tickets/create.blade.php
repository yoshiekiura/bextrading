@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2>New Order</h2>
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
        <div class="row">
            <div class="col-md-10">
                <!-- First Row Starts Here -->
                <div class="row">
                    <div class="col-lg-12">
                        {{--dashboard--}}
                        @include('admin.partials.adminbalance')

                        <div class="panel-body">
                            <h3>{{ $fecha->format('d M, Y' ) }}</h3>
                            <form class="form-group" action="{{ route('store_ticket') }}" method="post">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <input type="hidden" name="action" value="Buy">
                                    <input type="hidden" name="status" value="Open">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Date</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('fecha') ? 'has-error' : '' }}>
                                          <span class="input-group-addon">
                                             <span class="fa fa-calendar"></span>
                                         </span>
                                                <input name="fecha" type="date" class="form-control"
                                                       value="{{ $fecha->format('Y-m-d') }}"/>
                                                {!! $errors->first('fecha',
                                                '<span style="color: #ff2c23" class="help-block">:message</span>') !!}
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
                                                    <option value="" selected>Select</option>
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
                                        <label class="col-md-3 control-label">Qty</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                  <span class="input-group-addon">
                                                     <span class="fa fa-plus"></span>
                                                 </span>
                                                <select class="form-control" name="qty" id="">
                                                    <?php for ($i = 1; $i < 1001; $i++): ?>
                                                    <option value="<?= $i; ?> "><?= $i; ?></option>
                                                    <?php endfor; ?>
                                                </select>
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
                                                <select name="type" class="form-control select">
                                                    <option value="Call" select>Call</option>
                                                    <option value="Put" select>Put</option>
                                                </select>
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
                                                    <option value="">-Select-</option>
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
                                        <label class="col-md-3 control-label">Precio</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('precio') ? 'has-error' : '' }}>
                    <span class="input-group-addon">
                       <span class="fa fa-dollar"></span>
                   </span>
                                                <input name="precio" type="text" class="form-control"
                                                       placeholder="1234.56"
                                                       value="980{{ old('precio') }}"/> {!! $errors->first('precio', '
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
                                                    <option value="" selected>-Select-</option>

                                                    @foreach ($fees as $fee)
                                                        <option value="{{ $fee->id }}" {{ old('fee') == $fee->id ? 'selected' : ''}} >
                                                            {{ $fee->amount }}
                                                        </option>
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

                                                        <option
                                                                value="{{ $month->id }}" {{ old('month') == $month->id ? 'selected' : ''}} >{{ $month->month }}</option>
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
                   <span class="fas fa-clock"></span>
               </span>
                                                <select name="year" class="form-control select">
                                                    @foreach ($years as $year)

                                                        <option
                                                                value="{{ $year->id }}" {{ old('year') == $year->id ? 'selected' : ''}} >{{ $year->year }}</option>
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
                                                       value="{{ old('strike') }}"/> {!! $errors->first('strike',
                '
                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Exp Date</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('expdate') ? 'has-error' : '' }}>
                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
              </span>
                                                <input name="expdate" type="date" class="form-control"
                                                       value="{{ old('expdate') }}"/> {!! $errors->first('expdate',
                  '
                  <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>

                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="form-group pull-right">
                                        <div class="col-md-8 col-md-offset-4 ">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-sign-in-alt"></i> Create Ticket
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
@endsection
