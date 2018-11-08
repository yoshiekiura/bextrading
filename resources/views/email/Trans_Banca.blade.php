@component('mail::message')
# Wire Instructions

## {{$user->name}},<br>
Attached you'll find the instructions to fund your account.

Banco Intermediario:<br>
Bank of New York Mellon<br>
Dirección: xxxxxxxxxxxx<br>
Aba: xxxxxxxxxxxx(Solo si es requerido)<br>
Swift: xxxxxxxxxxxx<br>

=====================================<br>

Banco Beneficiario:<br>
Banco de Costa Rica, S.A.<br>
Ubicación: San José, Costa Rica.<br>
Swift: xxxxxxx<br>
Cuenta dentro del Banco intermediario: xxxxxxx<br>

====================================<br>

<br> Beneficiario final:<br>
Número de cuenta: xxxxxxx<br>
Nombre:xxxxxxxxxxx<br>
Cédula Jurídica:3-xxxxxxxxxx<br>
IBAN: xxxxxxxxxxx (Solo si es requerido)*<br>
Ubicación: San José, Costa Rica.<br>
===================================<br>

Dirección:somewhere around the rainbow 1000. Teléfono:(506) 0000000
===================================<br>

Dirección: somewhere around the rainbow, San José, Costa Rica. 1000. Teléfono: (506)
0000000.<br>

@component('mail::button', ['url' => url( '/login')])
Ingresar
@endcomponent

Cordialmente,<br>
{{ config('app.name') }} Client Services<br>
Oceanía Business Plaza,<br>
Panama City, Panama.<br>
Tel: +507-8337762<br>
E:mail: invest@cgomarkets.com<br>
{{ config('app.name') }}
@endcomponent