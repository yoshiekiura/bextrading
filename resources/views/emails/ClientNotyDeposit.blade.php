@component('mail::message')
    #Nueva Deposito

    El cliente {{$user->name}} con la cuenta Nº {{$user->id}}
    se le agregó la siguiente transacción:

    - Nombre = {{$user->name}}
    - Email = {{$user->email}}
    - País = {{$user->country}}
    *****************************
    # Descripción de Depósito.
          Tipo | Cantidad
    {{$fields['descripcion']}}  |  {{$fields['total']}}

    Favor comunicarse con el cliente al teléfono {{$user->phone}}

    Gracias,
    Sistema Automático,
    {{ config('app.name') }}
@endcomponent
