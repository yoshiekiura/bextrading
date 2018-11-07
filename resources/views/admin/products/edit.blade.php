@extends('layouts.main')
@section('content')
    <section class="main-content">
        <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">
        <span class="btn-label"><i class="fa fa-users"></i>
        </span>Client list
        </a>
        <a class="btn btn-labeled btn-warning pull-right" href="{{route('prod.create')}}">
            <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Create Product
        </a>
        <h3>
            Balance
        </h3>
        <!-- First Row Starts Here -->
        <div class="row">
            <h1>Products</h1>
            <div class="col-lg-12">
                {{--dashboard--}}
                @include('admin.partials.adminbalance')
                <div class="panel panel-default">
                    <div class="panel-heading">Product list</div>
                    <div class="panel-body">

                        <form class="form-group" action="{{ route('prod.update', $product->id) }}" method="post">
                            {{ csrf_field() }} {{ method_field('put') }}
                            <div class="col-md-9">
                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Category</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                                  <span class="input-group-addon">
                                                    <span class="fa fa-users"></span>
                                                 </span>
                                            <select name="category_id" class="form-control select">
                                                <option value="0" selected>Select</option>
                                                @foreach ($categories as $category)
                                                    <option
                                                            value="{{ $category->id }}" {{ old('category_id', $product->category->id) == $category->id ? 'selected' : ''}} >
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {!! $errors->first('category_id', '
                                        <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Product Name</label>
                                    <div class="col-md-9">
                                        <div class="input-group" {{ $errors->has('name') ? 'has-error' : '' }}>
                                                <span class="input-group-addon">
                                                 <span class="fa fa-dollar-sign"></span>
                                               </span>
                                            <input name="name" type="text" class="form-control"
                                                   value="{{ old('name', $product->name) }}"/> {!! $errors->first('name', '
                                                        <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Product Symbol</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('symbol') ? 'has-error' : '' }}>
                                                <span class="input-group-addon">
                                                 <span class="fa fa-dollar-sign"></span>
                                               </span>
                                                <input name="symbol" type="text" class="form-control"
                                                       value="{{ old('symbol', $product->symbol) }}"/> {!! $errors->first('symbol', '
                                             <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="color: #0C1021">
                                        <label class="col-md-3 control-label">Product Leverage</label>
                                        <div class="col-md-9">
                                            <div class="input-group" {{ $errors->has('leverage') ? 'has-error' : '' }}>
                                      <span class="input-group-addon">
                                         <span class="fa fa-dollar-sign"></span>
                                     </span>
                                                <input name="leverage" type="text" class="form-control"
                                                       value="{{ old('leverage', $product->leverage) }}"/> {!! $errors->first('leverage', '
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                            </div>
                                        </div>

                                        <div class="form-group" style="color: #0C1021">
                                            <label class="col-md-3 control-label">Product Market Value</label>
                                            <div class="col-md-9">
                                                <div class="input-group" {{ $errors->has('marketval') ? 'has-error' : '' }}>
                                                      <span class="input-group-addon">
                                                       <span class="fa fa-dollar-sign"></span>
                                                     </span>
                                                    <input name="marketval" type="text" class="form-control"
                                                           value="{{ old('marketval', $product->marketval) }}"/> {!! $errors->first('marketval', '
                                                <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-sign-in-alt"></i> Update Product
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection