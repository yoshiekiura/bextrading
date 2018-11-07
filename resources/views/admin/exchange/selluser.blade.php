@extends('layouts.app')

@section('content')


    <div class="container">
        {{--{{$coins['BitCoin']}}--}}
        <p>Client: {{ $client->name }}</p>
        <p>Email: {{ $client->email }}</p>
        <h4 class="pull-right">Account Nº 3620{{ $client->id }}</h4>

        {{-- inicio --}}
        <div class="panel-body">

            <table class="table datatable">
                <thead>
                <tr>
                    <th>Currency Portfolio</th>
                    <th>Quantity</th>
                </tr>
                </thead>
                <tbody>
                @foreach($coins as $coin =>$value)
                    @if ($value > 0)
                        <tr>
                            <td> {{$coin .' '}} </td>
                            <td>{{ $value }}</td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>

            <div class="panel-body">
                <form action="{{route('sellcoin',$user)}}" method="post">
                    {{ csrf_field() }}
                    <table class="table datatable">
                        <h3 style="color:#0d47a1" align="center">Sell Out</h3>
                        <thead>

                        <div class="form-group">
                            <label for="fecha">Date:</label>
                            <div class="input-group" {{ $errors->has('fecha') ? 'has-error' : '' }}>
                              <span class="input-group-addon">
                               <span class="fa fa-calendar"></span>
                           </span>
                                <input type="date" name="fecha" required="" value="{{ old('fecha') }}">
                                {!! $errors->first('fecha', '
                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}

                            </div>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Exchange</th>
                                <th>Fee %</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <select name="product">
                                    <option value="">Select Currency</option>
                                    @foreach($exchanges as $exchange)
                                        <option
                                                value="{{ $exchange->product->id }}" {{ old('product') == $exchange->product->id ? 'selected' : ''}} >{{ $exchange->product->name }}
                                        </option>
                                    @endforeach
                                </select>

                            </td>
                            <input type="hidden" name="user" value="{{$client->id}}">
                            <td><input type="text" name="qty" required="" value="{{old('qty')}}"></td>
                            <td><input type="text" name="rate" required="" value=" {{old('rate')}}"></td>
                            <td>
                                <select name="fee" class="form-group">
                                    <option value="">Select Fee</option>
                                    @foreach($fees as $fee)
                                        <option
                                                value="{{ $fee->id }}" {{ old('fee') == $fee->id ? 'selected' : ''}} >{{ $fee->porcentaje }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-danger">Sellout</button>
                    <a href="{{ route('exchange') }}" class="btn btn-primary pull-right ">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
