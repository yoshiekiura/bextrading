@extends('layouts.app')

@section('content')
{!! Charts::styles() !!}
    <div class="container">

        <h3 style="color:black">Financial Profile</h3>

        <p>Name: {{$user->name}}</p>
        <p>Email: {{$user->email}}</p>

         <!-- Main Application (Can be VueJS or other JS framework) -->
                <div class="app">
                    <center>
                        {!! $options->html() !!}
                    </center>
                    <hr>
                    <center>
                        {!! $chart->html() !!}
                    </center>
                    <hr>
                    <center>
                        {!! $charty->html() !!}
                    </center>
                    <hr>
                </div>
                <!-- End Of Main Application -->
                {!! Charts::scripts() !!}
                {!! $options->script() !!}
                {!! $chart->script() !!}
                {!! $charty->script() !!}
    </div>

@endsection

