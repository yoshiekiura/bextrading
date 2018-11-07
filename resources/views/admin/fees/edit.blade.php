@extends('layouts.main')
@section('content')

    <section class="main-content">
        <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">
        <span class="btn-label"><i class="fa fa-users"></i>
        </span>Client list
        </a>
        <a class="btn btn-labeled btn-warning pull-right" href="{{route('fee.create')}}">
            <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Create Fee
        </a>
        <h3>
            Balance
        </h3>
        <!-- First Row Starts Here -->
        <div class="row">
            <h1>Fees List</h1>
            <div class="col-lg-12">
                {{--dashboard--}}
                @include('admin.partials.adminbalance')
                <div class="panel panel-default">
                    <div class="panel-heading">Fees list</div>
                    <div class="panel-body">

                        <form class="form-group" action="{{ route('fee.update',$fee->id) }}" method="post">
                            {{ csrf_field() }} {{ method_field('put') }}

                            <div class="col-md-9">
                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Amount</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                              <span class="input-group-addon">
                                               <span class="fa fa-dollar-sign"></span>
                                             </span>
                                            <input name="amount" type="number" class="form-control"
                                                   value="{{ old('amount',$fee->amount) }}"/>
                                            {!! $errors->first('amount', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Porcentage</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                <span class="input-group-addon">
                                                 <span class="fas fa-percent"></span>
                                               </span>
                                            <input name="porcentaje" type="text" class="form-control"
                                                   value="{{ old('porcentaje',$fee->porcentaje) }}"/>
                                            {!! $errors->first('porcentaje', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <br>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt"></i> Update Fee
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection