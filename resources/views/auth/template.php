<div class="container">

    <div class="row col-md-8">
        <div class="col-md-8">

            <form class="form-horizontal" method="POST"
                  action="{{ route('register') }}">
                <div class="form-group">
                    {{ csrf_field() }}
                    <h3>Datos Personales</h3>
                    <div class="form-group" {{ $errors->has('tcuenta') ? ' has-error' : '' }}>
                        <label style="color: #761c19" for="tcuenta"
                               class="col-md-6 control-label">Tipo de
                            Cuenta</label>
                        <div class="col-md-12">
                            <select name="tcuenta" class="form-control px-3"
                                    onchange="corpSelectCheck(this);">
                                <option value="" selected>- Seleccione tipo de
                                    cuenta -
                                </option>
                                <option id="Individual">
                                        value="Individual" @if (old('tcuenta') == "Individual") {{ 'selected' }} @endif>
                                Individual
                                </option>
                                <option id="Corporativa">
                                        value="Corporativa" @if (old('tcuenta') == "Corporativa") {{ 'selected' }} @endif>
                                Corporativa
                                </option>
                            </select>
                            @if ($errors->has('tcuenta'))
                            <span style="color: #761c19" class="help-block">
                                                <strong>{{ $errors->first('tcuenta') }}</strong>
                                            </span>
                            @endif
                        </div>
                    </div>
                    {{--al seleccionar corporativa--}}
                    <div id="corpDivCheck" style="display:none;">
                        <div class="form-group">
                            <label style="color: #da3e29;" for="authmember"
                                   class="col-md-6 control-label">Autorizado
                                Nº1:</label>
                            <div class="col-md-12">

                                <input id="authmember" type="text"
                                       class="form-control px-3"
                                       placeholder="Representante Legal"
                                       name="authmember"
                                       value="{{ old('authmember') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="authmember2" style="color: #0d47a1"
                                   class="col-md-6 control-label">Autorizado
                                Nº2:</label>
                            <div class="col-md-12">
                                <input id="authmember2" type="text"
                                       class="form-control px-3"
                                       name="authmember2"
                                       value="{{ old('authmember2') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="authmember3" style="color: #0d47a1"
                                   class="col-md-6 control-label">Autorizado
                                Nº3:</label>
                            <div class="col-md-12">
                                <input id="authmember3" type="text"
                                       class="form-control px-3"
                                       name="authmember3"
                                       value="{{ old('authmember3') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="authmember4" style="color: #0d47a1"
                                   class="col-md-6 control-label">Autorizado
                                Nº4:</label>
                            <div class="col-md-12">
                                <input id="authmember4" type="text"
                                       class="form-control px-3"
                                       name="authmember4"
                                       value="{{ old('authmember4') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="authmember5" style="color: #0d47a1"
                                   class="col-md-6 control-label">Autorizado
                                Nº5:</label>
                            <div class="col-md-12">
                                <input id="authmember5" type="text"
                                       class="form-control px-3"
                                       name="authmember5"
                                       value="{{ old('authmember5') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label style="color: red" for="corpname"
                                   class="col-md-4 control-label">Nombre de
                                Empresa/Razón
                                Social:</label>
                            <div class="col-md-12">
                                <input id="corpname" type="text"
                                       class="form-control px-3"
                                       placeholder="Nombre de la Empresa"
                                       name="corpname"
                                       value="{{ old('corpname') }}">
                            </div>
                        </div>

                    </div>
                    {{--fin de seleccion--}}
                    {{-- seleccion individual --}}
                    <div id="indDivCheck" style="display:none;">


                        <div class="form-group">
                            <label for="ocupacion" style="color: #0d47a1"
                                   class="col-md-6 control-label">Ocupación:</label>
                            <div class="col-md-12">
                                <input id="ocupacion" type="text"
                                       class="form-control"
                                       name="ocupacion" placeholder="Ocupación"
                                       value="{{ old('ocupacion') }}">
                            </div>
                        </div>

                    </div>

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}"
                    >
                        <label for="name" style="color: #0d47a1"
                               class="col-md-6 control-label">Su Nombre y
                            Apellidos:</label>
                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control"
                                   name="name"
                                   placeholder="Nombre y Apellidos" required
                                   value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" style="color: #0d47a1"
                               class="col-md-6 control-label">Correo
                            Electrónico</label>
                        <div class="col-md-12">
                            <input id="email" type="email"
                                   placeholder="Correo electrónico"
                                   class="form-control px-3" name="email"
                                   value="{{ old('email') }}"
                                   required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span> @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" style="color: #0d47a1"
                               class="col-md-6 control-label">Contraseña</label>
                        <div class="col-md-8">
                            <input id="password" type="password"
                                   class="form-control px-3"
                                   name="password"
                                   placeholder="Escriba su contraseña"
                                   required> @if ($errors->has('password'))
                            <span style="color: red" class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span> @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" style="color: #0d47a1"
                               class="col-md-12 control-label">Repetir la
                            Contraseña</label>
                        <div class="col-md-8">
                            <input id="password-confirm" type="password"
                                   class="form-control"
                                   placeholder="Vuelva a escribir su contraseña"
                                   name="password_confirmation"
                                   required>
                        </div>
                    </div>

                    <div class="form-group" {{ $errors->has('phone') ? ' has-error' : '' }}>
                        <label for="phone" style="color: #0d47a1"
                               class="col-md-4 control-label">Teléfono:</label>
                        <div class="col-md-8">
                            <input type="text" name="phone"
                                   placeholder="Ingrese número"
                                   class="form-control" value="{{old('phone')}}"
                                   required> @if ($errors->has('phone'))
                            <span style="color: #761c19" class="help-block">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span> @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('idn') ? ' has-error' : '' }}">
                        <label for="idn" style="color: #0d47a1"
                               class="col-md-6 control-label">Nº Identificación
                            /
                            DNI:</label>
                        <div class="col-md-8">
                            <input id="idn" type="text" class="form-control"
                                   name="idn"
                                   placeholder="Nº Identificación"
                                   value="{{ old('idn') }}"
                                   required> @if ($errors->has('idn'))
                            <span class="help-block">
                                                            <strong>{{ $errors->first('idn') }}</strong>
                                                        </span> @endif
                        </div>
                    </div>
                    <div class=" form-group" {{ $errors->has('address') ? ' has-error' : '' }}>
                        <label style="color: #0d47a1"
                               class="col-md-6 control-label">Dirección:</label>
                        <div class="col-md-12">
                                                        <textarea name="address" placeholder="Dirección física" rows="3"
                                                                  class="form-control">{{ old('address') }}</textarea> @if ($errors->has('address'))
                            <span style="color: #761c19" class="help-block">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span> @endif
                        </div>
                    </div>

                    <div class="form-group" {{ $errors->has('city') ? ' has-error' : '' }}>
                        <label style="color: #0d47a1"
                               class="col-md-4 control-label">Ciudad:</label>
                        <div class="col-md-8">
                            <input type="text" name="city"
                                   placeholder="Ingrese la Ciudad"
                                   class="form-control"
                                   value="{{ old('city') }}"> @if ($errors->has('city'))
                            <span style="color: #761c19" class="help-block">
                                                            <strong>{{ $errors->first('city') }}</strong>
                                                        </span> @endif
                        </div>
                    </div>


                    <div class="form-group" {{ $errors->has('state') ? ' has-error' : '' }}>
                        <label style="color: #0d47a1"
                               class="col-md-6 control-label">Estado/Provincia:</label>
                        <div class="col-md-8">
                            <input type="text" name="state"
                                   value="{{ old('state') }}"
                                   placeholder="Estado o Provincia.."
                                   class="form-control"> @if ($errors->has('state'))
                            <span style="color: #761c19" class="help-block">
                                                            <strong>{{ $errors->first('state') }}</strong>
                                                        </span> @endif
                        </div>
                    </div>

                    <div class="form-group" {{ $errors->has('country') ? ' has-error' : '' }}>
                        <label style="color: #0d47a1"
                               class="col-md-4 control-label">País:</label>
                        <div class="col-md-8">
                            <select required aria-required="true" name="country"
                                    class="form-control">
                                <option value="" selected>- País de Residencia -
                                </option>
                                <option value="AF" @if (old('country') == "AF") {{ 'selected' }} @endif>
                                Afganistán
                                </option>
                                <option value="AL" @if (old('country') == "AL") {{ 'selected' }} @endif>
                                Albania
                                </option>
                                <option value="DE" @if (old('country') == "DE") {{ 'selected' }} @endif>
                                Alemania
                                </option>
                                <option value="AD" @if (old('country') == "AD") {{ 'selected' }} @endif>
                                Andorra
                                </option>
                                <option value="AO" @if (old('country') == "AO") {{ 'selected' }} @endif>
                                Angola
                                </option>
                                <option value="AI" @if (old('country') == "AI") {{ 'selected' }} @endif>
                                Anguilla
                                </option>
                                <option value="AQ" @if (old('country') == "AQ") {{ 'selected' }} @endif>
                                Antártida
                                </option>
                                <option value="AG" @if (old('country') == "AG") {{ 'selected' }} @endif>
                                Antigua
                                y Barbuda
                                </option>
                                <option value="AN" @if (old('country') == "AN") {{ 'selected' }} @endif>
                                Antillas
                                Holandesas
                                </option>
                                <option value="SA" @if (old('country') == "SA") {{ 'selected' }} @endif>
                                Arabia
                                Saudí
                                </option>
                                <option value="DZ" @if (old('country') == "DZ") {{ 'selected' }} @endif>
                                Argelia
                                </option>
                                <option value="Argentina" @if (old('country') == "Argentina") {{ 'selected' }} @endif>
                                Argentina
                                </option>
                                <option value="AM" @if (old('country') == "AM") {{ 'selected' }} @endif>
                                Armenia
                                </option>
                                <option value="AW" @if (old('country') == "AW") {{ 'selected' }} @endif>
                                Aruba
                                </option>
                                <option value="AU" @if (old('country') == "AU") {{ 'selected' }} @endif>
                                Australia
                                </option>
                                <option value="AT" @if (old('country') == "AT") {{ 'selected' }} @endif>
                                Austria
                                </option>
                                <option value="AZ" @if (old('country') == "AZ") {{ 'selected' }} @endif>
                                Azerbaiyán
                                </option>
                                <option value="BS" @if (old('country') == "BS") {{ 'selected' }} @endif>
                                Bahamas
                                </option>
                                <option value="BH" @if (old('country') == "BH") {{ 'selected' }} @endif>
                                Bahrein
                                </option>
                                <option value="BD" @if (old('country') == "BD") {{ 'selected' }} @endif>
                                Bangladesh
                                </option>
                                <option value="BB" @if (old('country') == "BB") {{ 'selected' }} @endif>
                                Barbados
                                </option>
                                <option value="BE" @if (old('country') == "BE") {{ 'selected' }} @endif>
                                Bélgica
                                </option>
                                <option value="BZ" @if (old('country') == "BZ") {{ 'selected' }} @endif>
                                Belice
                                </option>
                                <option value="BJ" @if (old('country') == "BJ") {{ 'selected' }} @endif>
                                Benin
                                </option>
                                <option value="BM" @if (old('country') == "BM") {{ 'selected' }} @endif>
                                Bermudas
                                </option>
                                <option value="BY" @if (old('country') == "BY") {{ 'selected' }} @endif>
                                Bielorrusia
                                </option>
                                <option value="MM" @if (old('country') == "MM") {{ 'selected' }} @endif>
                                Birmania
                                </option>
                                <option value="Bolivia" @if (old('country') == "Bolivia") {{ 'selected' }} @endif>
                                Bolivia
                                </option>
                                <option value="BA" @if (old('country') == "BA") {{ 'selected' }} @endif>
                                Bosnia y
                                Herzegovina
                                </option>
                                <option value="BW" @if (old('country') == "BW") {{ 'selected' }} @endif>
                                Botswana
                                </option>
                                <option value="Brasil" @if (old('country') == "Brasil") {{ 'selected' }} @endif>
                                Brasil
                                </option>
                                <option value="BN" @if (old('country') == "BN") {{ 'selected' }} @endif>
                                Brunei
                                </option>
                                <option value="BG" @if (old('country') == "BG") {{ 'selected' }} @endif>
                                Bulgaria
                                </option>
                                <option value="BF" @if (old('country') == "BF") {{ 'selected' }} @endif>
                                Burkina
                                Faso
                                </option>
                                <option value="BI" @if (old('country') == "BI") {{ 'selected' }} @endif>
                                Burundi
                                </option>
                                <option value="BT" @if (old('country') == "BT") {{ 'selected' }} @endif>
                                Bután
                                </option>
                                <option value="CV" @if (old('country') == "CV") {{ 'selected' }} @endif>
                                Cabo
                                Verde
                                </option>
                                <option value="KH" @if (old('country') == "KH") {{ 'selected' }} @endif>
                                Camboya
                                </option>
                                <option value="CM" @if (old('country') == "CM") {{ 'selected' }} @endif>
                                Camerún
                                </option>
                                <option value="Canadá" @if (old('country') == "Canadá") {{ 'selected' }} @endif>
                                Canadá
                                </option>
                                <option value="TD" @if (old('country') == "TD") {{ 'selected' }} @endif>
                                Chad
                                </option>
                                <option value="Chile" @if (old('country') == "Chile") {{ 'selected' }} @endif>
                                Chile
                                </option>
                                <option value="CN" @if (old('country') == "CN") {{ 'selected' }} @endif>
                                China
                                </option>
                                <option value="CY" @if (old('country') == "CY") {{ 'selected' }} @endif>
                                Chipre
                                </option>
                                <option value="VA" @if (old('country') == "VA") {{ 'selected' }} @endif>
                                Ciudad
                                del Vaticano (Santa Sede)
                                </option>
                                <option value="Colombia" @if (old('country') == "Colombia") {{ 'selected' }} @endif>
                                Colombia
                                </option>
                                <option value="KM" @if (old('country') == "KM") {{ 'selected' }} @endif>
                                Comores
                                </option>
                                <option value="CG"@if (old('country') == "CG") {{ 'selected' }} @endif>
                                Congo
                                </option>
                                <option value="CD" @if (old('country') == "CD") {{ 'selected' }} @endif>
                                Congo,
                                República Democrática del
                                </option>
                                <option value="KR" @if (old('country') == "KR") {{ 'selected' }} @endif>
                                Corea
                                </option>
                                <option value="KP" @if (old('country') == "KP") {{ 'selected' }} @endif>
                                Corea
                                del Norte
                                </option>
                                <option value="CI" @if (old('country') == "CI") {{ 'selected' }} @endif>
                                Costa de
                                Marfíl
                                </option>
                                <option value="CR" @if (old('country') == "CR") {{ 'selected' }} @endif>
                                Costa
                                Rica
                                </option>
                                <option value="HR" @if (old('country') == "HR") {{ 'selected' }} @endif>
                                Croacia
                                (Hrvatska)
                                </option>
                                <option value="Cuba" @if (old('country') == "Cuba") {{ 'selected' }} @endif>
                                Cuba
                                </option>
                                <option value="DK" @if (old('country') == "DK") {{ 'selected' }} @endif>
                                Dinamarca
                                </option>
                                <option value="DJ" @if (old('country') == "DJ") {{ 'selected' }} @endif>
                                Djibouti
                                </option>
                                <option value="DM" @if (old('country') == "DM") {{ 'selected' }} @endif>
                                Dominica
                                </option>
                                <option value="Ecuador" @if (old('country') == "Ecuador") {{ 'selected' }} @endif>
                                Ecuador
                                </option>
                                <option value="EG" @if (old('country') == "EG") {{ 'selected' }} @endif>
                                Egipto
                                </option>
                                <option value="El Salvador" @if (old('country') == "El Salvador") {{ 'selected' }} @endif>
                                El
                                Salvador
                                </option>
                                <option value="AE" @if (old('country') == "AE") {{ 'selected' }} @endif>
                                Emiratos
                                Árabes Unidos
                                </option>
                                <option value="ER" @if (old('country') == "ER") {{ 'selected' }} @endif>
                                Eritrea
                                </option>
                                <option value="SI" @if (old('country') == "SI") {{ 'selected' }} @endif>
                                Eslovenia
                                </option>
                                <option value="España" @if (old('country') == "España") {{ 'selected' }} @endif>
                                España
                                </option>
                                <option value="USA" @if (old('country') == "USA") {{ 'selected' }} @endif>
                                Estados
                                Unidos
                                </option>
                                <option value="EE" @if (old('country') == "EE") {{ 'selected' }} @endif>
                                Estonia
                                </option>
                                <option value="ET" @if (old('country') == "ET") {{ 'selected' }} @endif>
                                Etiopía
                                </option>
                                <option value="FJ" @if (old('country') == "FJ") {{ 'selected' }} @endif>
                                Fiji
                                </option>
                                <option value="PH" @if (old('country') == "PH") {{ 'selected' }} @endif>
                                Filipinas
                                </option>
                                <option value="FI" @if (old('country') == "FI") {{ 'selected' }} @endif>
                                Finlandia
                                </option>
                                <option value="Francia" @if (old('country') == "Francia") {{ 'selected' }} @endif>
                                Francia
                                </option>
                                <option value="GA" @if (old('country') == "GA") {{ 'selected' }} @endif>
                                Gabón
                                </option>
                                <option value="GM" @if (old('country') == "GM") {{ 'selected' }} @endif>
                                Gambia
                                </option>
                                <option value="GE" @if (old('country') == "GE") {{ 'selected' }} @endif>
                                Georgia
                                </option>
                                <option value="GH" @if (old('country') == "GH") {{ 'selected' }} @endif>
                                Ghana
                                </option>
                                <option value="GI" @if (old('country') == "GI") {{ 'selected' }} @endif>
                                Gibraltar
                                </option>
                                <option value="GD" @if (old('country') == "GD") {{ 'selected' }} @endif>
                                Granada
                                </option>
                                <option value="GR" @if (old('country') == "GR") {{ 'selected' }} @endif>
                                Grecia
                                </option>
                                <option value="GL" @if (old('country') == "GL") {{ 'selected' }} @endif>
                                Groenlandia
                                </option>
                                <option value="Guadalupe" @if (old('country') == "Guadalupe") {{ 'selected' }} @endif>
                                Guadalupe
                                </option>
                                <option value="GU" @if (old('country') == "GU") {{ 'selected' }} @endif>
                                Guam
                                </option>
                                <option value="Guatemala" @if (old('country') == "Guatemala") {{ 'selected' }} @endif>
                                Guatemala
                                </option>
                                <option value="GY" @if (old('country') == "GY") {{ 'selected' }} @endif>
                                Guayana
                                </option>
                                <option value="GF" @if (old('country') == "GF") {{ 'selected' }} @endif>
                                Guayana
                                Francesa
                                </option>
                                <option value="GN" @if (old('country') == "GN") {{ 'selected' }} @endif>
                                Guinea
                                </option>
                                <option value="GQ" @if (old('country') == "GQ") {{ 'selected' }} @endif>
                                Guinea
                                Ecuatorial
                                </option>
                                <option value="GW" @if (old('country') == "GW") {{ 'selected' }} @endif>
                                Guinea-Bissau
                                </option>
                                <option value="Haití" @if (old('country') == "Haití") {{ 'selected' }} @endif>
                                Haití
                                </option>
                                <option value="Honduras" @if (old('country') == "Honduras") {{ 'selected' }} @endif>
                                Honduras
                                </option>
                                <option value="HU" @if (old('country') == "HU") {{ 'selected' }} @endif>
                                Hungría
                                </option>
                                <option value="IN" @if (old('country') == "IN") {{ 'selected' }} @endif>
                                India
                                </option>
                                <option value="ID" @if (old('country') == "ID") {{ 'selected' }} @endif>
                                Indonesia
                                </option>
                                <option value="IQ" @if (old('country') == "IQ") {{ 'selected' }} @endif>
                                Irak
                                </option>
                                <option value="IR" @if (old('country') == "IR") {{ 'selected' }} @endif>
                                Irán
                                </option>
                                <option value="Irlanda" @if (old('country') == "Irlanda") {{ 'selected' }} @endif>
                                Irlanda
                                </option>
                                <option value="BV" @if (old('country') == "BV") {{ 'selected' }} @endif>
                                Isla
                                Bouvet
                                </option>
                                <option value="CX" @if (old('country') == "CX") {{ 'selected' }} @endif>
                                Isla de
                                Christmas
                                </option>
                                <option value="IS" @if (old('country') == "IS") {{ 'selected' }} @endif>
                                Islandia
                                </option>
                                <option value="KY" @if (old('country') == "KY") {{ 'selected' }} @endif>
                                Islas
                                Caimán
                                </option>
                                <option value="CK" @if (old('country') == "CK") {{ 'selected' }} @endif>
                                Islas
                                Cook
                                </option>
                                <option value="CC" @if (old('country') == "CC") {{ 'selected' }} @endif>
                                Islas de
                                Cocos o Keeling
                                </option>
                                <option value="FO" @if (old('country') == "FO") {{ 'selected' }} @endif>
                                Islas
                                Faroe
                                </option>
                                <option value="HM" @if (old('country') == "HM") {{ 'selected' }} @endif>
                                Islas
                                Heard y McDonald
                                </option>
                                <option value="FK" @if (old('country') == "FK") {{ 'selected' }} @endif>
                                Islas
                                Malvinas
                                </option>
                                <option value="MP" @if (old('country') == "MP") {{ 'selected' }} @endif>
                                Islas
                                Marianas del Norte
                                </option>
                                <option value="MH" @if (old('country') == "MH") {{ 'selected' }} @endif>
                                Islas
                                Marshall
                                </option>
                                <option value="UM" @if (old('country') == "UM") {{ 'selected' }} @endif>
                                Islas
                                menores de Estados Unidos
                                </option>
                                <option value="PW" @if (old('country') == "PW") {{ 'selected' }} @endif>
                                Islas
                                Palau
                                </option>
                                <option value="SB" @if (old('country') == "SB") {{ 'selected' }} @endif>
                                Islas
                                Salomón
                                </option>
                                <option value="SJ" @if (old('country') == "SJ") {{ 'selected' }} @endif>
                                Islas
                                Svalbard y Jan Mayen
                                </option>
                                <option value="TK" @if (old('country') == "TK") {{ 'selected' }} @endif>
                                Islas
                                Tokelau
                                </option>
                                <option value="TC" @if (old('country') == "TC") {{ 'selected' }} @endif>
                                Islas
                                Turks y Caicos
                                </option>
                                <option value="VI" @if (old('country') == "VI") {{ 'selected' }} @endif>
                                Islas
                                Vírgenes (EEUU)
                                </option>
                                <option value="VG" @if (old('country') == "VG") {{ 'selected' }} @endif>
                                Islas
                                Vírgenes (Reino Unido)
                                </option>
                                <option value="WF" @if (old('country') == "WF") {{ 'selected' }} @endif>
                                Islas
                                Wallis y Futuna
                                </option>
                                <option value="IL" @if (old('country') == "IL") {{ 'selected' }} @endif>
                                Israel
                                </option>
                                <option value="Italia" @if (old('country') == "Italia") {{ 'selected' }} @endif>
                                Italia
                                </option>
                                <option value="Jamaica" @if (old('country') == "Jamaica") {{ 'selected' }} @endif>
                                Jamaica
                                </option>
                                <option value="JP" @if (old('country') == "JP") {{ 'selected' }} @endif>
                                Japón
                                </option>
                                <option value="JO" @if (old('country') == "JO") {{ 'selected' }} @endif>
                                Jordania
                                </option>
                                <option value="KZ" @if (old('country') == "KZ") {{ 'selected' }} @endif>
                                Kazajistán
                                </option>
                                <option value="KE" @if (old('country') == "KE") {{ 'selected' }} @endif>
                                Kenia
                                </option>
                                <option value="KG" @if (old('country') == "KG") {{ 'selected' }} @endif>
                                Kirguizistán
                                </option>
                                <option value="KI" @if (old('country') == "KI") {{ 'selected' }} @endif>
                                Kiribati
                                </option>
                                <option value="KW" @if (old('country') == "KW") {{ 'selected' }} @endif>
                                Kuwait
                                </option>
                                <option value="LA" @if (old('country') == "LA") {{ 'selected' }} @endif>
                                Laos
                                </option>
                                <option value="LS" @if (old('country') == "LS") {{ 'selected' }} @endif>
                                Lesotho
                                </option>
                                <option value="LV" @if (old('country') == "LV") {{ 'selected' }} @endif>
                                Letonia
                                </option>
                                <option value="LB" @if (old('country') == "LB") {{ 'selected' }} @endif>
                                Líbano
                                </option>
                                <option value="LR" @if (old('country') == "LR") {{ 'selected' }} @endif>
                                Liberia
                                </option>
                                <option value="LY" @if (old('country') == "LY") {{ 'selected' }} @endif>
                                Libia
                                </option>
                                <option value="LI" @if (old('country') == "LI") {{ 'selected' }} @endif>
                                Liechtenstein
                                </option>
                                <option value="LT" @if (old('country') == "LT") {{ 'selected' }} @endif>
                                Lituania
                                </option>
                                <option value="LU" @if (old('country') == "LU") {{ 'selected' }} @endif>
                                Luxemburgo
                                </option>
                                <option value="MK" @if (old('country') == "MK") {{ 'selected' }} @endif>
                                Macedonia, Ex-República Yugoslava
                                </option>
                                <option value="MG" @if (old('country') == "MG") {{ 'selected' }} @endif>
                                Madagascar
                                </option>
                                <option value="MY" @if (old('country') == "MY") {{ 'selected' }} @endif>
                                Malasia
                                </option>
                                <option value="MW" @if (old('country') == "MW") {{ 'selected' }} @endif>
                                Malawi
                                </option>
                                <option value="MV" @if (old('country') == "MV") {{ 'selected' }} @endif>
                                Maldivas
                                </option>
                                <option value="ML" @if (old('country') == "ML") {{ 'selected' }} @endif>
                                Malí
                                </option>
                                <option value="MT" @if (old('country') == "MT") {{ 'selected' }} @endif>
                                Malta
                                </option>
                                <option value="MA" @if (old('country') == "MA") {{ 'selected' }} @endif>
                                Marruecos
                                </option>
                                <option value="MQ" @if (old('country') == "MQ") {{ 'selected' }} @endif>
                                Martinica
                                </option>
                                <option value="MU" @if (old('country') == "MU") {{ 'selected' }} @endif>
                                Mauricio
                                </option>
                                <option value="MR" @if (old('country') == "MR") {{ 'selected' }} @endif>
                                Mauritania
                                </option>
                                <option value="YT" @if (old('country') == "YT") {{ 'selected' }} @endif>
                                Mayotte
                                </option>
                                <option value="México" @if (old('country') == "México") {{ 'selected' }} @endif>
                                México
                                </option>
                                <option value="FM" @if (old('country') == "FM") {{ 'selected' }} @endif>
                                Micronesia
                                </option>
                                <option value="MD" @if (old('country') == "MD") {{ 'selected' }} @endif>
                                Moldavia
                                </option>
                                <option value="MC" @if (old('country') == "MC") {{ 'selected' }} @endif>
                                Mónaco
                                </option>
                                <option value="MN" @if (old('country') == "MN") {{ 'selected' }} @endif>
                                Mongolia
                                </option>
                                <option value="MS" @if (old('country') == "MS") {{ 'selected' }} @endif>
                                Montserrat
                                </option>
                                <option value="MZ" @if (old('country') == "MZ") {{ 'selected' }} @endif>
                                Mozambique
                                </option>
                                <option value="NA" @if (old('country') == "NA") {{ 'selected' }} @endif>
                                Namibia
                                </option>
                                <option value="NR" @if (old('country') == "NR") {{ 'selected' }} @endif>
                                Nauru
                                </option>
                                <option value="NP" @if (old('country') == "NP") {{ 'selected' }} @endif>
                                Nepal
                                </option>
                                <option value="Nicaragua" @if (old('country') == "Nicaragua") {{ 'selected' }} @endif>
                                Nicaragua
                                </option>
                                <option value="NE" @if (old('country') == "NE") {{ 'selected' }} @endif>
                                Níger
                                </option>
                                <option value="NG" @if (old('country') == "NG") {{ 'selected' }} @endif>
                                Nigeria
                                </option>
                                <option value="NU" @if (old('country') == "NU") {{ 'selected' }} @endif>
                                Niue
                                </option>
                                <option value="NF" @if (old('country') == "NF") {{ 'selected' }} @endif>
                                Norfolk
                                </option>
                                <option value="NO" @if (old('country') == "NO") {{ 'selected' }} @endif>
                                Noruega
                                </option>
                                <option value="NC" @if (old('country') == "NC") {{ 'selected' }} @endif>
                                Nueva
                                Caledonia
                                </option>
                                <option value="NZ" @if (old('country') == "NZ") {{ 'selected' }} @endif>
                                Nueva
                                Zelanda
                                </option>
                                <option value="OM" @if (old('country') == "OM") {{ 'selected' }} @endif>
                                Omán
                                </option>
                                <option value="NL" @if (old('country') == "NL") {{ 'selected' }} @endif>
                                Países
                                Bajos
                                </option>
                                <option value="Panamá" @if (old('country') == "Panamá") {{ 'selected' }} @endif>
                                Panamá
                                </option>
                                <option value="PG" @if (old('country') == "PG") {{ 'selected' }} @endif>
                                Papúa
                                Nueva Guinea
                                </option>
                                <option value="PK" @if (old('country') == "PK") {{ 'selected' }} @endif>
                                Paquistán
                                </option>
                                <option value="Paraguay" @if (old('country') == "Paraguay") {{ 'selected' }} @endif>
                                Paraguay
                                </option>
                                <option value="Perú" @if (old('country') == "Perú") {{ 'selected' }} @endif>
                                Perú
                                </option>
                                <option value="PN" @if (old('country') == "PN") {{ 'selected' }} @endif>
                                Pitcairn
                                </option>
                                <option value="PF" @if (old('country') == "PF") {{ 'selected' }} @endif>
                                Polinesia Francesa
                                </option>
                                <option value="PL" @if (old('country') == "PL") {{ 'selected' }} @endif>
                                Polonia
                                </option>
                                <option value="Portugal" @if (old('country') == "Portugal") {{ 'selected' }} @endif>
                                Portugal
                                </option>
                                <option value="PR" @if (old('country') == "PR") {{ 'selected' }} @endif>
                                Puerto
                                Rico
                                </option>
                                <option value="QA" @if (old('country') == "QA") {{ 'selected' }} @endif>
                                Qatar
                                </option>
                                <option value="UK" @if (old('country') == "UK") {{ 'selected' }} @endif>
                                Reino
                                Unido
                                </option>
                                <option value="CF" @if (old('country') == "CF") {{ 'selected' }} @endif>
                                República Centroafricana
                                </option>
                                <option value="CZ" @if (old('country') == "CZ") {{ 'selected' }} @endif>
                                República Checa
                                </option>
                                <option value="ZA" @if (old('country') == "ZA") {{ 'selected' }} @endif>
                                República de Sudáfrica
                                </option>
                                <option value="República Dominicana" @if (old('country') == "República Dominicana") {{ 'selected' }} @endif>
                                República Dominicana
                                </option>
                                <option value="SK" @if (old('country') == "SK") {{ 'selected' }} @endif>
                                República Eslovaca
                                </option>
                                <option value="RE" @if (old('country') == "RE") {{ 'selected' }} @endif>
                                Reunión
                                </option>
                                <option value="RW" @if (old('country') == "RW") {{ 'selected' }} @endif>
                                Ruanda
                                </option>
                                <option value="RO" @if (old('country') == "RO") {{ 'selected' }} @endif>
                                Rumania
                                </option>
                                <option value="RU" @if (old('country') == "RU") {{ 'selected' }} @endif>
                                Rusia
                                </option>
                                <option value="EH" @if (old('country') == "EH") {{ 'selected' }} @endif>
                                Sahara
                                Occidental
                                </option>
                                <option value="KN" @if (old('country') == "KN") {{ 'selected' }} @endif>
                                Saint
                                Kitts y Nevis
                                </option>
                                <option value="WS" @if (old('country') == "WS") {{ 'selected' }} @endif>
                                Samoa
                                </option>
                                <option value="AS" @if (old('country') == "AS") {{ 'selected' }} @endif>
                                Samoa
                                Americana
                                </option>
                                <option value="SM" @if (old('country') == "SM") {{ 'selected' }} @endif>
                                San
                                Marino
                                </option>
                                <option value="VC" @if (old('country') == "VC") {{ 'selected' }} @endif>
                                San
                                Vicente y Granadinas
                                </option>
                                <option value="SH" @if (old('country') == "SH") {{ 'selected' }} @endif>
                                Santa
                                Helena
                                </option>
                                <option value="LC" @if (old('country') == "LC") {{ 'selected' }} @endif>
                                Santa
                                Lucía
                                </option>
                                <option value="ST" @if (old('country') == "ST") {{ 'selected' }} @endif>
                                Santo
                                Tomé y Príncipe
                                </option>
                                <option value="SN" @if (old('country') == "SN") {{ 'selected' }} @endif>
                                Senegal
                                </option>
                                <option value="SC" @if (old('country') == "SC") {{ 'selected' }} @endif>
                                Seychelles
                                </option>
                                <option value="SL" @if (old('country') == "SL") {{ 'selected' }} @endif>
                                Sierra
                                Leona
                                </option>
                                <option value="SG" @if (old('country') == "SG") {{ 'selected' }} @endif>
                                Singapur
                                </option>
                                <option value="SY" @if (old('country') == "SY") {{ 'selected' }} @endif>
                                Siria
                                </option>
                                <option value="SO" @if (old('country') == "SO") {{ 'selected' }} @endif>
                                Somalia
                                </option>
                                <option value="LK" @if (old('country') == "LK") {{ 'selected' }} @endif>
                                Sri
                                Lanka
                                </option>
                                <option value="PM" @if (old('country') == "PM") {{ 'selected' }} @endif>
                                St
                                Pierre y Miquelon
                                </option>
                                <option value="SZ" @if (old('country') == "SZ") {{ 'selected' }} @endif>
                                Suazilandia
                                </option>
                                <option value="SD" @if (old('country') == "SD") {{ 'selected' }} @endif>
                                Sudán
                                </option>
                                <option value="SE" @if (old('country') == "SE") {{ 'selected' }} @endif>
                                Suecia
                                </option>
                                <option value="CH" @if (old('country') == "CH") {{ 'selected' }} @endif>
                                Suiza
                                </option>
                                <option value="SR" @if (old('country') == "SR") {{ 'selected' }} @endif>
                                Surinam
                                </option>
                                <option value="TH" @if (old('country') == "TH") {{ 'selected' }} @endif>
                                Tailandia
                                </option>
                                <option value="TW" @if (old('country') == "TW") {{ 'selected' }} @endif>
                                Taiwán
                                </option>
                                <option value="TZ" @if (old('country') == "TZ") {{ 'selected' }} @endif>
                                Tanzania
                                </option>
                                <option value="TJ" @if (old('country') == "TJ") {{ 'selected' }} @endif>
                                Tayikistán
                                </option>
                                <option value="TF" @if (old('country') == "TF") {{ 'selected' }} @endif>
                                Territorios franceses del Sur
                                </option>
                                <option value="TP" @if (old('country') == "TP") {{ 'selected' }} @endif>
                                Timor
                                Oriental
                                </option>
                                <option value="TG" @if (old('country') == "TG") {{ 'selected' }} @endif>
                                Togo
                                </option>
                                <option value="TO" @if (old('country') == "TO") {{ 'selected' }} @endif>
                                Tonga
                                </option>
                                <option value="TT" @if (old('country') == "TT") {{ 'selected' }} @endif>
                                Trinidad
                                y Tobago
                                </option>
                                <option value="TN" @if (old('country') == "TN") {{ 'selected' }} @endif>
                                Túnez
                                </option>
                                <option value="TM" @if (old('country') == "TM") {{ 'selected' }} @endif>
                                Turkmenistán
                                </option>
                                <option value="TR" @if (old('country') == "TR") {{ 'selected' }} @endif>
                                Turquía
                                </option>
                                <option value="TV" @if (old('country') == "TV") {{ 'selected' }} @endif>
                                Tuvalu
                                </option>
                                <option value="UA" @if (old('country') == "UA") {{ 'selected' }} @endif>
                                Ucrania
                                </option>
                                <option value="UG" @if (old('country') == "UG") {{ 'selected' }} @endif>
                                Uganda
                                </option>
                                <option value="Uruguay" @if (old('country') == "Uruguay") {{ 'selected' }} @endif>
                                Uruguay
                                </option>
                                <option value="UZ" @if (old('country') == "UZ") {{ 'selected' }} @endif>
                                Uzbekistán
                                </option>
                                <option value="VU" @if (old('VUcountry') == "VU") {{ 'selected' }} @endif>
                                Vanuatu
                                </option>
                                <option value="Venezuela" @if (old('country') == "Venezuela") {{ 'selected' }} @endif>
                                Venezuela
                                </option>
                                <option value="VN" @if (old('country') == "VN") {{ 'selected' }} @endif>
                                Vietnam
                                </option>
                                <option value="YE" @if (old('country') == "YE") {{ 'selected' }} @endif>
                                Yemen
                                </option>
                                <option value="YU" @if (old('country') == "YU") {{ 'selected' }} @endif>
                                Yugoslavia
                                </option>
                                <option value="ZM" @if (old('country') == "ZM") {{ 'selected' }} @endif>
                                Zambia
                                </option>
                                <option value="ZW" @if (old('country') == "ZW") {{ 'selected' }} @endif>
                                Zimbabue
                                </option>
                            </select> @if ($errors->has('country'))
                            <span style="color: #761c19" class="help-block">
                                                        <strong>{{ $errors->first('country') }}</strong>
                                                    </span> @endif
                        </div>
                    </div>

                    <div class="panel panel-body">
                        <h3>Datos Financieros</h3>
                    </div>

                    <div class="form-group" {{ $errors->has('amount') ? ' has-error' : '' }}>
                        <label style="color: #0d47a1"
                               class="col-md-6 control-label">Monto
                            de Inversión</label>
                        <div class="col-md-8">
                            <input type="number" name="amount"
                                   placeholder="Monto a invertir en Dólares USA"
                                   value="{{old('amount')}}"
                                   class="form-control px-3"> @if ($errors->has('amount'))
                            <span style="color: #761c19" class="help-block">
                                                    <strong>{{ $errors->first('amount') }}</strong>
                                                </span> @endif

                        </div>
                    </div>

                    <div class="form-group" {{ $errors->has('patrimonio') ? ' has-error' : '' }}>
                        <label for="patrimonio" style="color: #0d47a1"
                               class="col-md-6 control-label">Salario Anual
                            Aproximado en USA $</label>
                        <div class="col-md-8">
                            <select name="patrimonio" class="form-control px-3">
                                <option value="" selected>- Seleccione -
                                </option>
                                <option
                                        value="0-50.000 USD" @if (old('patrimonio') == "0-50.000 USD") {{ 'selected' }} @endif>
                                $0-50.000 USD
                                </option>
                                <option
                                        value="50.001-100.000 USD" @if (old('patrimonio') == "50.001-100.000 USD") {{ 'selected' }} @endif>
                                $50.001-100.000 USD
                                </option>
                                <option
                                        value="101.000 - 200.000 USD" @if (old('patrimonio') == "101.000 - 200.000 USD") {{ 'selected' }} @endif>
                                $101.000 - 200.000 USD
                                </option>
                                <option
                                        value="Estudiante" @if (old('patrimonio') == "101.000 - 200.000 USD") {{ 'selected' }} @endif>
                                $101.000 - 200.000 USD
                                </option>
                                <option
                                        value="201.000-300.000 USD" @if (old('patrimonio') == "201.000-300.000 USD") {{ 'selected' }} @endif>
                                $ 201.000-300.000 USD
                                </option>
                                <option
                                        value="más de 300.000 USD" @if (old('patrimonio') == "más de 300.000 USD") {{ 'selected' }} @endif>
                                más de $300.000 USD
                                </option>
                            </select> @if ($errors->has('patrimonio'))
                            <span style="color: #761c19" class="help-block">
                        <strong>{{ $errors->first('patrimonio') }}</strong>
                    </span> @endif
                        </div>
                    </div>


                    <div class="form-group" {{ $errors->has('origen_fondos') ? ' has-error' : '' }}>
                        <label style="color: #0d47a1" for="origen_fondos"
                               class="col-md-6 control-label">Origen
                            de Fondos</label>
                        <div class="col-md-8">
                            <select name="origen_fondos" class="form-control">
                                <option value="" selected>- Seleccione -
                                </option>

                                <option value="Ahorros" @if (old('origen_fondos') == "Ahorros") {{ 'selected' }} @endif>
                                Ahorros
                                </option>
                                <option
                                        value="Certificados" @if (old('origen_fondos') == "Certificados") {{ 'selected' }} @endif>
                                Certificados
                                </option>

                                <option value="Otro" @if (old('origen_fondos') == "Otro") {{ 'selected' }} @endif>
                                Otro
                                </option>
                            </select> @if ($errors->has('origen_fondos'))
                            <span style="color: #761c19" class="help-block">
                <strong>{{ $errors->first('origen_fondos') }}</strong>
            </span> @endif
                        </div>
                    </div>

                    <div class="form-group" {{ $errors->has('cant_ahorros') ? ' has-error' : '' }}>
                        <label style="color: #0d47a1" for="cant_ahorros"
                               class="col-md-10 control-label">¿Cuánto
                            representa esta
                            inversión de su capital?</label>
                        <div class="col-md-8">
                            <select name="cant_ahorros" class="form-control">
                                <option value="" selected>-Seleccione-
                                </option>
                                <option
                                        value="10% - 30%" @if (old('cant_ahorros') == "10% - 30%") {{ 'selected' }} @endif>
                                10% - 30%
                                </option>
                                <option
                                        value="30% a 50%" @if (old('cant_ahorros') == "30% a 50%") {{ 'selected' }} @endif>
                                30% - 50%
                                </option>
                                <option
                                        value="60% - 90%" @if (old('cant_ahorros') == "60% - 90%") {{ 'selected' }} @endif>
                                60% - 90%
                                </option>
                                <option value="100%" @if (old('cant_ahorros') == "100%") {{ 'selected' }} @endif>
                                100%
                                </option>
                            </select> @if ($errors->has('cant_ahorros'))
                            <span style="color: #761c19" class="help-block">
    <strong>{{ $errors->first('cant_ahorros') }}</strong>
</span> @endif
                        </div>
                    </div>

                    <div class="form-group" {{ $errors->has('residente') ? ' has-error' : '' }}>
                        <label style="color: #0d47a1" for="residente"
                               class="col-md-10 control-label">¿Es Ud
                            ciudadano o residente de
                            E.E.U.U de
                            America?</label>
                        <div class="col-md-8">
                            <select name="residente" class="form-control">
                                <option value="" selected>-Seleccione-
                                </option>
                                <option value="Si" @if (old('residente') == "Si") {{ 'selected' }} @endif>
                                Si
                                </option>
                                <option value="No" @if (old('residente') == "No") {{ 'selected' }} @endif>
                                No
                                </option>
                            </select> @if ($errors->has('residente'))
                            <span style="color: #761c19" class="help-block">
        <strong>{{ $errors->first('residente') }}</strong>
    </span> @endif
                        </div>
                    </div>
                    <div class="form-group" {{ $errors->has('objetivo') ? ' has-error' : '' }}>
                        <label style="color: #0d47a1" for="objetivo"
                               class="col-md-6 control-label">Objetivo de
                            la Inversión</label>
                        <div class="col-md-8">
                            <select name="objetivo" class="form-control">
                                <option value="" selected>- Seleccione -
                                </option>
                                <option
                                        value="Especulacion" @if (old('objetivo') == "Especulacion") {{ 'selected' }} @endif>
                                Especulación
                                </option>
                                <option
                                        value="Cobertura de Riesgo" @if (old('objetivo') == "Cobertura de Riesgo") {{ 'selected' }} @endif>
                                Cobertura de Riesgo
                                </option>
                            </select> @if ($errors->has('objetivo'))
                            <span style="color: #761c19" class="help-block">
    <strong>{{ $errors->first('objetivo') }}</strong>
</span> @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="color: #0d47a1"
                               class="col-md-8 control-label">En caso de accidente o muerte. Nombre un
                            beneficiario</label>
                        <div class="col-md-12">
                            <input type="text" name="beneficiary" class="form-control"
                                   value="{{old('beneficiary')}}" placeholder="Nombre un Beneficiario"
                            >
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="color: #0d47a1"
                               class="col-md-8 control-label">Nombre
                            de su
                            Banco </label>
                        <div class="col-md-12">
                            <input type="text" name="bank" class="form-control"
                                   value="{{old('bank')}}"
                                   placeholder="Nombre de su Banco"
                            >
                        </div>
                    </div>
                    <hr>

                    <div class="col-md-12 col-md-offset-2">
                        <div class="form-group" {{ $errors->has('declaratoria') ? ' has-error' : '' }}>
                            <div class="checkbox c-checkbox">
                                <label style="color: #2b303b"
                                       class="control-label col-md-12">
                                    <input type="checkbox" checked=""
                                           name="declaratoria"
                                           value="Estoy de acuerdo y firmo según las regulaciones de dicho contrato"
                                           required="">
                                    <span class="fa fa-check"></span>
                                    Acepto y estoy de acuerdo con la
                                    <a href="{{route('declaratoria')}}">Declaratoria
                                        del Riesgo y Honorarios .</a>
                                </label> @if ($errors->has('declaratoria'))
                                <span style="color: #2b303b"
                                      class="help-block">
                <strong>{{ $errors->first('declaratoria') }}</strong>
            </span> @endif
                            </div>

                            <div class="form-group" {{ $errors->has('terms') ? ' has-error' : '' }}>
                                <div class="checkbox c-checkbox">
                                    <label style="color: #2b303b"
                                           class="control-label col-md-12">

                                        <input type="checkbox" checked=""
                                               name="terms"
                                               value="Estoy de acuerdo y firmo según las regulaciones de dicho contrato"
                                               required="">
                                        <span class="fa fa-check"></span>
                                        Acepto y estoy de acuerdo el <a
                                                href="{{route('acuerdo')}}">Acuerdo
                                            de
                                            la Cuenta del Cliente.</a>
                                    </label> @if ($errors->has('terms'))
                                    <span style="color: #2b303b"
                                          class="help-block">
        <strong>{{ $errors->first('terms') }}</strong>
    </span> @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Abrir Cuenta
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-4">
            {{-- <img src="{{asset('theme/cgo/assets/images/marketinv.jpg')}} " alt=""> --}}
            <iframe width="560" height="315" src="https://www.youtube.com/embed/LhgxkatKmuQ?start=5"
                    frameborder="0"
                    allow="autoplay; encrypted-media"
                    allowfullscreen></iframe>
            <img src="/theme/cgo/assets/images/marketinv.jpg" height="1200" alt="">
        </div>
    </div>
</div>