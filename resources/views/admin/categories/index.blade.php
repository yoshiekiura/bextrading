@extends('layouts.main')
@section('content')

    <section class="main-content">
        <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">
        <span class="btn-label"><i class="fa fa-users"></i>
        </span>Client list
        </a>
        <a class="btn btn-labeled btn-warning pull-right" href="{{route('fee.create')}}">
            <span class="btn-label"><i class="fa fa-dollar"></i>
        </span>Create Fee
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
                    <div class="panel-heading">Categories</div>
                    <div class="panel-body">


                        <h1>Category List</h1>
                        <h4>
                            <a class="btn btn-warning pull-right" href="{{route('newcat')}}">
                                Create Category
                            </a>
                        </h4>
                        <h4><a class="btn btn-warning pull-right" href="{{ route('trade.create') }}">Add Deposit</a>
                        </h4>
                        <h4><a class="btn btn-warning pull-right" href="{{route('crear_tickets')}}">Create Ticket</a>
                        </h4>

                    </div>

                    <div class="panel-body">
                        @if ($categories->count() > 0)
                            <table class="table datatable table-hover">
                                <thead>
                                <tr>
                                    <th>Category Nº</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                @foreach ($categories as $category)

                                    <td> {{$category->id}} </td>
                                    <td> {{$category->name}} </td>
                                    <td> {{$category->description }} </td>
                                    <td class="pull-right">
                                        {{--<a href="###" class="btn btn-default btn-xs" --}} {{--target="_blank"><i class="fa fa-eye"></i></a>--}}
                                        <a href="{{ route('editcat', $category->id) }}"
                                           class="btn btn-default btn-xs"><i
                                                    class="fa fa-pencil"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('deletecat',$category->id) }}" method="post">
                                            {{ csrf_field() }} {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                        </form>
                                    </td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                        @else
                            <div class="col-6">
                                <h3>No records to show...</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection