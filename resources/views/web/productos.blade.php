@extends('layouts.app')

@section('title')
      Productos de Inversión.
@endsection

@section('content')
         <!-- BREAADCRUMB SECTION -->
      <section class="my-breadcrumb">
         <div class="container page-banner">
            <div class="row">
               <div class="col-sm-12 col-md-12 col-xs-12">
                  <h1>Productos de Inversión.</h1>
                  <ol class="breadcrumb">
                     <li><a href=" {{ route('home') }}">Inicio</a></li>
                     <li><a href="{{ route('productos') }}">productos</a></li>
                     <li class="active">Productos de Inversión.</li>
                  </ol>
               </div>
            </div>
         </div>
      </section>

      <section class="">
         <div class="container">
            <div class="row">
               <div class="col-md-5 col-sm-6 hidden-sm">
                  <img src="/pages/images/trading.jpg" class="img-responsive" alt="">
               </div>
               <div class="col-md-7 col-sm-12 col-xs-12">
                  <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
                     <div class="heading-2">
                        <h3> Tecnología y experiencia</h3>
                        <h2>Una combinación extraordinaria </h2>
                     </div>
                  </div>
                  <p align="justify"> Creemos que la tecnología y los mercados forman parte de la vida de todos. Hoy, la conectividad no sólo sirve para relacionarnos, es esencial para nuestra vida personal y laboral. Nuestro papel es facilitarte el disfrute de la conexión a los vehículos de inversión que te permiten especular en los mercados financieros, dándote el control de tus finanzas en el mundo digital. Queremos ser tu broker de preferencia para negociar Opciones, un broker para las personas, un broker para tu vida.</p>
                  <p class="marginbottom30"> Creemos en la atención humana y nos interesamos por conocer a nuestros clientes, y entender la mejor manera de poder llegar a sus objetivos, en pos de un trading más efectivo.</p>

                  <a href="{{ route('requestcall') }}" class="btn btn-custom">Pedir asesoría</a>
               </div>
            </div>
         </div>
      </section>

      @include('web.partials.actcall')
@endsection
