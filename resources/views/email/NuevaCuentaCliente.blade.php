@component('mail::message')
# Administrador

Fecha: {{$user->created_at->format('d M Y')}}<br>
La cuenta Nº {{$user->id}} fue creada por {{$user->name}}.<br>
-   Referido por: {{$user->agente}}<br>

##Miembros Corporativos<br>
Authmember: {{$user->authmember}}<br>
Authmember2: {{$user->authmember2}}<br>
Authmember3: {{$user->authmember3}}<br>
Authmember4: {{$user->authmember4}}<br>
Authmember5: {{$user->authmember5}}<br>

## Datos Personales

-  Tipo de Cuenta: {{$user->tipocuenta}}<br>
-   Nombre: {{$user->name}}
-   Estado Civil: {{$user->civil}}
-   Ocupación: {{$user->ocupacion}}
-   Correo: {{$user->email}}
-   Nacionalidad: {{$user->nacionalidad}}
-   ID: {{$user->idn}}
-   Tel: {{$user->phone}}
-   Movil {{$user->mobile}}
-   Dirección: {{$user->address.' '. $user->state.' '.$user->city.', '.$user->country}}
-   Residente de USA: {{$user->residente}}

## Datos Financieros
-   Objetivo: {{$user->objetivo}}
-   Inversión inicial de:{{ $user->amount }}USD
-   Capital adicional de inversión: {{$user->capitaladi}}
-   Esta inversión representa el {{$user->cant_ahorros}} de sus ahorros.
-   Origen de Fondos: {{$user->origen_fondos}}
-   Ingreso Anual: {{$user->annual}}
-   Patrimonio estimado: {{$user->patrimonio }}
-   Beneficiario: {{$user->beneficiary}}
-   Banco: {{$user->bank}}


@component('mail::button', ['url' => route('usuarios')])
Ingresar al Sistema
@endcomponent

Gracias,<br>
Sistema Automático<br>
{{ config('app.name') }}
@endcomponent
