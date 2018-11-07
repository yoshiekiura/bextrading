@extends('layouts.main') 
@section('content')
<section class="main-content">
    <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">
        <span class="btn-label"><i class="fa fa-users"></i>
        </span>Client list
        </a>
    <a class="btn btn-labeled btn-warning pull-right" href="{{route('prod.create')}}">
            <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Create Product
        </a>
    <h3>
        Balance
    </h3>
    <!-- First Row Starts Here -->
    <div class="row">
        <h1>Graphics</h1>
        <div class="col-lg-12">
            {{--dashboard--}}
    @include('admin.partials.adminbalance')
            <div class="panel panel-default">
                <div class="panel-heading">
                    Product list
                </div>
                <div class="panel-body">
                    {!! Charts::styles() !!}
                    <div class="panel-heading">
                        Welcome {{ Auth::user()->name }}
                    </div>
                    <div class="panel-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                    </div>
                    <h2>DashBoard - Admin</h2>
                    <h4>Date: {{ $hoy->format('d-M-Y') }}</h4>
                </div>
            </div>


           
               <div class="app">
                
                    <center>
                        {!! $open->html() !!}
                    </center>
                
                    <center>
                        {!! $chart->html() !!}
                    </center>
                
                    <center>
                        {!! $charty->html() !!}
                
                    </center>
                
                    <center>
                        {!! $usersall->html() !!}
                    </center>
                    <center>
                        {!! $geo->html() !!}
                    </center>
                
                </div>
           </div>
        </div>

        <!-- End Of Main Application -->
        {!! Charts::scripts() !!} {!! $open->script() !!} {!! $chart->script() !!} {!! $charty->script() !!} 
        {!! $usersall->script() !!}
        {!! $geo->script() !!}
    </div>
</section>
@endsection