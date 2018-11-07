<div id="wrapper">

    <h1>Apertura de Cuenta</h1>

    <campos>
        <form-wizard next-button-text="Siguiente" title="" subtitle="" color="#009db0">
            <form action="{{ route('register') }}" method="post">

                {{ csrf_field() }}
                <tab-content title="Detalles personales" icon="ti-user">
                   PERSONAL DATA {{--
                    <div class="col-4" {{ $errors->has('tcuenta') ? ' has-error' : '' }}>
                        <label>
                            Tipo de Cuenta
                            <select name="tcuenta" onchange="corpSelectCheck(this);">
                                <option value="" selected>- Seleccione tipo de cuenta -
                                </option>
                                <option id="Individual" value="Individual" @if (old( 'tcuenta')=="Individual" ) {{ 'selected' }} @endif>
                                    Individual
                                </option>
                                <option id="Corporativa" value="Corporativa" @if (old( 'tcuenta')=="Corporativa" ) {{ 'selected' }} @endif>
                                    Corporativa
                                </option>
                            </select> --}} {{-- </label> --}} {{-- @if ($errors->has('tcuenta'))
                        <span style="color: #761c19" class="help-block">
                            <strong>{{ $errors->first('tcuenta') }}</strong>
                        </span> @endif --}} {{-- </div> --}} {{--al seleccionar corporativa--}} {{--
                    <div class="col-4" id="corpDivCheck" style="display:none;">
                        <label>Nombre Representante legal:
                            <input placeholder="Representante Legal" id="authmember" type="text" name="authmember" value="{{ old('authmember') }}" tabindex="11">
                        </label>
                    </div>

                    <div class="col-4" id="corpDivCheck" style="display:none;">
                        <label>Autorizado Nº2:
                            <input placeholder="Autorizado #2" id="authmember2" type="text" name="authmember2" value="{{ old('authmember2') }}" tabindex="12">
                        </label>
                    </div>


                    <div class="col-3" id="corpDivCheck" style="display:none;">
                        <label>Autorizado Nº3:
                            <input placeholder="Autorizado #3" id="authmember3" type="text" name="authmember3" value="{{ old('authmember3') }}" tabindex="13">
                        </label>
                    </div>

                    <div class="col-3" id="corpDivCheck" style="display:none;">
                        <label>Autorizado Nº4:
                            <input placeholder="Autorizado #4" id="authmember4" type="text" name="authmember4" value="{{ old('authmember4') }}" tabindex="14">
                        </label>
                    </div>


                    <div class="col-3" id="corpDivCheck" style="display:none;">
                        <label>Autorizado Nº5:
                            <input placeholder="Autorizado #5" id="authmember5" type="text" name="authmember5" value="{{ old('authmember5') }}" tabindex="15">
                        </label>
                    </div>


                    <div class="col-3" id="corpDivCheck" style="display:none;">
                        <label>Nombre de Empresa/Razón Social:
                            <input placeholder="Nombre de la Empresa" id="corpname" type="text" name="corpname" value="{{ old('corpname') }}" tabindex="15">
                        </label>
                    </div> --}} {{--fin de seleccion--}} {{-- inicio del nuevo form --}}

                    <div class="col-2" {{ $errors->has('nombre') ? ' has-error' : '' }}>
                        <label>
                            Nombre
                            <input placeholder="¿Cuál es su nombre completo?" id="nombre" name="nombre"
                                   value="{{old('nombre')}}" tabindex="1"> @if ($errors->has('nombre'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                    <div class="col-2">
                        <label>
                            Empresa
                            <input placeholder="¿Dónde labora actualmente?" id="empresa" name="empresa"
                                   {{old( 'empresa')}} tabindex="2">
                        </label>
                    </div>

                    <div class="col-3" {{ $errors->has('telefono') ? ' has-error' : '' }}>
                        <label>
                            Teléfono
                            <input placeholder="¿Cuál es el mejor número telefónico para llamarle?" id="telefono"
                                   name="telefono" value="{{old('telefono')}}"
                                   tabindex="3"> @if ($errors->has('telefono'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('telefono') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                    <div class="col-3" {{$errors->has('movil') ? 'has-error' : ''}}>
                        <label>
                            Teléfono Celular
                            <input placeholder="número de su móvil" name="movil" value="{{old('movil')}}"
                                   tabindex="11"/> @if ($errors->has('movil'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('movil') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>

                    <div class="col-3" {{$errors->has('tiempo_laborado') ? 'has-error' : ''}}>
                        <label>
                            Años Laborandos
                            <select name="tiempo_laborado" tabindex="5">
                                <option value="">-Seleccione-</option>
                                <option value="1-3 años" @if (old( 'tiempo_laborado')=="1-3 años" ) {{ 'selected' }} @endif>
                                    1-3 años
                                </option>
                                <option value="3-5 años" @if (old( 'tiempo_laborado')=="3-5 años" ) {{ 'selected' }} @endif>
                                    3-5 años
                                </option>
                                <option value="Más de 5 años" @if (old( 'tiempo_laborado')=="Más de 5 años" ) {{ 'selected' }} @endif>
                                    Más de 5 años
                                </option>
                            </select>
                            @if ($errors->has('tiempo_laborado'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('tiempo_laborado') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>


                    <div class="col-4" {{$errors->has('idn') ? 'has-error' : ''}}>
                        <label>
                            IDN
                            <input placeholder="Número de identificación" id="idn" name="idn" value=" {{old('idn')}} "
                                   tabindex="6"> @if ($errors->has('idn'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('idn') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                    <div class="col-4" {{$errors->has('civil') ? 'has-error' : ''}}>
                        <label>
                            Estado Civil
                            <select name="civil" tabindex="7">
                                <option value="">-Seleccione-</option>
                                <option value="Casado(a)" @if (old( 'civil')=="Casado(a)" ) {{ 'selected' }} @endif>
                                    Casado(a)
                                </option>
                                <option value="Divorciado(a)" @if (old( 'civil')=="Divorciado(a)" ) {{ 'selected' }} @endif>
                                    Divorciado(a)
                                </option>
                                <option value="Soltero(a)" @if (old( 'civil')=="Soltero(a)" ) {{ 'selected' }} @endif>
                                    Soltero(a)
                                </option>
                                <option value="Union libre" @if (old( 'civil')=="Union libre" ) {{ 'selected' }} @endif>
                                    Union libre
                                </option>
                                <option value="Viudo(a)" @if (old( 'civil')=="Viudo(a)" ) {{ 'selected' }} @endif>
                                    Viudo(a)
                                </option>
                            </select>
                            @if ($errors->has('civil'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('civil') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>

                    <div class="col-4" {{$errors->has('inversionista') ? 'has-error' : ''}}>
                        <label>¿Es Ud inversionista?
                            <select name="inversionista" tabindex="20">
                                <option value="">-Seleccione-</option>
                                <option value="Si" @if (old( 'inversionista')=="Si" ) {{ 'selected' }} @endif>Si
                                </option>
                                <option value="No" @if (old( 'inversionista')=="No" ) {{ 'selected' }} @endif>No
                                </option>
                            </select>
                            @if ($errors->has('inversionista'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('inversionista') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>


                    <div class="col-4" {{$errors->has('ocupacion') ? 'has-error' : ''}}>
                        <label>
                            Ocupación
                            <input placeholder="¿A qué se dedica?" id="ocupacion" name="ocupacion"
                                   value="{{ old('ocupacion') }}" tabindex="10"/> @if ($errors->has('ocupacion'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('ocupacion') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>

                    <div class="col-4">
                        <label>
                            Ciudad
                            <input placeholder="Ciudad" id="ciudad" name="city" value="{{old('city')}} " tabindex="12">
                        </label>
                    </div>

                    <div class="col-4">
                        <label>
                            Estado
                            <input type="text" name="state" placeholder="Estado o Provincia" value="{{old('state')}} "
                                   tabindex="13"/>
                        </label>
                    </div>

                    <div class="col-4" {{$errors->has('pais') ? 'has-error' : '' }} >
                        <label>
                            País
                            <input id="pais" name="pais" value="{{old('pais')}}"
                                   tabindex="14"> @if ($errors->has('pais'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('pais') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                </tab-content>
                <tab-content title=" Datos Financieros">


                    <div class="col-4" {{$errors->has('patrimonio') ? 'has-error' : ''}}>
                        <label>
                            Patrimonio Aproximado en USD
                            <select name="patrimonio" tabindex="15">
                                <option value="">-Seleccione-</option>
                                <option value="de $50.000 a $100.000 USD" @if (old( 'patrimonio')=="de $50.000 a $100.000 USD" ) {{ 'selected' }} @endif>
                                    de $50.000 a $100.000 USD
                                </option>
                                <option value="de $101.000 a $200.000 USD" @if (old( 'patrimonio')=="de $101.000 a $200.000 USD" ) {{ 'selected' }} @endif>
                                    de $101.000 a $200.000 USD
                                </option>
                                <option value="de $201.000 a $300.000 USD" @if (old( 'patrimonio')=="de $201.000 a $300.000 USD" ) {{ 'selected' }} @endif>
                                    de $201.000 a $300.000 USD
                                </option>
                                <option value="Mas de $300.000 USD" @if (old( 'patrimonio')=="Mas de $300.000 USD" ) {{ 'selected' }} @endif>
                                    Mas de $300.000 USD
                                </option>
                            </select>
                            @if ($errors->has('patrimonio'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('patrimonio') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>

                    <div class="col-4" {{$errors->has('amount') ? 'has-error' : ''}}>
                        <label>
                            Inversión de apertura
                            <input type="number" placeholder="Capital de apertura de cuenta" id="amount" name="amount"
                                   value=" {{old('amount')}} " tabindex="16"> @if ($errors->has('amount'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('amount') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>

                    <div class="col-4" {{ $errors->has('origen') ? ' has-error' : '' }}>
                        <label>
                            Origen de los fondos
                            <input placeholder=" Origen de los fondos a invertir" id="origen" name="origen"
                                   value=" {{old('origen')}} " tabindex="17"> @if ($errors->has('origen'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('origen') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>

                    <div class="col-4" {{$errors->has('residente') ? 'has-error' : ''}}>
                        <label>¿Es Ud residente de USA?
                            <select name="residente" tabindex="22">
                                <option value="">-Seleccione-</option>
                                <option value="Si" @if (old( 'residente')=="Si" ) {{ 'selected' }} @endif>
                                    Si
                                </option>
                                <option value="No" @if (old( 'residente')=="No" ) {{ 'selected' }} @endif>
                                    No
                                </option>
                            </select>
                            @if ($errors->has('residente'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('residente') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>

                    <div class="col-4" {{$errors->has('objetivo') ? 'has-error' : ''}}>
                        <label>
                            Objetivo de la inversión
                            <select name="objetivo" tabindex="18">
                                <option value="">-Seleccione-</option>
                                <option value="Especulación del Mercado" @if (old( 'objetivo')=="Especulación del Mercado" ) {{ 'selected' }} @endif>
                                    Especulación del Mercado
                                </option>
                                <option value="Recuperación de Capital" @if (old( 'objetivo')=="Recuperación de Capital" ) {{ 'selected' }} @endif>
                                    Recuperación de Capital
                                </option>
                            </select>
                            @if ($errors->has('objetivo'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('objetivo') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                    <div class="col-4" {{$errors->has('porcentahorros') ? 'has-error' : ''}}>
                        <label>
                            ¿Cuál es el porcentaje que representa ésta inversión de sus ahorros?
                            <select name="porcentahorros" tabindex="19">
                                <option value="">-Seleccione-</option>
                                <option value="10%" @if (old( 'porcentahorros')=="10%" ) {{ 'selected' }} @endif>10%
                                </option>
                                <option value="20%" @if (old( 'porcentahorros')=="20%" ) {{ 'selected' }} @endif>20%
                                </option>
                                <option value="40%" @if (old( 'porcentahorros')=="40%" ) {{ 'selected' }} @endif>40%
                                </option>
                                <option value="50%" @if (old( 'porcentahorros')=="10%" ) {{ 'selected' }} @endif>50%
                                </option>
                                <option value="más del 50%" @if (old( 'porcentahorros')=="más del 50%" ) {{ 'selected' }} @endif>
                                    más del 50%
                                </option>
                            </select>
                            @if ($errors->has('porcentahorros'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('porcentahorros') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                    <div class="col-4">
                        <label>
                            Beneficiario en caso de accidente o muerte
                            <input placeholder=" Nombre de algún beneficiario" id="beneficiario" name="beneficiario"
                                   value=" {{old('beneficiario')}} "
                                   tabindex="20">
                        </label>
                    </div>
                    <div class="col-4">
                        <label>
                            Banco perteneciente
                            <input placeholder=" Nombre de banco que tiene sus fondos " id="bank" name="bank"
                                   tabindex="20">
                        </label>
                    </div>
                </tab-content>

                <tab-content title=" Datos de Acceso a Cuenta">

                    <div class="col-3" {{$errors->has('email') ? 'has-error' : ''}}>
                        <label>
                            Correo Electrónico
                            <input placeholder="¿Cuál es su correo electrónico?" id="email" name="email"
                                   value="{{old('email')}} " tabindex="21"> @if ($errors->has('email'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                    <div class="col-3" {{$errors->has('password') ? 'has-error' : ''}}>
                        <label>
                            Contraseña
                            <input type="password" placeholder="Escriba una contraseña" id="password" name="password"
                                   tabindex="22"> @if ($errors->has('password'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                    <div class="col-3" {{$errors->has('password-confirm') ? 'has-error' : ''}}>
                        <label>
                            Repetir contraseña
                            <input type="password" placeholder="Vuelca a escribir la contraseña" id="password-confirm"
                                   name="password-confirm" tabindex="23"> @if ($errors->has('password-confirm'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('password-confirm') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>

                    <hr>

                    <div class="col-2" {{$errors->has('declaratoria') ? 'has-error' : ''}}>

                        <label>
                            <input type="checkbox" checked="" name="declaratoria"
                                   value="Estoy de acuerdo y firmo sugun las regulaciones de dicho contrato"
                                   required="">
                            <span class="fa fa-check"></span>
                            Acepto y estoy de acuerdo con la
                            <a href="{{route('declaratoria')}}">Declaratoria del Riesgo y Honorarios .</a>
                            @if ($errors->has('declaratoria'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('declaratoria') }}</strong>
                            </span>
                            @endif
                        </label>

                    </div>

                    <div class="col-2" {{$errors->has('terms') ? 'has-error' :''}}>
                        <label>
                            <input type="checkbox" checked="" name="terms"
                                   value="Estoy de acuerdo y firmo sugun las regulaciones de dicho contrato"
                                   required="">
                            <span class="fa fa-check"></span>
                            Acepto y estoy de acuerdo el
                            <a href="{{route('acuerdo')}}">Acuerdo de la Cuenta del Cliente.</a>
                            @if ($errors->has('terms'))
                                <span class="help-block" style="color: red">
                                <strong>{{ $errors->first('terms') }}</strong>
                            </span>
                            @endif
                        </label>
                    </div>
                </tab-content>

                <div class="col-submit">
                    <button type="submit" class="btn btn-sm btn-warning display-4">
                        <strong>
                            CREAR CUENTA
                        </strong>
                    </button>
                </div>

            </form>
        </form-wizard>
    </campos>
</div>

<script>
    Vue.use(VueFormWizard);
    var app = new Vue({
        el: '#app'
    });
</script>

<script type="text/javascript">
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function (html) {
        var switchery = new Switchery(html);
    });

</script>

<script>
    function corpSelectCheck(nameSelect) {
        console.log(nameSelect);
        if (nameSelect) {
            admOptionValue = document.getElementById("Corporativa").value;
            if (admOptionValue == nameSelect.value) {
                document.getElementById("corpDivCheck").style.display = "block";
            }
            else {
                document.getElementById("corpDivCheck").style.display = "none";
            }
        }

        if (nameSelect) {
            admOptionValue = document.getElementById("Individual").value;
            if (admOptionValue == nameSelect.value) {
                document.getElementById("indDivCheck").style.display = "block";
            }
            else {
                document.getElementById("indDivCheck").style.display = "none";
            }
        }


        else {
            document.getElementById("corpDivCheck").style.display = "none";
        }
    }

</script>