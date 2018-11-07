@extends('layouts.master') 
@section('content')
<div class="container">
    <div class="panel-heading">
     <h2>Create User</h2>
 </div>
 <div class="panel-body">
    <div class="col-md-8 col-md-offset-2">

        {!! Form::open(['route' => 'storeuser', 'class' => 'form-group']) !!}
        @include('admin.users.partials.form')
        <div class="btn-group pull-right">
            {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
            {!! Form::submit("Add", ['class' => 'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>

</div>
</div>

@endsection
