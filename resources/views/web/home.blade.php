@extends('layouts.app')

@section('content')

     <!-- HOME SLIDER -->
   @include('partials.slider')

<!-- HOME SECTION -->
{{-- <section class="main-section-2">
   <div class="container">
      <div class="row">
         <div class="col-md-7 col-sm-10 col-xs-12">
            <div class="main-section-detail">
               <h1>Asesoria en Inversiones</h1>
               <h3>soluciones  a su alcance</h3>
               <p>Nos gusta trabajar estrategias que le brindan soluciones a su alcance para tomar oportunidades de inversión</p>
               <a href="" class="btn btn-white"> leer más</a>
            </div>
         </div>
      </div>
   </div>
</section> --}}
{{-- <section id="about-2" class="">
   <div class="container">
      <div class="row">
         <div class="col-md-7 col-sm-12 col-xs-12 col-md-offset-3">
            <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
               <div class="heading-2">
                  <h3> Soluciones Inteligentes</h3>
                  <h2>Planes Financieros</h2>
               </div>
            </div>
            <p class="marginbottom30"> We are on a mission to build, grow and maintain loyal communities  at every touchpoint. This means you can accomplish your business goals through digital marketing.</p>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12">
            <img src="/pages/images/front.jpg" class="img-responsive center-block" alt="" />
         </div>
      </div>
   </div>
</section> --}}
<section id="features" class="light-blue">
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="heading-2">
               <h3> ¿Poqué nosotros?</h3>
               <h2>¿porque nos prefieren nuestros clientes?</h2>
               <p>El éxito de nuestra compañía yace en la preferencia y lealtad de nuestros clientes. Nos preocupamos por ser un complemento en sus inversiones con asesoría de última generación. </p>
            </div>
            <div class="feature-icon-box">
               <i class="ti-target"></i>
               <p>Marcamos la meta complementaria para cada cliente. </p>
            </div>
            <div class="feature-icon-box">
               <i class="ti-headphone-alt"></i>
               <p>Alta customizacion para nuestros clientes</p>
            </div>
            <div class="feature-icon-box">
               <i class="ti-mobile"></i>
               <p>Sistema de Negociación.</p>
            </div>
            <div class="feature-icon-box">
               <i class="ti-money"></i>
               <p>Tenemos lo que busca en su presupuesto</p>
            </div>
         </div>
         <div class="col-md-6 col-sm-12 col-xs-12">
            <ul class="accordion">
               <li>
                  <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> ¿Cómo complementamos su inversión?</a></h3>
                  <div class="accordion-content">
                     <p>Con la visión de mejorar las características de cada portafolio, buscamos los mejores nichos que el mercado nos pueda ofrecer para interactuar, brindádole una mejor asesoría basada</p>
                  </div>
               </li>
               <li>
                  <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> ¿Cómo funciona nuestra plataforma?</a></h3>
                  <div class="accordion-content">
                     <p>Diseñada para nuestros clientes mejorando el entendimiento de su portafolio de inversión.</p>
                  </div>
               </li>
               <li>
                  <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> ¿Cómo aperturo una cuenta?</a></h3>
                  <div class="accordion-content">
                     <p>Aperturar una cuenta es fácil, solo debe llenar el formulario en línea con sus datos y presupuesto para invertir. Inmediatamente recibirá los accesos de su portafolio para iniciar su inversión.</p>
                  </div>
               </li>
               <li>
                  <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> ¿Qué tipos de cuenta se trabajan?</a></h3>
                  <div class="accordion-content">
                     <p>Se trabajan cuentas individuales y corporativas, nuestra visión siempre es ofrecer el mejor servicio a nuestros clientes.</p>
                  </div>
               </li>
               <li>
                  <h3 class="accordion-title"><a href="#"> <i class="ti-align-left"></i> ¿Qué debo hacer para obtener una asesoría?</a></h3>
                  <div class="accordion-content">
                     <p>Nuestras asesorías son gratuitas, y se enfocan en sus metas financieras. Para obtener una de nuestras asesorías solo debe llenar el formulario de obtener asesoría.</p>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</section>
