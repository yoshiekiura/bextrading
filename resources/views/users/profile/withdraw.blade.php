@extends('layouts.master')
@section('content')
<h3>Dashboard</h3>
    <div class="row">
        <div class="col-md-10">
            <!-- First Row Starts Here -->
    @include('users.partials.ebalance')
            <!-- First Row Ends Here -->
            <div class="container">
                <div class="col-md-10">
                    <div class="invoice-title">
                        <h3>{{ Auth::user()->name}} Withdrawal Form</h3>
                        <h6 class="pull-right"> {{ $hora->format('d M Y') }}</h6>
                        <h6>Account Nº{{ Auth::user()->id }}</h6>
                    </div>
                    <hr>
                    <div class="row">
                        <p>
                            You can request withdrawals i your account. in order to do that please fillout the form below or download and email us at {{config('app.name')}}. </p>

                           An  IBAN number is required to fullfill a European Bank. Any question please feel free to contact us at <strong>info@ {{config('app.name')}}.com</strong>
                        </p>


                        <hr>
                        <legend>
                            <h5>Client Details</h5>
                        </legend>
                        <div class="row">
                            {!! Form::open(['method' => 'POST', 'route'=>'sendwithdraw', 'class' => 'form-horizontal']) !!} {!! Form::hidden('cuenta',
                            Auth::user()->id) !!}
                            <div class="col-md-6 ">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {!! Form::label('name', 'Fullname') !!} {!! Form::text('name', Auth::user()->name, ['class' => 'form-control', 'required' =>
                                    'required', ]) !!}
                                    <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!! Form::label('email', 'E-mail:') !!} {!! Form::text('email', Auth::user()->email, ['class' => 'form-control', 'required'
                                    => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('email') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
                                    {!! Form::label('amount', 'withdrawal amount') !!} {!! Form::number('amount', old('amount'), ['class' => 'form-control', 'required'
                                    => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('amount') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
                                    {!! Form::label('reason', 'Reason') !!} {!! Form::textarea('reason', old('reason'), ['class' => 'form-control',
                                    'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('reason') }}</small>
                                </div>
                            </div>

                            <hr>
                            <h5>Banking Details</h5>
                            <hr>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('beneficiary') ? ' has-error' : '' }}">
                                    {!! Form::label('beneficiary', 'Beneficary') !!} {!! Form::text('beneficiary', old('beneficiary'), ['class' => 'form-control',
                                    'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('beneficiary') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                                    {!! Form::label('direccion', 'Address') !!} {!! Form::text('direccion', old('direccion'), ['class' => 'form-control', 'required'
                                    => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('direccion') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('bank') ? ' has-error' : '' }}">
                                    {!! Form::label('bank', 'Bank name:') !!} {!! Form::text('bank', old('bank'), ['class' => 'form-control', 'required' => 'required'])
                                    !!}
                                    <small class="text-danger">{{ $errors->first('bank') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('bintermediario') ? ' has-error' : '' }}">
                                    {!! Form::label('bintermediario', 'Intermediary bank *(Optional)') !!} {!! Form::text('bintermediario', old('bintermediario'),
                                    ['class' => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('bintermediario') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('bancoaddress') ? ' has-error' : '' }}">
                                    {!! Form::label('bancoaddress', 'Bank address:') !!} {!! Form::text('bancoaddress', old('bancoaddress'), ['class'
                                    => 'form-control', 'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('bancoaddress') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('swift') ? ' has-error' : '' }}">
                                    {!! Form::label('swift', 'Swift code or IBAN#:') !!} {!! Form::text('swift', old('swift'), ['class' => 'form-control', 'required'
                                    => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('swift') }}</small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('acount') ? ' has-error' : '' }}">
                                    {!! Form::label('acount', 'Bank Account Nº') !!} {!! Form::text('acount', old('acount'), ['class' => 'form-control',
                                    ]) !!}
                                    <small class="text-danger">{{ $errors->first('acount') }}</small>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('referencia') ? ' has-error' : '' }}">
                                    {!! Form::label('referencia', 'Referance') !!} {!! Form::text('referencia', null, ['class' => 'form-control', 'required'
                                    => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('referencia') }}</small>
                                </div>
                            </div>

                            {!! Form::hidden('hora', $hora ) !!} {!! Form::hidden('nip', $IPnumber ) !!}

                            <div class="col-md-12">

                                <div class="form-group{{ $errors->has('firma') ? ' has-error' : '' }}">
                                    {!! Form::label('firma', 'Signature') !!} {!! Form::text('firma', null, ['class' => 'form-control', 'placeholder'=>'Type in your name' ,'required' => 'required']) !!}
                                    <small class="text-danger">{{ $errors->first('firma') }}</small>
                                </div>

                            </div>
                            <br>
                            <div class="col-md-6">
                                <div class="form-group{{ $errors->has('fecha') ? ' has-error' : '' }}">
                                    {!! Form::label('fecha', 'Date:') !!} {{$hora->format('d M Y')}}<br>
                                    <label for="ip">IP address as a prove of digital signature: {{ $IPnumber }}</label>
                                    <small class="text-danger">{{ $errors->first('fecha') }}</small>
                                </div>
                            </div>


                            <div class="btn-group pull-right">
                                {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!} {!! Form::submit("Enviar Formulario", ['class' => 'btn btn-primary'])
                                !!}
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                   {{--  <div class="row">
                        <h6> DOCUMENTACION REQUERIDA PARA EL RETIRO</h6>
                        <p>
                            Como protección tanto para sí mismo como para sus valiosos clientes, {{config('app.name')}} requiere una copia escaneada de un pasaporte /
                            identificación emitida por el gobierno (con foto) y con firma para archivar antes del procesamiento
                            y los retiros. Si aún no ha enviado una copia escaneada de un pasaporte o identificación emitida
                            por el gobierno a {{config('app.name')}}, envíe junto con este formulario el documento de identificación correspondiente;
                            envíelo a clients@{{config('app.name')}}.com . Si no presenta una identificación emitida
                            por el gobierno con una firma, se demorará su solicitud de retiro hasta el momento en que ambas
                            hayan sido recibidas. Recuerde que todos los fondos solicitados deben estar siempre en efectivo
                            y disponibles en su cuenta para poder ser procesados en el momento de la solicitud, de lo contrario
                            este documento será revocado. En caso de cuentas en conjunto se necesita confirmar con identificación
                            y firma de los dos dueños de la cuenta.
                        </p>

                        <h6>RECUERDE ADJUNTAR UNA COPIA DE UN PASAPORTE U OTRO IDENTIFICADOR EMITIDO POR EL GOBIERNO CON UNA
                            FOTO AL ENTREGAR ESTE FORMULARIO</h6>
                        <p>
                            Gracias por usar {{config('app.name')}}. Si tiene alguna pregunta o inquietud, comuníquese con nosotros por correo electrónico a clients@{{config('app.name')}}.com
                            Descargo de responsabilidad: El abajo firmante autoriza a {{config('app.name')}} a iniciar pagos a la cuenta indicada anteriormente. El titular de la cuenta certifica que la información proporcionada es precisa y veraz. El cliente autoriza a {{config('app.name')}} para que verifique toda la información anterior. Además, el cliente autoriza a {{config('app.name')}} a convertir fondos de un tipo de moneda a otro tipo de moneda, o que
                            el cliente especifique por teléfono o fax. No se considera que un formulario de retiro esté en buen estado a menos que haya enviado previamente una copia de su firma e identificación a {{config('app.name')}}.
                        </p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
