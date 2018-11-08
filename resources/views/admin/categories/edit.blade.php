@extends('layouts.main')
@section('content')

    <section class="main-content">
        <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">
        <span class="btn-label"><i class="fa fa-users"></i>
        </span>Client list
        </a>
        <a class="btn btn-labeled btn-warning pull-right" href="{{route('categories')}}">
            <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Categories
        </a>
        <h3>
            Balance
        </h3>
        <!-- First Row Starts Here -->
        <div class="row">

            <div class="col-lg-12">
                {{--dashboard--}}
                @include('admin.partials.adminbalance')
                <div class="panel panel-default">
                    <div class="panel-heading">New Category</div>
                    <div class="panel-body">
                        <form class="form-group" action="{{ route('updatecat',$category->id) }}" method="post">
                            {{ csrf_field() }} {{ method_field('PUT') }}

                            <div class="col-md-9">
                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Name</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                              <span class="input-group-addon">
                                               <span class="fa fa-users"></span>
                                             </span>
                                            <input name="name" type="text" class="form-control"
                                                   value="{{ old('name',$category->name) }}"/>
                                            {!! $errors->first('name', '
                                            <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="color: #0C1021">
                                    <label class="col-md-3 control-label">Description</label>
                                    <div class="col-md-9">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                             <span class="fa fa-plus"></span>
                                           </span>

                                            <textarea name="description"
                                                      class="form-control">{{old('description',$category->description)}}</textarea>
                                        </div>
                                        {!! $errors->first('description', '
                                        <span style="color: #ff2c23" class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <br>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt"></i> Update Category
                            </button>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
