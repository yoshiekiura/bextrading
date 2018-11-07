@extends('layouts.master')
@section('content')
{{--inicio--}}
{!! Charts::styles() !!}
<h3>Dashboard</h3>
<div class="row">
  <div class="col-md-12 col-sm-12">
    <!-- First Row Starts Here -->
    @include('users.partials.ebalance')
    <!-- First Row Ends Here -->
  </div>
</div>
<!-- Chart Starts Here -->
<section class="main-content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Open positions
          <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
            <em class="fa fa-minus"></em>
          </a>
        </div>
        <div class="panel-heading border-none">
          <div class="pull-right">
            <label>
              <select class="form-control input-sm">
               <option value="">Display Row...</option>
               <option value="">10</option>
               <option value="">25</option>
               <option value="">50</option>
               <option value="">100</option>
             </select>
           </label>
         </div>
       </div>
       <div class="panel-body">
        @if ($tickets->count() > 0)
        <div class="row">
          <div class="col-lg-12">
            <div class="table-responsive m-t-10">
              <table class="table table-striped table-hover table-condensed">
                <thead>
                  <tr>
                    <th>TNº</th>
                    <th> Date </th>
                    <th> Item </th>
                    <th>Action</th>
                    <th>Quantity</th>
                    <th>Type</th>
                    <th>Strike</th>
                    <th> Exp Date</th>
                    <th>Cost/Unit</th>
                    <th>Commision</th>
                    {{-- <th>Fill</th> --}}
                    <th>Total</th>
                    <th>Market Value</th>
                   {{--  <th>Valor del Mercado</th> --}}
                  </tr>
                </thead>
                <tbody>
                  @foreach ($tickets as $ticket)
                  @php
                    if($ticket->price == 0){
                      $ticket->price = 1;
                    }
                  @endphp
                  <tr>
                    <td class="number">357{{ $ticket->id }}</td>
                    <td class="number">{{ $ticket->entrydate->format('d M y') }}</td>
                    <td class="number cursor-pointer">{{$ticket->product->name}}</td>
                    <td class="number cursor-pointer">{{ $ticket->action}}</td>
                    <td class="number cursor-pointer">{{ $ticket->qty }}</td>
                    <td class="number cursor-pointer">{{ $ticket->type }}</td>
                    <td class="number cursor-pointer">{{ $ticket->strike }}</td>
                    <td class="number cursor-pointer">{{ $ticket->expdate->format('d M y') }}</td>
                    <td class="number cursor-pointer">${{ $ticket->price }}</td>
                    <td class="number cursor-pointer">${{ $ticket->fee->amount }}</td>
                    {{-- <td class="number cursor-pointer">{{ $ticket->price / $ticket->product->leverage }}</td> --}}
                    <td class="number cursor-pointer">${{ $ticket->total }}</td>
                    <td class="number cursor-pointer">${{ $ticket->marketvalue }}</td>
                   {{--  <td class="number cursor-pointer">${{ $ticket->marketvalue * $ticket->qty }}</td> --}}
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="float-right">
              <ul class="pagination pagination-sm pagi-margin">
                {{ $tickets->render() }}
              </ul>
            </div>
            @else
            <div class="panel-body">
              <h2>No Open positions yet!</h2>
            </div>
            @endif
          </div>
          <div class="no-line text-left">
            <strong><h3 style="color: #red;">
            Total Portfolio Value</h3>
          </strong>
        </div>
        <div class="no-line text-left">
         {{-- <h4 style="color: darkblue;"> {{ '$'. money_format('%i', $marketValue) }} --}}
         {{-- </h4> --}}
         <table class="table">
          <thead>
            <tr>
             <th>Portfolio Equity</th>
             <th>Cash Equity</th>
             <th>Total</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <th>${{ money_format('%i',$marketValue) }}</th>
             <th>${{ money_format('%i',$bal) }}</th>
             <th>${{ money_format('%i',$bal + $marketValue) }}</th>
           </tr>
         </tbody>
       </table>
       @if ($uguaranty > 0)
       <h4 style="color: #b71c1c">Your account has outstanding bill for Broker Guaranty of ${{ money_format('%i' , $uguaranty) }}. Please pay all your bills on time, and pay off your debt as quickly as possible.
       </h4>
       @endif
     </div>
   </div>
 </div>
</div>
</div>
<!-- Open Orders -->
</div>
<!-- Chart Ends Here -->
</section>
<section class="main-content">
  <div class="app">
    <center>
      {!! $options->html() !!}
    </center>
  </div>
</section>
{!! Charts::scripts() !!}
{!! $options->script() !!}
{{-- final --}}
@endsection