<section class="call-to-action-section">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
            <div class="call-to-action-detail-section">
               <div class="heading-2">
                  <h3> Oferta limitada</h3>
                  <h2>Obten una asesoria profesional y gratuita</h2>
               </div>
               <p> Invertir en los mercados no debe ser algo dificil de entender. </p>
               <ul>
                  <li> <i class="fa fa-check"></i> Portafolio Individual</li>
                  <li>  <i class="fa fa-check"></i> Portafolio Corporativo</li>
                  <li>  <i class="fa fa-check"></i> Gestion de Portafolio</li>
               </ul>
               <a href="{{ route('requestcall') }}" class="btn-custom btn">Pedir Asesoría <i class="fa fa-angle-right"></i></a>
            </div>
         </div>
         <div class="col-md-6 col-sm-6 col-xs-12 nopadding hidden-sm">
            <div class="call-to-action-img-section-right">
               <img src="/pages/images/bursatil.jpg" class="img-responsive" alt="">
            </div>
         </div>
      </div>
   </div>
</section>

{{-- <section id="services" class="light-blue">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12 heading">
            <span class="heading-letter-style">Services</span>
            <div class="main-heading-container">
               <h1>Our Services</h1>
               <h3>find out the tactics we use</h3>
               <p>The Invest is powerful, beautiful, and fully responsive WordPress Theme with multiple options</p>
            </div>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
            <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
               <div class="services-box">
                  <div class="iconbox">
                     <i class="ti-lock"></i>
                     <div class="iconbox-meta">
                        <h4><a href="">No Security Risk</a></h4>
                        <p>With our awesome domain template features, you can get your own website with modern look and feel with tons of extensions.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
               <div class="services-box">
                  <div class="iconbox">
                     <i class="ti-settings"></i>
                     <div class="iconbox-meta">
                        <h4><a href="">Financial Planing</a></h4>
                        <p>With our awesome domain template features, you can get your own website with modern look and feel with tons of extensions.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
               <div class="services-box">
                  <div class="iconbox">
                     <i class="ti-face-smile"></i>
                     <div class="iconbox-meta">
                        <h4><a href="">99% Approved</a></h4>
                        <p>With our awesome domain template features, you can get your own website with modern look and feel with tons of extensions.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
               <div class="services-box">
                  <div class="iconbox">
                     <i class="ti-align-left"></i>
                     <div class="iconbox-meta">
                        <h4><a href="">Unlimited Visits</a></h4>
                        <p>With our awesome domain template features, you can get your own website with modern look and feel with tons of extensions.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
               <div class="services-box">
                  <div class="iconbox">
                     <i class="ti-agenda"></i>
                     <div class="iconbox-meta">
                        <h4><a href="">Accounting and Finance</a></h4>
                        <p>With our awesome domain template features, you can get your own website with modern look and feel with tons of extensions.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
               <div class="services-box">
                  <div class="iconbox">
                     <i class="ti-headphone"></i>
                     <div class="iconbox-meta">
                        <h4><a href="">Awesome Support</a></h4>
                        <p>With our awesome domain template features, you can get your own website with modern look and feel with tons of extensions.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
               <div class="services-box">
                  <div class="iconbox">
                     <i class="ti-timer"></i>
                     <div class="iconbox-meta">
                        <h4><a href="">Always Available</a></h4>
                        <p>With our awesome domain template features, you can get your own website with modern look and feel with tons of extensions.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
               <div class="services-box">
                  <div class="iconbox">
                     <i class="ti-harddrives"></i>
                     <div class="iconbox-meta">
                        <h4><a href="">Tax Planing</a></h4>
                        <p>With our awesome domain template features, you can get your own website with modern look and feel with tons of extensions.</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12 nopadding">
               <div class="services-box">
                  <div class="iconbox">
                     <i class="ti-credit-card"></i>
                     <div class="iconbox-meta">
                        <h4><a href="">100% Credit Support</a></h4>
                        <p>With our awesome domain template features, you can get your own website with modern look and feel with tons of extensions.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="project-container">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12 heading">
            <span class="heading-letter-style">Professional Work</span>
            <div class="main-heading-container">
               <h3>Some Of Our</h3>
               <h1>Featured Projects</h1>
               <p>The Invest is powerful, beautiful, and fully responsive WordPress Theme with multiple options</p>
            </div>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/1.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info fadeInUpBig">
                        <h3><a href="">Financial reporting with MAO Ltd.</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/2.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">FInance Company Ranked Top in Google</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/3.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">History Management</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/4.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">Reporting and consultacy in Every field</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/5.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">Multipurpose Fully Documneted Web Projects</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/6.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">Easy and Super Optimized in WordPress</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/7.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">Professional Study Matrials and Design Projects</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/8.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">Signed Project with Google</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/9.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">Faisal Bank Ltd. Rank</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/10.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">Signed Project with Facebook</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/1.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">Signed Project with Facebook</a></h3>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12 nopadding">
               <div class="recent-project">
                  <a href=""><img src="/pages/images/casestudies/2.jpg" alt=""></a>
                  <div class="project-overlay">
                     <div class="project-info">
                        <h3><a href="">Signed Project with Facebook</a></h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="testimoniial-section light-blue">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12 heading">
            <span class="heading-letter-style">Clients Reviews</span>
            <div class="main-heading-container">
               <h3>Why Clients Love Us</h3>
               <h1>Success Stories</h1>
               <p>The Invest is powerful, beautiful, and fully responsive WordPress Theme with multiple options</p>
            </div>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
            <div class="owl-testimonial-2 owl-testimonial-style-1">
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Just fabulous</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/1.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Jhon Emily Copper </h3>
                        <p> Developer</p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Awesome ! Loving It</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/2.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Hania Sheikh </h3>
                        <p> CEO Pvt. Inc.</p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Very quick and Fast</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/3.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Jaccica Albana </h3>
                        <p>  CTO Albana Inc.</p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Done in 3 Months! Awesome</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/4.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Humayun Sarfraz </h3>
                        <p>  CTO Glixen Technologies.</p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Find It Quit Professional</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/4.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Massica O'Brain </h3>
                        <p> Audit Officer </p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Just fabulous</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/1.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Jhon Emily Copper </h3>
                        <p> Developer</p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Awesome ! Loving It</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/2.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Hania Sheikh </h3>
                        <p> CEO Pvt. Inc.</p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Very quick and Fast</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/3.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Jaccica Albana </h3>
                        <p>  CTO Albana Inc.</p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Done in 3 Months! Awesome</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/4.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Humayun Sarfraz </h3>
                        <p>  CTO Glixen Tech.</p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
               <div class="single_testimonial">
                  <div class="textimonial-content">
                     <h4>Find It Quit Professional</h4>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
                  </div>
                  <div class="testimonial-meta-box">
                     <img src="/pages/images/users/4.jpg" alt="">
                     <div class="testimonial-meta">
                        <h3 class="">Massica O'Brain </h3>
                        <p> Audit Officer </p>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="pricing-section">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12 heading">
            <span class="heading-letter-style">Priceing Plans</span>
            <div class="main-heading-container">
               <h1>Price Packages</h1>
               <h3>Some Afforable Services Packages</h3>
               <p>The Invest is powerful, beautiful, and fully responsive WordPress Theme with multiple options</p>
            </div>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
            <div class="col-md-4 col-sm-6 col-xs-12">
               <div class="pricing-table-small">
                  <div class="pricing-table-small-title">
                     <h1>Basic</h1>
                     <p>Counciling Plan</p>
                     <i class="fa fa-money"></i>
                  </div>
                  <div class="pricing-table-small-content">
                     <h1 class="pts-price">$350 <small>/per month</small></h1>
                     <div class="features_left">
                        <ul>
                           <li> <i class="fa fa-check"></i> 1-5 People Company size </li>
                           <li> <i class="fa fa-check"></i> 3 month Insurance Coverage </li>
                           <li class="cut"> <i class="fa fa-times"></i> Phone Support </li>
                           <li class="cut"> <i class="fa fa-times"></i> Free Instalation </li>
                        </ul>
                     </div>
                  </div>
                  <div class="pricing-table-small-button">
                     <a href="#" class="btn btn-custom"><span> Choose</span><i class="fa fa-angle-right"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
               <div class="pricing-table-small best-offer">
                  <div class="pricing-table-small-title">
                     <h5>Best Offer</h5>
                     <h1>Standard</h1>
                     <p>Business plane</p>
                     <i class="fa fa-money"></i>
                  </div>
                  <div class="pricing-table-small-content">
                     <h1 class="pts-price">$850 <small>/per month</small></h1>
                     <div class="features_left">
                        <ul>
                           <li> <i class="fa fa-check"></i> 1-15 People Company size </li>
                           <li> <i class="fa fa-check"></i> 1 Year Insurance Coverage </li>
                           <li> <i class="fa fa-check"></i> 1 Year Phone Support </li>
                           <li> <i class="fa fa-check"></i> Free Instalation </li>
                        </ul>
                     </div>
                  </div>
                  <div class="pricing-table-small-button">
                     <a href="#" class="btn btn-custom"><span> choose</span><i class="fa fa-angle-right"></i></a>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
               <div class="pricing-table-small">
                  <div class="pricing-table-small-title">
                     <h1>Ultimate</h1>
                     <p>Gold Plan</p>
                     <i class="fa fa-money"></i>
                  </div>
                  <div class="pricing-table-small-content">
                     <h1 class="pts-price">$500 <small>/per month</small></h1>
                     <div class="features_left">
                        <ul>
                           <li> <i class="fa fa-check"></i> 1-9 People Company size </li>
                           <li> <i class="fa fa-check"></i> 6 month Insurance Coverage </li>
                           <li> <i class="fa fa-check"></i> 6 month Phone Support </li>
                           <li class="cut"> <i class="fa fa-times"></i> Free Councelling </li>
                        </ul>
                     </div>
                  </div>
                  <div class="pricing-table-small-button">
                     <a href="#" class="btn btn-custom"><span> Choose</span><i class="fa fa-angle-right"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="blog-posts light-blue">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12 heading">
            <span class="heading-letter-style">Latest News</span>
            <div class="main-heading-container">
               <h1>Blog Posts</h1>
               <h3>Articles that worth reading</h3>
               <p>The Invest is powerful, beautiful, and fully responsive WordPress Theme with multiple options</p>
            </div>
         </div>
         <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-post">
               <div class="post-img">
                  <a href="#"> <img src="/pages/images/blog/10.jpg" alt="" class="img-responsive"> </a>
               </div>
               <div class="blog-detail">
                  <h3 class="post-title"> <a href="#">Business ideas are worth to here and pays to more</a> </h3>
               </div>
               <div class="blog-meta">
                  <span class="pull-left"><a href=""><i class="ti-comments"></i>14 Comments</a></span>
                  <span class="pull-right"> <a href="" ><i class="ti-calendar"></i>09 Jan, 2017</a></span>
               </div>
            </div>
         </div>
         <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-post">
               <div class="post-img">
                  <a href="#"> <img src="/pages/images/blog/11.jpg" alt="" class="img-responsive"> </a>
               </div>
               <div class="blog-detail">
                  <h3 class="post-title"> <a href="#"> Successfull meating that satisfies customers....</a> </h3>
               </div>
               <div class="blog-meta">
                  <span class="pull-left"><a href=""><i class="ti-comments"></i>40 Comments</a></span>
                  <span class="pull-right"> <a href="" ><i class="ti-calendar"></i>04 April, 2017</a></span>
               </div>
            </div>
         </div>
         <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="blog-post">
               <div class="post-img">
                  <a href="#"> <img src="/pages/images/blog/12.jpg" alt="" class="img-responsive"> </a>
               </div>
               <div class="blog-detail">
                  <h3 class="post-title"> <a href="#"> Stock exchange, Euro is goint to be the best currency ever</a> </h3>
               </div>
               <div class="blog-meta">
                  <span class="pull-left"><a href=""><i class="ti-comments"></i>224 Comments</a></span>
                  <span class="pull-right"> <a href="" ><i class="ti-calendar"></i>25 Sep, 2017</a></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section> --}}

@include('partials.actcall')

@endsection

