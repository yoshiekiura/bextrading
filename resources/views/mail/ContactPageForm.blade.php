@component('mail::message')
# Contacto desde Página Web

Nombre: {{$data['name']}}<br>
Email: {{$data['email']}}<br>
Mensaje: {{$data['mensaje']}}<br>

@component('mail::button', ['url' => '/'])
Ir a mi WebSite
@endcomponent

Berlinger Client Services<br>
Borsenstrasse 8002 Zürich<br>
Panama City, Panama.<br>
Tel: +507-8337762<br>
invest@cgomarkets.com<br>
{{ config('app.name') }}
@endcomponent
