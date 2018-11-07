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
            <h1>Fees List</h1>
            <div class="col-lg-12">
                {{--dashboard--}}
                @include('admin.partials.adminbalance')
                <div class="panel panel-default">
                    <div class="panel-heading">Fees list</div>
                    <div class="panel-body">
                        @if ($fees->count() > 0)
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Fee Nº</th>
                                    <th>Amount</th>
                                    <th>Porcentage</th>
                                    <th class="pull-right">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($fees as $fee)
                                    <tr>
                                        <td> {{$fee->id}} </td>
                                        <td> {{$fee->amount}} </td>
                                        <td> {{$fee->porcentaje }} </td>
                                        <td class="pull-right">
                                            <a href="{{ route('fee.edit', $fee->id) }}"
                                               class="btn btn-default btn-xs"><i
                                                        class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route('fee.delete', $fee->id) }}" method="post">
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
                                <h3>No tiene ningún registro a mostrar...</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection