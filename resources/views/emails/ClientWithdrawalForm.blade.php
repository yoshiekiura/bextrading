@component('mail::message')
# Formulario de Retiro de Fondos.

Fecha: {{$fecha->format('d M Y')}}<br>
La cuenta Nº {{$user->id}} ha requerido un retiro de fondos.

-   Nombre: {{$user->name}}
-   Correo: {{$user->email}}
-   ID: {{$user->idn}}
-   Tel: {{$user->phone}}
-   Direccion: {{$user->address.' '. $user->state.' '.$user->city.', '.$user->country}}
-   Monto: {{$data['amount']}}
-   Razon del retiro: {{$data['reason']}}
-   Beneficiario: {{$data['beneficiary']}}
-   Direccion" {{$data['direccion']}}
-   Banco: {{$data['bank']}}
-   Banco Intermediario: {{$data['bintermediario']}}
-   Dirección Banco: {{$data['bancoaddress']}}
-   Swift: {{$data['swift']}}
-   Cuenta Bancaria Nº: {{$data['acount']}}
-   Referancia: {{$data['referencia']}}
-   Firma: {{$data['firma']}}
- Dirección de IP: {{$data['nip']}}

@component('mail::button', ['url' => '/login'])
Ingrese al Administrador
@endcomponent

Mariana Campos,
CGO Markets Client Services<br>
Oceanía Business Plaza,<br>
Panama City, Panama.<br>
Tel: +507-8337762<br>
invest@cgomarkets.com<br>
{{ config('app.name') }}
@endcomponent
