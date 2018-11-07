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
                <h2>Wire Instructions</h2>
                <div class="panel-body">
                    <p class="pull-right"><a href="{{ asset('rep/wireinst.pdf') }}"
                    target="_blank">DOWNLOAD IN PDF</a></p>
                    <p>DOWNLOAD INSTRUCTIONS IN PDF FORMAT,PRINT IT AND TAKE IT TO YOUR BANK FOR FUNDING YOUR ACCOUNT Nº {{ $user->id }}.</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-md-10">
            <h4>Upon concluding the bank transfer, ask your bank for a copy of it for your
            own records, and then scan it, attach it, and e-mail it back to us at:
            info@berlingercapital.com, for its due follow-up.</h4>
            <hr>
            <h4>TRANSFER ONLY UNITED STATES $ DOLLARS</h4>
            <hr>
            <h5>FINAL BENEFICIARY INFORMATION:</h5><br>
            BENEFICIARY BANK: Banco Lafise, S.A.<br>
            BANK ADDRESS: 50 Este De Fuente De La Hispanidad, San Pedro, Montes De Oca, San Jose,
            Costa Rica <br>
            TELEPHONE: +506-8000-5234-73 <br>
            SWIFT: BCCECRSJ<br>
            ACCOUNT NAME: Erlington Group, S.A.<br>
            ACCOUNT ADDRESS: Edificio 1773, Avenida 6, Calle 17 y 19, San Jose, Costa Rica<br>
            BENEFICIARY BANK ACCOUNT Nº: 11400007455441277<br>
            BENEFICIARY IBAN: CR78011400007455441277<br>
            ====================================
            <h3>TRANSFER DETAIL LEGEND:</h3>
            <p>For further credit to {{ $user->name }} in account number {{ $user->id }}.</p><br>
            <hr>
            <h5>Intermediary Bank* (OPTIONAL):</h5><br>
            <p> Some banks may use their own intermediary bank. This is okay as long as
                they find a way to send the funds to the final beneficiary.
            </p><br>
            Intermediary Bank: Citibank N.V.<br>
            Bank Address:
            111 Wall Street, New York, New York, 10005, United States Of America<br>
            SWIFT Code: CITIUS33<br>
            ABA: 021000089<br>
            ===================================<br>
            <h5>IMPORTANT: We do not accept third party transfers. </h5>
            <br>
        </div>
    </div>
</div>
@endsection