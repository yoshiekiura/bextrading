@extends('layouts.app')

@section('content')

{{-- inicio --}}
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-title">
                <h2>Debt Clients List</h2><h3 class="pull-right"></h3>
            </div>
            <hr>

            <div class="row">

                <div class="col-xs-6 text-right">
                    <address>
                        <strong>Today's Date:</strong><br>
                        <br><br>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

              {{-- inicio --}}

              <div class="panel-heading">
                <h3 class="panel-title"><strong>Open Tickets</strong></h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Id</strong></td>
                                <td class="text-center"><strong>Name</strong></td>
                                <td class="text-center"><strong>Debt</strong></td>

                            </tr>
                        </thead>

                        <tbody>

                         @foreach ($trades as $trade)
                         @if ($total < 0 )
                         <tr>
                            <td class="text-center">{{ $trade->user_id }}</td>
                            <td class="text-center">{{ $trade->user->name }}</td>

                        </tr>
                        <tr>
                            <td class="no-line"></td>
                            <td class="no-line text-center"><strong>Total</strong></td>
                            <td class="no-line text-right">{{ $total }}</td>
                        </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
</div>
</div>

@endsection


