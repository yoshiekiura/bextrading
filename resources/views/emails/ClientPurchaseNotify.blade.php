@component('mail::message')
#Nueva Compra

El cliente {{$user->name}} con la cuenta Nº {{$user->id}}
ha solicitado una compra con la siguiente descripción:

- Nombre = {{$user->name}}
- Email = {{$user->email}}
- País = {{$user->country}}
*****************************
# Descripción de compra.
Cantidad  |  Tipo  |  Producto <br>
{{$fields['cantidad']}}  |  {{$fields['tipo']}}  |  {{$fields['producto']}}

Favor comunicarse con el cliente al teléfono {{$user->phone}} y ratificar
el strike price y más.

@component('mail::button', ['url' => '/login'])
Ingresar
@endcomponent

Gracias,<br>
Sistema Automático,<br>
{{ config('app.name') }}
@endcomponent
