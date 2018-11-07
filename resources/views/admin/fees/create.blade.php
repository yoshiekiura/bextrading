@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2>Fees</h2>
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
         <h3>Create Fee</h3>
            <div class="col-lg-12">
                {{--dashboard--}}
                @include('admin.partials.adminbalance')
                <div class="panel panel-default">
                    <div class="panel-heading">Create Fee</div>
                    <div class="panel-body">
                        <form class="form-group" action="{{ route('fee.post') }}" method="post">
                            {{ csrf_field() }}
                            <div class="col-md-9">
                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Amount</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                              <span class="input-group-addon">
                                               <span class="fa fa-dollar"></span>
                                              </span>
                                            <input name="amount" type="text" class="form-control"
                                                   value="{{ old('amount') }}"/> {!! $errors->first('amount','
                                                     <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Porcentage</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                              <span class="input-group-addon">
                                             <span class="fa fa-percent"></span>
                                              </span>
                                            <input name="porcentaje" type="text" class="form-control"
                                                   value="{{ old('porcentaje') }}"/> {!! $errors->first('porcentaje',
                                                    '<span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary pull-right">
                                        <i class="fas fa-sign-in-alt"></i> Create Fee
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection