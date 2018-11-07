@extends('layouts.master')
@section('content')
<h3>Dashboard</h3>
<div class="row">
    <div class="col-md-10">
        <!-- First Row Starts Here -->
        @include('users.partials.ebalance')
        <!-- First Row Ends Here -->
        <div class="row">
            <div class="col-lg-12">
                <h2>Wired Instructions</h2>
                <div class="panel-body">
                    <p class="pull-right"><a href="{{ asset('rep/supdf') }}"
                     target="_blank">DOWNLOAD IN PDF</a></p>
                     <p>DOWNLOAD INSTRUCTIONS IN PDF FORMAT,PRINT IT AND TAKE IT TO YOUR BANK FOR FUNDING YOUR ACCOUNT Nº {{ $user->id }}.</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="col-md-10">

                <h4>A continuación le presentamos las instrucciones de transferencia para ingresar fondos a su cuenta.
                Toda transaccón se hace de banco a banco bajo transferencia bancaria.</h4>

                <h5>BANCO BENEFICIARIO:</h5><br>
                Banco de Costa Rica, S.A.<br>
                Dirección: XXXXXXXXXXXXX <br>
                <br>
                Teléfono: XXXXXXXXX <br>
                SWIFT: XXXXXXXX<br>

                =====================================

                <h5>BENEFICIARIO FINAL:</h5><br>
                Nombre del Beneficiario: XXXXXXXX<br>
                Número de cuenta: XXXXXXXX<br>
                Cédula Jurídica: XXXXXXXX<br>
                Ubicación: XXXXXXXX<br>
                San José, Costa Rica. CP 10901.<br>
                Teléfono: XXXXXXXXX<br>
                IBAN: XXXXXXXX (Solo si es requerido)*<br>

                ====================================

                <h3>Detalle o Motivo de la Transferencia:</h3>
                <p>For further credit to {{ $user->name }} y Número de Cliente {{ $user->id }}.</p><br>
                <h5>Banco Intermediario* (OPCIONAL):</h5><br>
                <p> Cada banco cuenta con su propio banco intermediario, si su banco es muy pequeño y le exige utilizar
                    un banco intermediario externo, puede hacer la ruta de los fondos a través de nuestro banco
                    intermediario, pero en la mayoría de los casos NO es necesario.
                </p><br>
                <h5>Bank of New York Mellon</h5><br>
                Dirección: One Wall Street, 9 South.<br>
                Ciudad: New York, New York. 10286<br>
                País: USA<br>
                ABA: XXXXXXXX (Solo si es requerido)<br>
                SWIFT: XXXXXXXX<br>
                Cuenta del Banco del Banco intermediario: XXXXXXXXX<br>
                ===================================

                <h5>IMPORTANTE: No aceptamos transferencias de terceros. La persona que deposita debe ser el titular de
                la cuenta.</h5>
                <p> *Si su depósito es en las Criptomonedas autorizadas (Ethereum – Bitcoin – Bitcoin Cash) favor
                    solicite nuestra dirección Corporativa para su transacción respectiva*
                Necesitas Asistencia? Llámanos al +XXXXXXXX o escribe al WhatsApp +XXXXXXXX</p>
                <br>
            </div>
        </div>
    </div>

    @endsection
