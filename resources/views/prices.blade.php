@extends('layouts.master')
@section('content')
    {{--inicio--}}

   <section>
            <section class="main-content">
               <!-- Live Coin Price -->
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="panel panel-default">
                              <div class="panel-collapse">
                                 <div class="panel-body">
                                    <!-- Table Starts Here -->
                                     <section class="main-content">
                                          <h3>Current Coins Value in USD
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
                                       </section>
                                    <!-- Table Ends Here -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
            </section>
         </section>

{{-- final --}}
@endsection
