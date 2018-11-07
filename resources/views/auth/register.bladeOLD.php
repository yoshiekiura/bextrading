@extends('layouts.reg')
@section('title')
      {{ __("Open an account") }}
@endsection
@push('styles')
<link rel="stylesheet" href="/wizard/css/style.css">
<style>
  body {
    background-image: url("/pages/images/front.jpg"), url("slider7.jpg");
    background-repeat: repeat;
    background-color: #cccccc;
}
</style>
@endpush

@section('content')
<!-- Top content -->
<div class="top-content">
  <div class="container">

    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 form-box">
        <form role="form" action="{{ url('register') }}" method="post" class="f1">
          {{ csrf_field()  }}
          <h3>{{ __("Open an account") }}</h3>
          <p>{{ __("Fill in the form to get instant access") }}</p>
          <div class="f1-steps">
            <div class="f1-progress">
              <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3"
              style="width: 16.66%;"></div>
            </div>
            <div class="f1-step active">
              <div class="f1-step-icon"><i class="fa fa-user"></i></div>
              <p>{{ __("Contact Information") }}</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-bank"></i></div>
              <p>{{ __("Financial Information") }}</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-key"></i></div>
              <p>{{ __("Create an Account") }}</p>
            </div>
          </div>

          <h3>We are under maintenance upgrading our database system. Form will be display within 24Hrs.</h3>



</form>
</div>
</div>

</div>
</div>
@push('scripts')
<script src="/wizard/js/jquery-1.11.1.min.js"></script>
<script src="/wizard/bootstrap/js/bootstrap.min.js"></script>
<script src="/wizard/js/jquery.backstretch.min.js"></script>
<script src="/wizard/js/retina-1.1.0.min.js"></script>
<script src="/wizard/js/scripts.js"></script>
@endpush
@endsection