@extends('layouts.master')
@section('content')
{{--inicio--}}
{!! Charts::styles() !!}
   <h3>Dashboard
   </h3>
   <div class="row">
    <div class="col-lg-12">
        <!-- First Row Starts Here -->
    @include('users.partials.ebalance')
    <!-- First Row Ends Here -->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">All Markets
        <a href="javascript:void(0);" data-perform="panel-dismiss" data-toggle="tooltip" title="" class="pull-right" data-original-title="Close Panel">
          <em class="fa fa-times"></em>
        </a>
        <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
          <em class="fa fa-plus"></em>
        </a>
      </div>
      <div class="panel-wrapper collapse">
        <div class="panel panel-default">
          <div class="panel-heading">All Markets |
            <small>All Crypto Markets</small>
          </div>
          <div class="panel-body">
            <!-- Table Starts Here -->
            <section class="main-content">
              <h3>Valores actuales en USD
               <br>
               <small>Market Capital With Gainers OR Loosers</small>
             </h3>
             <div class="row">
               <div class="col-lg-12">
                <div class="panel panel-default">
                 <div class="panel-heading">Current Coin Prices |
                  <small>With Market Capital</small>
                </div>

                <div class="panel-body">
                  <table id="RealTimeCryptoPricing" class="table table-striped table-hover">
                   <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Market Cap</th>
                      <th>Price</th>
                      <th>24hour VWAP</th>
                      <th>Available Supply</th>
                      <th>24hour Volume</th>
                      <th>%24hr</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                  <tfoot>
                   <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Market Cap</th>
                    <th>Price</th>
                    <th>24hour VWAP</th>
                    <th>Available Supply</th>
                    <th>24hour Volume</th>
                    <th>%24hr</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="panel-footer">All Markets</div>
    </section>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12">
   <div class="panel panel-default">
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
</div>
</div>
</div>
</section>
{!! Charts::scripts() !!}
{!! $options->script() !!}
{!! $chart->script() !!}
{!! $charty->script() !!}
@endsection
