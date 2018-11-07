@extends('layouts.master')
@section('content')
   <h3>Dashboard
   </h3>
@include('users.partials.ebalance')
<!-- Chart Starts Here -->
<section class="main-content">
    <div class="row">
   <div class="col-md-12">
    <div class="panel panel-default">
{!! Form::label('Fecha', \Carbon\Carbon::now()->format('d, M y')) !!}
                {!! Form::open(['route' => ['sendusercompra'], 'method'=>'post']) !!}

                <div class="form-group">
                    {!! Form::selectRange('cantidad', 1, 100, null,['placeholder'=>'Seleccione Cantidad','class'=>'form-control'])!!}
                </div>

                <div class="form-group">
                    {!! Form::select('producto',[
                        'Gold'=>'Gold',
                        'Silver'=>'Silver',
                        'Dollar Index'=>'Dollar Index',
                        'Oil'=>'Oil',
                        'Heating Oil'=>'Heating Oil',
                        'Natural Gas'=>'Natural Gas',
                        'Gasoline'=>'Gasoline',
                        'Cotton'=>'Cotton',
                        'Coffee'=>'Coffee',
                        'Bitcoin'=>'Bitcoin',
                        'Euro'=>'Euro'
                        ], null, ['placeholder'=>'Seleccione producto','class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('tipo',[
                        'Call'=>'Call',
                        'Put'=>'Put',
                        ], null, ['placeholder'=>'Selecciona Tipo','class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Comprar', ['class'=>'btn btn-sm btn-primary']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>
@endsection
