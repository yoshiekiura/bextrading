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
                        @if ($products->count() > 0)
                            <table class="table datatable table-hover">
                                <thead>
                                <tr>
                                    <th>Product Nº</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Symbol</th>
                                    <th>leverage</th>
                                    <th>Market Value</th>
                                    <th class="pull-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td> {{$product->id}} </td>
                                        <td> {{$product->category->name}} </td>
                                        <td> {{$product->name }} </td>
                                        <td> {{$product->symbol}} </td>
                                        <td> {{$product->leverage}} </td>
                                        <td> {{$product->marketval}} </td>
                                        <td class="pull-right">
                                            <a href="{{ route('prod.edit', $product->id) }}"
                                               class="btn btn-default btn-xs"><i
                                                        class="fa fa-pencil"></i></a>
                                        </td>
                                        <td>
                                            <form action="{{ route('prod.delete', $product->id) }}" method="post">
                                                {{ csrf_field() }} {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{$products->render()}}
                        @else
                            <div class="col-6">
                                <h3>No tiene ningún registro a mostrar...</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection