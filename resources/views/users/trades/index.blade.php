@extends('layouts.master')
@section('content') {{--inicio--}} {!! Charts::styles() !!}

<h3>Dashboard
</h3>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <!-- First Row Starts Here -->
        @include('users.partials.ebalance')
        <!-- First Row Ends Here -->
    </div>
</div>

<!-- Chart Starts Here -->
<div class="container">
    <div class="col-lg-12">

        <div class="panel panel-default">

            <div data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="1400" class="panel widget">

                <div class="panel-heading">Historial
                    <a href="javascript:void(0);" data-perform="panel-dismiss" data-toggle="tooltip" title="" class="pull-right" data-original-title="Close Panel">
                        <em class="fa fa-times"></em>
                    </a>
                    <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                        <em class="fa fa-plus"></em>
                    </a>
                </div>
                <div class="panel-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-heading">All Markets |
                            <small>Transaction History</small>
                        </div>
                        <div class="panel-body">
                            @php
                            setlocale(LC_MONETARY, 'en_US');
                            @endphp

                            <div class="panel-heading">
                                <h2>Options History</h2>
                            </div>
                            @if ($trades->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td class="text-center">
                                                TNº
                                            </td>
                                            <td class="text-center">
                                             Date Trans
                                         </td>
                                         <td class="text-center">
                                          Action
                                      </td>
                                      <td class="text-center">
                                          Qty
                                      </td>
                                      <td class="text-center">
                                        Description
                                    </td>

                                    <td class="text-center">
                                       Credited
                                   </td>
                                   <td class="text-center">
                                       Debited
                                   </td>
                                   <td class="text-center">
                                    Gain/Loss
                                </td>
                                <td class="text-center">
                                   Market Value
                               </td>
                               <td class="text-center">
                                   Total
                               </td>

                               <td class="text-right">
                                <p>State</p>
                            </td>
                        </tr>
                    </thead>


                    <tbody>
                        @foreach ($trades as $trade)
                        <?php
                        if (empty($trade->ticket->product->name)) {
                            $product = '--';
                        } else {
                            $product = $trade->ticket->product->name;
                        }
                        $sum = 0;
                        $sum += ($trade->credit - $trade->debit);
                        $total += $sum;
                        if (empty($trade->ticket->qty)) {
                            $qty = '--';
                        } else {
                            $qty = $trade->ticket->qty;
                        }

                        if (empty($trade->ticket->status)) {
                            $status = '--';
                        } else {
                            $status = $trade->ticket->status;
                        }
                        ?>
                        <tr>
                            <td class="text-center">
                                <p>857{{ $trade->ticket->id }}</p>
                            </td>
                            <td class="text-center">
                                <p>{{$trade->created_at->format('d M')}}</p>
                            </td>
                            <td class="text-center">
                                <p>{{$trade->action}}</p>
                            </td>
                            <td class="text-center">
                                <p>{{ $qty }}</p>
                            </td>
                            <td class="text-center">
                                <p>{{$product}}</p>
                            </td>

                            <td class="text-center">
                                <p>{{ $trade->credit }}</p>
                            </td>
                            <td class="text-center">
                                <p>{{number_format($trade->debit,2)}}</p>
                            </td>
                            <td>
                                <p align="center"> {{money_format('%i',$trade->profit) }}</p>
                            </td>
                            <td>
                                <p align="center">{{ money_format('%i',$trade->market_value) }}</p>
                            </td>

                            <td class="text-center">
                                <p align="center">{{ money_format('%i',$sum) }}</p>
                            </td>

                            <td class="text-center">
                                <p>{{ $status }}</p>
                            </td>

                        </tr>

                    </tbody>
                    @endforeach
                </table>
                @endif

            </div>
        </div>
        <table class="table">
            <thead>
              <tr>
               <th> Balance del Portafolio </th>
               <th>Saldo Efectivo</th>
               <th>Balance Total</th>
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
</div>
@if ($uguaranty > 0)
<h4 style="color: #b71c1c">Your account ramain a debt for ${{ money_format('%i' , $uguaranty) }} on concept for Broker Guaranty. Please cancel as soon as possible.
       </h4>
@endif
</div>
</div>
</div>
{{$trades->render()}}
</div>
</div>
<!-- Chart Ends Here -->
<!-- exchange transactions -->
<div class="container">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div data-toggle="play-animation" data-play="fadeInLeft" data-offset="0" data-delay="1400" class="panel widget">
                <div class="panel-heading">Historial Criptomonedas
                    <a href="javascript:void(0);" data-perform="panel-dismiss" data-toggle="tooltip" title="" class="pull-right" data-original-title="Close Panel">
                        <em class="fa fa-times"></em>
                    </a>
                    <a href="javascript:void(0);" data-perform="panel-collapse" data-toggle="tooltip" title="" class="pull-right" data-original-title="Collapse Panel">
                        <em class="fa fa-plus"></em>
                    </a>
                </div>
                <div class="panel-wrapper">
                    <div class="panel panel-default">
                        <div class="panel-heading">All Markets |
                            <small>Mercado Criptodivisas</small>
                        </div>
                        <div class="panel-body">
                            @php setlocale(LC_MONETARY, 'en_US');
                            @endphp

                            <div class="panel-heading">
                                <h2>Historial Criptodivisas</h2>
                            </div>
                            @if ($trades->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <td class="text-center">
                                                TNº
                                            </td>
                                            <td class="text-center">
                                                Date
                                            </td>
                                            <td class="text-center">
                                                Action
                                            </td>

                                            <td class="text-center">
                                                Description
                                            </td>

                                            <td class="text-center">
                                                Credit
                                            </td>
                                            <td class="text-center">
                                                Debit
                                            </td>
                                            <td class="text-center">
                                                Tipo Cambio
                                            </td>
                                            <td class="text-center">
                                                Comisión
                                            </td>
                                            <td class="text-center">
                                                Total
                                            </td>
                                            <td class="text-center">
                                                Quantity
                                            </td>

                                            <td class="text-right">
                                                Status
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tradexs as $tradex)
                                        <?php
                                        setlocale(LC_MONETARY, 'en_US');
                                        ?>
                                        <tr>
                                            <td class="text-center">
                                                <p>384{{$tradex->id}}</p>
                                            </td>
                                            <td class="text-center">
                                                <p>{{$tradex->created_at->format('d M')}}</p>
                                            </td>
                                            <td class="text-center">
                                                <p>{{ $tradex->action}}</p>
                                            </td>

                                            <td class="text-center">
                                                <p>{{ $tradex->exchange->product->name }}</p>
                                            </td>

                                            <td class="text-center">
                                                <p>{{ $tradex->credit }}</p>
                                            </td>
                                            <td class="text-center">
                                                <p>{{$tradex->debit}}</p>
                                            </td>

                                            <td>
                                                {{ money_format('%i' , $tradex->exchange->rate) }}
                                            </td>

                                            <td>
                                                {{ $tradex->exchange->fee }}%
                                            </td>

                                            <td>
                                                {{ money_format('%i' , $tradex->exchange->total) }}
                                            </td>

                                            <td class="text-center">
                                                {{ $tradex->exchange->qty}}
                                            </td>

                                            <td class="text-center">
                                                <p align="center">{{ $tradex->exchange->status }}</p>
                                            </td>

                                        </tr>

                                    </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                        @else
                        <div class="col-6">
                            <h3>No hay intercambios de divisas...</h3>
                        </div>
                        @endif {{$tradexs->render()}}

                    </div>

                    <!-- Fin exchange transactions -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>

</section>
{{-- final --}}
@endsection
