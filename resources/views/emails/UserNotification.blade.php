@component('mail::message')
# Estimado(a) {{$user->name}}

Esto es el sistema automático para informarle que hemos recibido su mensaje.
Estamos notificando a su asesor de cuenta, para que le contacte lo antes posible. En nuestros
registros tenemos su correo electrónico como {{$user->email}} y su teléfono de contacto
como {{$user->phone}} .

Cualquier discrepancia háganoslo saber al correo clients@mycgo.net


@component('mail::button', ['url' => '/login'])
Ingrese a su Cuenta
@endcomponent

Saludos,<br>
Servicio al Cliente,<br>
{{ config('app.name') }}
@endcomponent
