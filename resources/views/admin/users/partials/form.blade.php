<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Full Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'value'=> "{{ old('name') }}"]) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email address') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: example@example.com']) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('password') }}</small>
</div>
<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    {!! Form::label('password_confirmation', 'Confirm Password') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
</div>

<div
    class="form-group{{ $errors->has('dobday') ? ' has-error' : '' }} {{ $errors->has('dobmonth') ? ' has-error' : '' }} {{ $errors->has('year') ? ' has-error' : '' }}">
    <div class="col-md-8">
        {!! Form::label('dobday', 'Day') !!}
        {!! Form::selectRange('dobday', 1, 31, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! Form::label('dobmonth', 'Month') !!}
        {!! Form::selectMonth('dobmonth', ['class' => 'form-control', 'required' => 'required']) !!}
        <label>
            Year :
            {!! Form::selectYear('years', date('Y'), date('Y') - 80 , null, ['class' => 'col-md-4', 'required' => 'required']) !!}
        </label>
        <small class="text-danger">{{ $errors->first('dobday') }}</small>
        <small class="text-danger">{{ $errors->first('dobmonth') }}</small>
        <small class="text-danger">{{ $errors->first('year') }}</small>
    </div>
</div>
<br>
<hr>


<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Telephone') !!}
    {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('phone') }}</small>
</div>
<div class="form-group{{ $errors->has('idn') ? ' has-error' : '' }}">
    {!! Form::label('idn', 'Identification Nº') !!}
    {!! Form::text('idn', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('idn') }}</small>
</div>
<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    {!! Form::label('address', 'Address') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('address') }}</small>
</div>
<div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
    {!! Form::label('state', 'State') !!}
    {!! Form::text('state', null, ['class' => 'form-control', 'required' => 'required','placeholder'=>'State o Provice']) !!}
    <small class="text-danger">{{ $errors->first('state') }}</small>
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
    {!! Form::label('city', 'City') !!}
    {!! Form::text('city', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('city') }}</small>
</div>

<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
    {!! Form::label('country', 'Country') !!}
    {!! Form::select('country', [
        'Mx' => 'Mexico',
        'Gu' => 'Guatemala',
        'PA' =>'Panama',
        'CO' => 'Colombia',
        'Chile' => 'Chile',
        'EC' => 'Ecuador',
        'PE' => 'Peru',
        'BO' => 'Bolivia'

        ], null, ['id' => 'country', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('country') }}</small>
</div>

<div class="form-group{{ $errors->has('amount') ? ' has-error' : '' }}">
    {!! Form::label('amount', 'Amount to Invest') !!}
    {!! Form::number('amount', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('amount') }}</small>
</div>
<div class="form-group{{ $errors->has('laboral') ? ' has-error' : '' }}">
    {!! Form::label('laboral', 'Laboral Status') !!}
    {!! Form::select('laboral', ['Empleado' => 'Empleado', 'Desempleado' => 'Desempleado','Pensionado'=>'pensionado','Independiente'=>'independiente','Comerciante'=>'comerciante', 'Empresario'], null, ['id' => 'laboral', 'class' => 'form-control', 'required' => 'required', 'multiple']) !!}
    <small class="text-danger">{{ $errors->first('laboral') }}</small>
</div>




