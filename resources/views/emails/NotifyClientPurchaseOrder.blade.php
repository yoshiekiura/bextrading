@component('mail::message')
# Estimado(a) {{$user->name}}

Hemos recibido su transacción de compra. El sistema automático está
notificando a su asesor de cuenta, para los detalles del proceso. Nuestros
registros muestran su información de contacto:

-Correo electrónico: {{$user->email}}
-Teléfono: {{$user->phone}}

Cualquier dato de contacto personal que desee cambiar puede hacerlo
en el área de "Settings - Configuración - editar de perfil".

@component('mail::button', ['url' => '/login'])
Ingrese a su Cuenta
@endcomponent

Saludos,<br>
Servicio al Cliente,<br>
{{ config('app.name') }}
@endcomponent
