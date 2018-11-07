@extends('layouts.master')

@section('content')
    <h3>Dashboard</h3>
    <div class="row">
        <div class="col-md-10">
            <!-- First Row Starts Here -->
        @include('users.partials.ebalance')
        <!-- First Row Ends Here -->

        </div>

        <div class="container">
            <div class="col-lg-12">
                <h1>Contact your broker</h1>
                <div class="panel-body">
                    <form class="form-group" action="{{route('sendmensaje')}}" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-9">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Message:</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                              <span class="input-group-addon">
                               <span class="fa fa-envelope"></span>
                           </span>
                                        <textarea name="mensaje" placeholder="Insert your message.."
                                                  rows="3"
                                                  class="form-control"></textarea>
                                        {!! $errors->first('mensaje', '
                                        <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-envelope"></i> Send!
                                    </button>
                                </div>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
