@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Sell Ticket</h1>
        <h4><a class="btn btn-warning pull-right" href="{{route('crear_tickets')}}">New Ticket</a></h4>
        <h4><a class="btn btn-warning pull-right" href="{{ route('trade.create') }}">Add Deposit</a></h4>
    </div>

    <div class="panel-body">
        <form class="form-group" action="{{ route('trade.sold',$trade->id) }}" method="post">
            {{ csrf_field() }} {{ method_field('put') }}

            <div class="col-md-6">
                <input type="hidden" name="action" value="Buy">
                <input type="hidden" name="status" value="Closed">

                <label for="date">
                    Trade Date: {{ $trade->ticket->entrydate->format('M d, y') }}
                </label>
                <div class="form-group" style="color: #0C1021">
                    <label class="col-md-3 control-label">Date:</label>
                    <div class="col-md-9">
                        <div class="input-group" {{ $errors->has('fecha') ? 'has-error' : '' }}>
                          <span class="input-group-addon">
                           <span class="fa fa-calendar"></span>
                       </span>

                       <input name="fecha" type="date" class="form-control"
                       value="{{ old('fecha',$trade->ticket->entrydate) }}"/> {!! $errors->first('fecha', '
                       <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                   </div>
               </div>
           </div>
       </div>
       <div class="col-md-6">
        <div class="form-group" style="color: #0C1021">
            <label class="col-md-3 control-label">Clients</label>
            <div class="col-md-9">
                <div class="input-group">
                    <span class="input-group-addon">
                     <span class="fa fa-users"></span>
                 </span>
                 {{ $trade->ticket->user->name }}
             </div>
             <input name="user" type="hidden" class="form-control"
             value="{{ old('user', $trade->ticket->user->id) }}"/>
             {!! $errors->first('user', '
             <span style="color: #ff2c23" class="help-block">:message</span>') !!}
         </div>
     </div>
 </div>


 <div class="col-md-6">
    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Qty</label>
        <div class="col-md-9">
            <div class="input-group">
              <span class="input-group-addon">
               <span></span>
               {{ $trade->ticket->qty }}
           </span>
           <input name="qty" type="number" class="form-control"
           value="{{ old('qty', $trade->ticket->qty) }}"/>
       </div>
       {!! $errors->first('qty', '
       <span style="color: #ff2c23" class="help-block">:message</span>') !!}
   </div>
</div>
</div>

<div class="col-md-6">
    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Type</label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon">
                 <span class="fa fa-suitcase"></span>
             </span>
             {{ $trade->ticket->type }}
             <input name="type" type="hidden" class="form-control"
             value="{{ old('type', $trade->ticket->type) }}"/>
         </div>
         {!! $errors->first('type', '
         <span style="color: #ff2c23" class="help-block">:message</span>') !!}
     </div>
 </div>
</div>

<div class="col-md-6">
    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Product</label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon">
                  <span class="fab fa-product-hunt"></span>
              </span>
              {{ $trade->ticket->product->name }}
              <input name="product" type="hidden" class="form-control"
              value="{{ old('product', $trade->ticket->product->id) }}"/>
          </div>
          {!! $errors->first('product', '
          <span style="color: #ff2c23" class="help-block">:message</span>') !!}
      </div>
  </div>
</div>

<div class="col-md-6">
    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Last Price</label>
        <div class="col-md-9">
            <div class="input-group" {{ $errors->has('precio') ? 'has-error' : '' }}>
                <span class="input-group-addon">
                 <span class="fa fa-dollar-sign"></span>
             </span>
             {{ $trade->ticket->price }}
             <input name="precio" type="hidden" class="form-control"
             value="{{ old('precio', $trade->ticket->price) }}"/> {!! $errors->first('precio', '
             <span style="color: #ff2c23" class="help-block">:message</span>') !!}
         </div>
     </div>
 </div>
</div>
<div class="col-md-6">
    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Unit Sell Price</label>
        <div class="col-md-9">
            <div class="input-group" {{ $errors->has('sellprice') ? 'has-error' : '' }}>
                <span class="input-group-addon">
                 <span class="fa fa-dollar-sign"></span>
             </span>
             <input name="sellprice" type="number" class="form-control"
             value="{{ old('sellprice') }}"/> {!! $errors->first('sellprice', '
             <span style="color: #ff2c23" class="help-block">:message</span>') !!}
         </div>
     </div>
 </div>
</div>

<div class="col-md-6">
    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Fee</label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon">
                 <span class="fa fa-dollar-sign"></span>

             </span>
             <select name="fee" class="form-control select">
                <option value="0" selected>Select</option>
                @foreach ($fees as $fee)
                <option value ="{{ $fee->id }}" {{ old( 'fee') == $fee->id ? 'selected' : ''}} >{{ $fee->amount }}</option>
                @endforeach
            </select>
        </div>
        {!! $errors->first('fee', '
        <span style="color: #ff2c23" class="help-block">:message</span>') !!}
    </div>
</div>
</div>

<div class="col-md-6">
    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Month</label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon">
                 <span class="fa fa-clock"></span>
             </span>
             {{ $trade->ticket->month->month }}
             <input type="hidden" name="month" value="{{ $trade->ticket->month->id }}">

         </div>
         {!! $errors->first('month', '
         <span style="color: #ff2c23" class="help-block">:message</span>') !!}
     </div>
 </div>
</div>

<div class="col-md-6">
    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Year</label>
        <div class="col-md-9">
            <div class="input-group">
                <span class="input-group-addon">
                 <span class="fas fa-clock"></span>
             </span>
             <input type="hidden" name="year" value="{{ $trade->ticket->year->id }}">
             {{ $trade->ticket->year->year }}
         </div>
         {!! $errors->first('year', '
         <span style="color: #ff2c23" class="help-block">:message</span>') !!}
     </div>
 </div>
</div>

<div class="col-md-6">

    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Strike</label>
        <div class="col-md-9">
            <div class="input-group" {{ $errors->has('strike') ? 'has-error' : '' }}>
                <span class="input-group-addon">
                 <span class="fas fa-bolt"></span>
             </span>
             {{ $trade->ticket->strike }}
             <input name="strike" type="hidden" class="form-control"
             value="{{ old('strike', $trade->ticket->strike) }}"/> {!! $errors->first('strike', '
             <span style="color: #ff2c23" class="help-block">:message</span>') !!}
         </div>

     </div>
 </div>
</div>

<div class="col-md-6">
    <div class="form-group" style="color: #0C1021">
        <label class="col-md-3 control-label">Exp Date:</label>
        <div class="col-md-9">
            <div class="input-group" {{ $errors->has('expdate') ? 'has-error' : '' }}>
                <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
              </span>
              {{ $trade->ticket->expdate->format('M d y') }}
              <input name="expdate" type="hidden" class="form-control"
              value="{{ old('expdate',$trade->ticket->expdate) }}"/> {!! $errors->first('expdate', '
              <span style="color: #ff2c23" class="help-block">:message</span>') !!}
          </div>

      </div>
  </div>
  <hr>
  <br>

  <div class="form-group">

    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-sign-in-alt"></i> Make a Sell
        </button>
    </div>
</div>
</div>

</form>

</div>
</div>
@endsection
