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

          <fieldset>
            <h4>{{ __("Know your client:") }}</h4>

            <div class="form-group"{{$errors->has('firstname') ? 'has-error' : ' '}}>
              <label class="sr-only" for="f1-first-name">{{ __("First Name") }}</label>
              <div class="input-group">
               <span class="input-group-addon"><i class="fa fa-user"></i></span>
               <input type="text" name="firstname" placeholder="{{ __("First Name") }}"
               class="f1-first-name form-control" id="f1-first-name">
               @if ($errors->has('firstname'))
               <span style="color: red" class="help-block">
                <strong>{{ $errors->first('firstname') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group"{{$errors->has('lastname') ? 'has-error' : ' '}}>
            <label class="sr-only" for="lastname">{{ __("Last name") }}</label>
            <div class="input-group">
             <span class="input-group-addon"><i class="fa fa-user"></i></span>
             <input type="text" name="lastname" placeholder="{{ __("Last name") }}"
             class="f1-last-name form-control" id="f1-last-name">
             @if ($errors->has('lastname'))
             <span style="color: red" class="help-block">
              <strong>{{ $errors->first('lastname') }}</strong>
            </span> @endif
          </div>
        </div>

        <div class="form-group"{{$errors->has('nationality') ? 'has-error' : ' '}}>
          <label class="sr-only" for="nationality">{{ __("Nationality") }}</label>
          <div class="input-group">
           <span class="input-group-addon"><i class="fa fa-globe"></i></span>
           <input type="text" name="nationality" placeholder="{{ __("Nationality") }}"
           class="f1-nationality form-control" id="f1-nationality">
           @if ($errors->has('nationality'))
           <span style="color: red" class="help-block">
            <strong>{{ $errors->first('nationality') }}</strong>
          </span> @endif
        </div>
      </div>

      <div class="form-group"{{$errors->has('idn') ? 'has-error' : ' '}}>
        <label class="sr-only" for="idn">{{ __("ID Number") }}</label>
        <div class="input-group">
         <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
         <input type="text" name="idn" placeholder="{{ __("ID Number") }}"
         class="f1-last-name form-control" id="f1-idn">
         @if ($errors->has('idn'))
         <span style="color: red" class="help-block">
          <strong>{{ $errors->first('idn') }}</strong>
        </span> @endif
      </div>
    </div>

    <div class="form-group"{{$errors->has('phone') ? 'has-error' : ' '}}>
      <label class="sr-only" for="phone">{{ __("Telephone") }}</label>
      <div class="input-group">
       <span class="input-group-addon"><i class="fa fa-phone"></i></span>
       <input type="text" name="phone" placeholder="{{ __("Telephone") }}"
       class="f1-last-name form-control" id="f1-phone">
       @if ($errors->has('phone'))
       <span style="color: red" class="help-block">
        <strong>{{ $errors->first('phone') }}</strong>
      </span> @endif
    </div>
  </div>

  <div class="form-group"{{$errors->has('mobile') ? 'has-error' : ' '}}>
    <label class="sr-only" for="mobile">{{ __("Mobile") }}</label>
    <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-phone"></i></span>
     <input type="text" name="mobile" placeholder="{{ __("Mobile") }}"
     class="f1-mobile form-control" id="f1-mobile">
     @if ($errors->has('mobile'))
     <span style="color: red" class="help-block">
      <strong>{{ $errors->first('mobile') }}</strong>
    </span>
    @endif
  </div>
</div>

<div class="form-group"{{$errors->has('civil') ? 'has-error' : ' '}}>
  <label class="sr-only" for="civil">{{ __('Marital status') }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-book"></i></span>

   <select required aria-required="true" name="civil" class="form-control" >
    <option value="0">{{ __('Marital status') }}</option>
    <option value="Married" @if (old('civil') == "Married" ) {{ 'selected' }} @endif>
      {{ __('Married') }}
    </option>
    <option value="Divorce" @if (old('civil')=="Divorce" ) {{ 'selected' }} @endif>
     {{ __('Divorce') }}
   </option>
   <option value="Single" @if (old('civil')=="Single" ) {{ 'selected' }} @endif>
    {{ __('Single') }}
  </option>
  <option value="Widower" @if (old('civil')=="Widower" ) {{ 'selected' }} @endif>
    {{ __('Widower') }}
  </option>
  <option value="{{ __('Widow') }}" @if (old('civil')=="{{ __('Widow') }}" ) {{ 'selected' }} @endif>
    {{ __('Widow') }}
  </option>
</select>

@if ($errors->has('civil'))
<span style="color: red" class="help-block">
  <strong>{{ $errors->first('civil') }}</strong>
</span> @endif
</div>
</div>

<div class="form-group"{{$errors->has('country') ? 'has-error' : ' '}}>
  <label class="sr-only" for="country">{{ __('Country') }}</label>
  @include('web.partials.country')
</div>

<div class="form-group"{{$errors->has('address') ? 'has-error' : ' '}}>
  <label class="sr-only" for="address">{{ __("Residential Address") }}</label>
  <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
     <input type="text" name="address" placeholder="{{ __("Residential Address") }}"
     class="f1-address form-control" id="f1-address">
     @if ($errors->has('address'))
     <span style="color: red" class="help-block">
      <strong>{{ $errors->first('address') }}</strong>
    </span>
    @endif
</div>
</div>

<div class="form-group"{{$errors->has('city') ? 'has-error' : ' '}}>
  <label class="sr-only" for="city">{{ __("City") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
   <input type="text" name="city" placeholder="{{ __("City") }}"
   class="f1-city form-control" id="f1-city">
   @if ($errors->has('city'))
   <span style="color: red" class="help-block">
    <strong>{{ $errors->first('city') }}</strong>
  </span> @endif
</div>
</div>

<div class="form-group"{{$errors->has('zip') ? 'has-error' : ' '}}>
  <label class="sr-only" for="zip">{{ __("Zip Code") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
   <input type="text" name="zip" placeholder="{{ __("Zip Code") }}"
   class="f1-zip form-control" id="f1-zip">
   @if ($errors->has('zip'))
   <span style="color: red" class="help-block">
    <strong>{{ $errors->first('zip') }}</strong>
  </span> @endif
</div>
</div>



<div class="f1-buttons">
  <button type="button" class="btn btn-next">{{ __("Next") }}</button>
</div>
</fieldset>

<fieldset>
  <h4>{{ __("Financial account:") }}</h4>


  <div class="form-group"{{$errors->has('resident') ? 'has-error' : ' '}}>
    <label class="sr-only" for="resident">{{ __("resident") }}</label>
    <div class="input-group">
     <span class="input-group-addon"><i class="fa fa-question"></i></span>
     <select name="resident" class="form-control">
      <option value="">{{ __("Are you a USA resident or citizen?") }}</option>
      <option value="Yes" @if (old( 'resident')=="Yes" ) {{ 'selected' }} @endif>
         {{ __(" Yes") }}
      </option>
      <option value="No" @if (old( 'resident')=="No" ) {{ 'selected' }} @endif>
        {{ __('No') }}
      </option>
    </select>
    @if ($errors->has('resident'))
    <span class="help-block" style="color: red">
     <strong>{{ $errors->first('resident') }}</strong>
   </span>
   @endif
 </div>
</div>


<div class="form-group"{{$errors->has('amount') ? 'has-error' : ' '}}>
  <label class="sr-only" for="amount">{{ __("Amount") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
   <input type="number" name="amount" placeholder="{{ __("Amount to invest") }}"
   class="f1-amount form-control" id="f1-amount">
   @if ($errors->has('amount'))
     <span style="color: red" class="help-block">
      <strong>{{ $errors->first('amount') }}</strong>
    </span>
  @endif
</div>
</div>

<div class="form-group"{{$errors->has('anualincome') ? 'has-error' : ' '}}>
  <label class="sr-only" for="anualincome">{{ __("Approximate annual income") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
   <select name="anualincome" class="form-control">
    <option value="" selected>-{{ __("Approximate annual income") }}-</option>
    <option value="$24999 or less"
    @if (old('anualincome') == '$24999 or less') {{ 'selected' }}
    @endif>
    {{ __("$24999 or less") }}
  </option>
  <option value="from $25.000 to $49.999"
  @if (old('anualincome') == "from $25.000 to $49.999") {{ 'selected' }}
  @endif>
  {{ __('from $25.000 to $49.999') }}
</option>

<option value="from $50.000 to $100.000"
@if (old('anualincome') == "from $50.000 to $100.000") {{ 'selected' }}
@endif>
{{ __('from $50.000 to $100.000') }}
</option>

<option value="from $100.000 to $249.999" @if (old( 'anualincome')=="from $100.000 to $249.999" ) {{ 'selected' }} @endif>
  {{ __('from $100.000 to $249.999') }}
</option>

<option value="from $250.000 to $499.000" @if (old( 'anualincome')=="from $250.000 to $499.000" ) {{ 'selected' }} @endif>
  {{ __('from $250.000 to $499.000') }}
</option>

<option value="from $500.000 to $1000.000" @if (old( 'anualincome')=="from $500.000 to $1000.000" ) {{ 'selected' }} @endif>
  {{ __('from $500.000 to $1000.000') }}
</option>

<option value="more than $1000.000" @if (old( 'anualincome')=="more than $1000.000" ) {{ 'selected' }} @endif>
  {{ __('more than $1000.000') }}
</option>

</select>
@if ($errors->has('anualincome'))
<span class="help-block" style="color: red">
 <strong>{{ $errors->first('anualincome') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group"{{$errors->has('patrimonio') ? 'has-error' : ' '}}>
  <label class="sr-only" for="patrimonio">{{ __("Approximate Capital Networth") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
   <select name="patrimonio" class="form-control">
    <option value="" selected>-{{ __("Approximate Capital Networth") }}-</option>
    <option value="less than $50.000"
    @if (old('patrimonio') == "less than $50.000") {{ 'selected' }}
    @endif>
    {{ __('less than $50.000') }}
  </option>
  <option value="from $50.000 to $99.000"
  @if (old('patrimonio') == "from $50.000 to $99.000") {{ 'selected' }}
  @endif>
  {{ __('from $50.000 to $99.000') }}
</option>

<option value="from $100.000 to $249.999"
@if (old('patrimonio') == "from $100.000 to $249.999") {{ 'selected' }}
@endif>
{{ __('from $100.000 to $249.999') }}
</option>

<option value="from $250.000 to $499.999"
@if (old('patrimonio') == "from $250.000 to $499.999") {{ 'selected' }}
@endif>
{{ __('from $250.000 to $499.999') }}
</option>

<option value="from $500.000 to $1000.000" @if (old( 'patrimonio')=="from $500.000 to $1000.000" ) {{ 'selected' }} @endif>
  {{ __('from $500.000 to $1000.000') }}
</option>

<option value="more than $1000.000" @if (old( 'patrimonio')=="more than $1000.000" ) {{ 'selected' }} @endif>
  {{ __('more than $1000.000') }}
</option>

</select>

@if ($errors->has('patrimonio'))
<span class="help-block" style="color: red">
 <strong>{{ $errors->first('patrimonio') }}</strong>
</span>
@endif
</div>
</div>


<div class="form-group"{{$errors->has('origen_fondos') ? 'has-error' : ' '}}>
  <label class="sr-only" for="origen_fondos">{{ __("Origin of Funds") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-bank"></i></span>
   <select name="origen_fondos" class="form-control">
    <option value="" selected>- {{ __("Origin of Funds") }} -</option>
    <option value="Savings account"
    @if (old('origen_fondos') == "Savings account") {{ 'selected' }}
    @endif>
    {{ __('Savings account') }}
  </option>

  <option value="Salary"
  @if (old('origen_fondos') == "Salary") {{ 'selected' }}
  @endif>
  {{ __('Salary') }}
</option>

<option value="Other"
@if (old('origen_fondos') == "Other") {{ 'selected' }}
@endif>
{{ __('Other') }}
</option>
</select>
@if ($errors->has('origen_fondos'))
<span class="help-block" style="color: red">
 <strong>{{ $errors->first('origen_fondos') }}</strong>
</span>
@endif
</div>
</div>



<div class="form-group"{{$errors->has('objetivo') ? 'has-error' : ' '}}>
  <label class="sr-only" for="objetivo">{{ __("Investment objective") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-bank"></i></span>
   <select name="objetivo" class="form-control">
    <option value="" selected>-{{ __("Investment objective") }} -</option>
    <option value="Speculation-Gain generation"
    @if (old('objetivo') == "Speculation-Gain generation") {{ 'selected' }}
    @endif>
    {{ __('Speculation-Gain generation') }}
  </option>

  <option value="Risk management"
  @if (old('objetivo') == "Risk management") {{ 'selected' }}
  @endif>
  {{ __('Risk management') }}
</option>

<option value="Hedging"
@if (old('objetivo') == "Hedging") {{ 'selected' }}
@endif>
{{ __('Hedging') }}
</option>
</select>
@if ($errors->has('objetivo'))
<span class="help-block" style="color: red">
 <strong>{{ $errors->first('objetivo') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group"{{$errors->has('occupation') ? 'has-error' : ' '}}>
  <label class="sr-only" for="occupation">{{ __("Occupation") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-user"></i></span>
   <input type="text" name="occupation" placeholder="{{ __("Occupation") }}"
   class="f1-occupation form-control" id="f1-occupation">
   @if ($errors->has('occupation'))
   <span style="color: red" class="help-block">
    <strong>{{ $errors->first('occupation') }}</strong>
  </span> @endif
</div>
</div>

<div class="form-group"{{$errors->has('beneficiary') ? 'has-error' : ' '}}>
  <label class="sr-only" for="beneficiary">{{ __("Beneficiary") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-user"></i></span>
   <input type="text" name="beneficiary" placeholder="{{ __("Beneficiary Fullname") }}"
   class="f1-beneficiary form-control" id="f1-beneficiary">
   @if ($errors->has('beneficiary'))
   <span style="color: red" class="help-block">
    <strong>{{ $errors->first('beneficiary') }}</strong>
  </span> @endif
</div>
</div>

<div class="form-group"{{$errors->has('bank') ? 'has-error' : ' '}}>
  <label class="sr-only" for="bank">{{ __("Name of Bank") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-bank"></i></span>
   <input type="text" name="bank" placeholder="{{ __("Name of Bank") }}"
   class="f1-bank form-control" id="f1-bank">
   @if ($errors->has('bank'))
   <span style="color: red" class="help-block">
    <strong>{{ $errors->first('bank') }}</strong>
  </span> @endif
</div>
</div>

<div class="f1-buttons">
  <button type="button" class="btn btn-previous">{{ __("Previous") }}</button>
  <button type="button" class="btn btn-next">{{ __("Next") }}</button>
</div>

</fieldset>

<fieldset>
  <h4>{{ __("Set up your account:") }}</h4>

 <div class="form-group"{{$errors->has('email') ? 'has-error' : ' '}}>
  <label class="sr-only" for="email">{{ __("Email") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
   <input type="text" name="email" placeholder="{{ __("Email") }}"
   class="f1-email form-control" id="f1-email">
   @if ($errors->has('email'))
   <span style="color: red" class="help-block">
    <strong>{{ $errors->first('email') }}</strong>
  </span> @endif
</div>
</div>

<div class="form-group"{{$errors->has('password') ? 'has-error' : ' '}}>
  <label class="sr-only" for="password">{{ __("Password") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-lock"></i></span>
   <input type="password" name="password" placeholder="{{ __("Password") }}"
   class="f1-password form-control" id="f1-password">
   @if ($errors->has('password'))
   <span style="color: red" class="help-block">
    <strong>{{ $errors->first('password') }}</strong>
  </span> @endif
</div>
</div>


<div class="form-group"{{$errors->has('password_confirmation') ? 'has-error' : ' '}}>
  <label class="sr-only" for="password_confirmation">{{ __("Password") }}</label>
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-lock"></i></span>
   <input type="password" name="password_confirmation" placeholder="{{ __("Password confirmation") }}"
   class="f1-password_confirmation form-control" id="f1-password_confirmation">
   @if ($errors->has('password_confirmation'))
   <span style="color: red" class="help-block">
    <strong>{{ $errors->first('password_confirmation') }}</strong>
  </span> @endif
</div>
</div>

<div class="col-md-8 form-group">
    <label style="color: blue">Referral By:  (optional)</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-user"></i></span>
        <input name="agente" class="form-control" placeholder="Referral By (Optional):" value="{{old('agente')}}">
    </div>
</div>


<div class="f1-buttons">
    <button type="button" class="btn btn-previous">{{ __("Previous") }}</button>
    <button type="submit" class="btn btn-submit">{{ __("Submit") }}</button>
  </div>
</fieldset>

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