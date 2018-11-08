@component('mail::message')
# ¡ Great  {{$user->name}} !

Su cuenta  ha sido creada exitósamente! Su número de cuenta es la **{{$user->id}}** .
Para ingresar a su cuenta, digite la dirección http://bextrading.test luego, ingrese
su correo **{{ $user->email }}** y la contraseña creada por usted en el proceso de registro

@component('mail::button', ['url' => url( '/login')])
        Login
@endcomponent

**Su primer trade**
El proceso para poner sus trades es muy sencillo. Si su cuenta es autogestionada simplemente
llene el tiquete en línea, pero si cuenta con un ejecutivo de cuenta, su broker le asistirá
durante todo el proceso.

**Ideas para Trades**
BexTrading ofrece ideas frescas de inversión todas las semanas.

En su correo electrónico usted recibirá análisis de los sectores más calientes del mercado, para que pueda tomar decisiones de inversión y beneficiarse de lo que está sucediendo en los mercados financieros internacionales.

Hemos diseñado el sitio web de CGO para que sea simple de utilizar, pero además brindamos otros servicios de acompañamiento que no encontrará en otras compañías.

Nosotros creemos que usted disfrutará todo lo que nuestro sitio web y personal de servicio tiene para ofrecerle. Nuestro Call Center de Atención al Cliente está listo y dispuesto a asistirle en caso de que usted tenga alguna pregunta específica. Si usted busca una respuesta rápida, nuestra sección de preguntas frecuentes puede ayudarle con lo que usted necesita.

De nuevo, le damos la bienvenida a BexTrading y estamos deseosos de servirle en su cuenta la nueva forma de negociar opciones.

Estamos con la mayor disposición de asesorarle. Nuestro representantes se comunicará para mostrarle todos los funcionamientos de su cuenta y poder asistirle.

Cordialmente,<br>
BexTrading Client Services<br>
Oceanía someThing,<br>
Panama City, Panama.<br>
Tel: +507-8888888<br>
invest@bextrading.com<br>
{{ config('app.name') }}
@endcomponent
