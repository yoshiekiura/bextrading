@extends('layouts.main')
@section('content')
    <h3>
        Client Configuration
    </h3>
    <div class="col-lg-10">
        <div class="panel panel-default">
            <div class="panel-heading">Panel de Control</div>
            <div class="panel-body">
                <ul class="nav nav-pills">

                    <li class=""><a href="#profile-pills" data-toggle="tab" aria-expanded="false">Editar Perfil</a></li>

                    <li class=""><a href="#messages-pills" data-toggle="tab" aria-expanded="false">Cambiar
                            contraseña</a></li>
                    <li class=""><a href="#settings-pills" data-toggle="tab" aria-expanded="false">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div id="profile-pills" class="tab-pane fade">
                        {{-- <h4>Editar Perfil</h4> --}}
                        <div class="form-group">
                            <form action="{{ route('updateuseradmin', $user->id) }}" method="post">
                                {{ csrf_field() }} {{ method_field('PUT') }}
                                <div class="col-sm-10">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label"> Cuenta</label>
                                            <input type="text" name="tipocuenta"
                                                   class="form-control" value="{{ $user->tipocuenta}} ">
                                            <span class="help-block">Tipo de Cuenta</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Nombre</label>
                                            <input type="text" name="name" class="form-control"
                                                   value="{{ $user->name}} ">
                                            <span class="help-block">Nombre de Cuenta</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Identificación</label>
                                            <input type="text" readonly="readonly" name="idn" class="form-control"
                                                   value="{{ $user->idn}} ">
                                            <span class="help-block">Doc de Identificación</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                   value="{{ $user->email, old('email') }}">
                                            <span class="help-block">Correo Electrónico</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Telefono</label>
                                            <input type="text" name="phone" class="form-control"
                                                   value="{{ $user->phone, old('phone') }}">
                                            <span class="help-block">Telefono</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Móvil</label>
                                            <input type="text" name="mobile" class="form-control"
                                                   value="{{ $user->mobile, old('mobile') }}">
                                            <span class="help-block">Teléfono Celular</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Dirección</label>
                                            <input type="text" name="address" class="form-control"
                                                   value="{{ $user->address, old('address') }}">
                                            <span class="help-block">Dirección</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Ciudad</label>
                                            <input type="text" name="city" class="form-control"
                                                   value="{{ $user->city, old('city') }}">
                                            <span class="help-block">Ciudad</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Estado</label>
                                            <input type="text" name="state" class="form-control"
                                                   value="{{ $user->state, old('state') }}">
                                            <span class="help-block">Estado/Provincia</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">País</label>
                                            <input type="text" name="country" class="form-control"
                                                   value="{{ $user->country, old('country') }}">
                                            <span class="help-block">País de Residencia</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Ocupación</label>
                                            <input type="text" name="ocupacion" class="form-control"
                                                   value="{{ $user->ocupacion, old('ocupacion') }}">
                                            <span class="help-block">Ocupación</span>
                                        </div>

                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Beneficiario</label>
                                            <input type="text" name="beneficiary" class="form-control"
                                                   value="{{ $user->beneficiary, old('beneficiary') }}">
                                            <span class="help-block">Beneficiario de Cuenta</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Patrimonio</label>
                                            <input type="text" name="patrimonio" class="form-control"
                                                   value="{{ $user->patrimonio, old('patrimonio') }}">
                                            <span class="help-block">Patrimonio</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Inversión</label>
                                            <input type="text" name="amount" class="form-control"
                                                   value="{{ $user->amount, old('amount') }}">
                                            <span class="help-block">Inversión Inicial</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="control-label">Origen de Fondos</label>
                                            <input type="text" name="origen_fondos" class="form-control"
                                                   value="{{ $user->origen_fondos, old('origen_fondos') }}">
                                            <span class="help-block">Origen de Fondos</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="control-label">Cantidad de Ahorros</label>
                                            <input type="text" name="cant_ahorros" class="form-control"
                                                   value="{{ $user->cant_ahorros, old('cant_ahorros') }}">
                                            <span class="help-block">Cantidad de Ahorros</span>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="col-sm-2 control-label">Residente</label>
                                            <input type="text" name="residente" class="form-control"
                                                   value="{{ $user->residente, old('residente') }}">
                                            <span class="help-block">Residente de USA</span>
                                        </div>


                                        {{-- inicio de imagen --}} {{--
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Subir Imagen</label>
                                        <div class="col-sm-4">
                                            <input type="file" name="foto" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control"
                                                id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">

                                        </div>
                                    </div> --}} {{-- fin imagen --}}

                                        <input type="submit" class="btn btn-oval btn-inverse m-t-9 pull-right"
                                               value="Actualizar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="messages-pills" class="tab-pane fade">

                        {{-- <h4>Cambiar Contraseña</h4> --}}
                        <p>Esta carecterística esta en desarrollo si desea cambiar la contraseña deb
                        </p>
                    </div>
                    <div id="settings-pills" class="tab-pane fade">
                        <h4>Settings</h4>
                        <p>Settings viene aqui por lo demas todo bien.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
