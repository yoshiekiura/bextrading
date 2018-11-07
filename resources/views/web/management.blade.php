@extends('layouts.app')
@section('title')
      {{ __("Account management") }}
@endsection
@section('content')
<section class="my-breadcrumb">
 <div class="container page-banner">
  <div class="row">
   <div class="col-sm-12 col-md-12 col-xs-12">
    <h1>{{ __("Account management") }}</h1>
    <ol class="breadcrumb">
     <li><a href="index.html">{{ __("Home") }}</a></li>
     <li><a href="">{{ __("Services") }}</a></li>
     <li class="active">{{ __("Account management") }}</li>
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
                       <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent congue justo scelerisque mattis iaculis. Maecenas vestibulum faucibus enim scelerisque egestas. Praesent facilisis, tortor vel vehicula imperdiet, felis massa ultrices metus, sed consectetur massa ex vitae sem. Integer eu sodales augue. Suspendisse eget placerat lorem. Phasellus ac hendrerit leo. Morbi quis iaculis eros. Sed tincidunt augue ante, sit amet vehicula odio aliquam quis. Donec at malesuada nisl. Pellentesque eros lorem, aliquet id hendrerit id, hendrerit ac odio. In dui mauris, auctor vel vestibulum vitae, tincidunt id mi. </p>
                       <h2> Description Heading</h2>
                       <ul class="desc-points">
                        <li>
                         <i class="fa fa-caret-right "></i> Being a garment merchandiser, you should be capable of executing all related merchandising activities.
                       </li>
                       <li>
                         <i class="fa fa-caret-right "></i> You should be able to handle it with care and professionally.
                       </li>
                       <li>
                         <i class="fa fa-caret-right "></i> Part of the duties is to prepare the samples and the budget and both of them are for approval.
                       </li>
                       <li>
                         <i class="fa fa-caret-right "></i> Constant update and interaction with the supplies is needed.
                       </li>
                       <li>
                         <i class="fa fa-caret-right "></i> You should also make sure that the functions of all related processes are running smoothly.
                       </li>
                     </ul>
                     <p> Sed tincidunt augue ante, sit amet vehicula odio aliquam quis. Donec at malesuada nisl. Pellentesque eros lorem, aliquet id hendrerit id, hendrerit ac odio. In dui mauris, auctor vel vestibulum vitae, tincidunt id mi. </p>
                     <ul class="inner-images clearfix">
                      <li class="col-sm-6">
                       <a class="tt-lightbox" href="/pages/images/image8.jpg"><img alt="" src="/pages/images/image8.jpg" class="img-responsive"> </a>
                     </li>
                     <li class="col-sm-6">
                       <a class="tt-lightbox" href="/pages/images/image9.jpg"><img alt="" src="/pages/images/image9.jpg" class="img-responsive"> </a>
                     </li>
                   </ul>
                   <p>Curabitur dictum, sapien eu mattis pretium, ligula lorem sollicitudin mi, in gravida augue magna eu metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis a ultrices tortor. Sed rutrum arcu mi, nec aliquet magna venenatis non. Nullam lectus neque, semper nec accumsan quis, ullamcorper eget risus. Nullam tristique mi nec dui bibendum egestas. Integer libero diam, dictum id faucibus id, lacinia eget lorem. Ut condimentum, lorem at eleifend pharetra, urna turpis ultrices nunc, sit amet suscipit nisl metus sit amet elit. Nam tristique mollis molestie. Maecenas bibendum rhoncus nisi, sit amet blandit tortor placerat nec. Sed nec aliquam tortor, ut vehicula eros. Vestibulum id ligula vel nunc mattis pharetra in non lectus. Etiam quis blandit ante. Donec non hendrerit justo, rhoncus iaculis sem. In varius finibus eros quis dictum tortor eu metus.</p>
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
