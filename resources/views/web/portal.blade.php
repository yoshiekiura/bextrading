@extends('layouts.app')
@section('content')
<section class="my-breadcrumb">
   <div class="container page-banner">
    <div class="row">
     <div class="col-sm-12 col-md-12 col-xs-12">
      <h1>{{ __("Client portal") }}</h1>
      <ol class="breadcrumb">
       <li><a href="{{ route('home') }}">{{ __("Home") }}</a></li>
       <li><a href="">{{ __("Services") }}</a></li>
       <li class="active">{{ __("Client portal") }}</li>
   </ol>
</div>
</div>
</div>
</section>
<section class="services-detail">
   <div class="container">
    <div class="row">
     <div class="col-md-12 col-xs-12 col-sm-12 nopadding">
      <div class="col-md-9 col-sm-12 col-md-push-3 col-xs-12">
       <div id="post-slider" class="owl-carousel owl-theme margin-bottom-30">
        <div class="item">
         <a class="tt-lightbox" href="/pages/images/image1.jpg"><img class="img-responsive" src="/pages/images/image1.jpg" alt=""></a>
     </div>
     <div class="item">
         <a class="tt-lightbox" href="/pages/images/image7.jpg"><img class="img-responsive" src="/pages/images/image7.jpg" alt=""></a>
     </div>
                       {{--  <div class="item">
                           <a class="tt-lightbox" href="/pages/images/image8.jpg"><img class="img-responsive" src="/pages/images/image8.jpg" alt=""></a>
                       </div> --}}
                       {{--  <div class="item">
                           <a class="tt-lightbox" href="/pages/images/image9.jpg"><img class="img-responsive" src="/pages/images/image9.jpg" alt=""></a>
                       </div> --}}
                       <div class="item">
                         <a class="tt-lightbox" href="/pages/images/image13.jpg"><img class="img-responsive" src="/pages/images/image13.jpg" alt=""></a>
                     </div>

                 </div>
                 <p>Your main-stop to place trades, see account balances, metrics, funding, reporting, and more. When you are a client you have control of your investment, we provide you the relevant strategy you deserve to wealth capital. </p>
                 <h2>{{ __("Client Portal") }}</h2>
                 <ul class="desc-points">
                    <li>
                     <i class="fa fa-caret-right "></i> {{ __("Place trades on the hottest markets based on seasonality.") }}
                 </li>
                 <li>
                     <i class="fa fa-caret-right "></i>{{ __("You will have an advisor to place the right strategy in your investment.") }}
                 </li>
                 <li>
                     <i class="fa fa-caret-right "></i>{{ __("Constant update on the markets and opportunities") }}
                 </li>
                 <li>
                     <i class="fa fa-caret-right "></i>{{ __("Summary graphics that shows current activity.") }}
                 </li>
                 <li>
                     <i class="fa fa-caret-right "></i> {{ __("Easy to use and understand.") }}
                 </li>
             </ul>

             <ul class="inner-images clearfix">
                <li class="col-sm-6">
                 <a class="tt-lightbox" href="/pages/images/image8.jpg"><img alt="" src="/pages/images/image8.jpg" class="img-responsive"> </a>
             </li>
             <li class="col-sm-6">
                 <a class="tt-lightbox" href="/pages/images/image9.jpg"><img alt="" src="/pages/images/image9.jpg" class="img-responsive"> </a>
             </li>
         </ul>
     </div>
     <div class="col-md-3 col-md-pull-9 col-sm-12 col-xs-12" id="side-bar">
       <div class="side-bar-services">
        @include('web.partials.featuremenu')
     <h3>{{ __("Brochures") }}</h3>
     <ul class="broch">
         <li><a href=""><img src="/pages/images/funfact/pdf.png" alt=""> {{ __("Download.pdf") }} <i class="ti-download"></i></a></li>
         <li><a href=""><img src="/pages/images/funfact/doc.png" alt=""> {{ __("Download.docx") }} <i class="ti-download"></i></a></li>
     </ul>
 </div>
</div>
</div>
</div>
</div>
</section>
@endsection
