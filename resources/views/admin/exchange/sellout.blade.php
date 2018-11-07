@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Sell Exchange Ticket</h1>
            <h4><a class="btn btn-warning pull-right" href="">Add Deposit</a></h4>
        </div>
        <div class="panel-body">
            <h3>{{ $fecha->format('d M, Y' ) }}</h3>

            <div class="row">
                <form class="form-group" action="{{ route('soldexchange', $exchange->id) }}" method="post">
                    @php
                        setlocale(LC_MONETARY, 'en_US');
                    @endphp
                    {{ csrf_field() }}
                    <input type="hidden" name="action" value="Buy">
                    <input type="hidden" name="status" value="Open">
                    <label for="date"> Purchased Date:
                        {{ $exchange->entry->format('d-M-Y') }}
                    </label>
                    <div class="col-4">
                        <label for="date"> Sell out Date:
                            <input type="date" name="fecha" value="{{ old('fecha') }}">
                        </label>
                    </div>
                    <div class="col-4">
                        <label for="client">Client:
                            <input type="hidden" name="user" value="{{ $exchange->user->id }}">
                            {{ $exchange->user->name }}
                        </label>
                    </div>
                    <div class="col-4">
                        <label for="product">Product:
                            <input type="hidden" name="product" value="{{ $exchange->product->id }}">
                            {{ $exchange->product->name }}
                        </label>
                    </div>
                    <div class="col-4">
                        <label for="exchange">Purchased Exchange Rate:
                            {{ money_format('%i',$exchange->rate)}}
                        </label>
                    </div>

                    <div class="col-4">
                        <label for="exchange">Qty:
                            <input type="text" name="qty" value="{{ old('qty') }}">
                            {{$coins[$exchange->product->name]}}
                        </label>
                    </div>
                    <div class="col-4">
                        <label for="exchange">Sell Out Exchange Rate:
                            <input type="text" name="rate" placeholder="$" value="{{ old('rate') }}">
                        </label>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-sign-in-alt"></i> Exchange Sell Out
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
