@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-10">
            <h2>Trade List</h2>
        </div>
    </div>
    <section class="main-content">
        <a class="btn btn-labeled btn-primary pull-right" href="{{route('usuarios')}}">

                <span class="btn-label"><i class="fa fa-dollar"></i>
                        </span>Client list
        </a>
        <h3>
            Balances
        </h3>
        <div class="row">
            <div class="col-md-12">
                <!-- First Row Starts Here -->
                <div class="row">
                    <div class="col-lg-12">
                    {{--dashboard--}}
                    @include('admin.partials.adminbalance')
                    <!-- First Row Ends Here -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Client List</div>
                            <div class="table-responsive">
                                <div class="panel-body">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>
                                              Date
                                            </th>
                                            <th>
                                                Acc Nº
                                            </th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                Email
                                            </th>
                                            <th>
                                                Country
                                            </th>
                                            <th>
                                                Telephone
                                            </th>
                                            <th>
                                                Mobile
                                            </th>
                                            <th>
                                                Balance
                                            </th>
                                            <th>
                                                Broker Guaranty
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    {{$user->created_at->format('d/m/Y')}}
                                                </td>

                                                <td>
                                                    {{$user->id}}
                                                </td>
                                                <td>
                                                    {{$user->name}}
                                                </td>
                                                <td>
                                                    {{$user->email}}
                                                </td>
                                                <td>
                                                    {{$user->country}}
                                                </td>
                                                <td>
                                                    {{$user->phone}}
                                                </td>
                                                <td>
                                                    {{$user->mobile}}
                                                </td>
                                                <td>

                                                        ${{ money_format('%i', Tradesys\User::getBalance($user->id) ) }}
                                                </td>
                                                <td>
                                                    <p style="color: #85162b">
                                                        ${{ money_format('%i', Tradesys\User::brokerGuaranty($user->id) ) }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('ticketuser',$user->id) }}"
                                                       class="btn btn-default btn-xs">
                                                        <em class="fa fa-eye"></em>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('edituseradmin',$user->id) }}"
                                                       class="btn btn-default btn-xs">
                                                        <em class="fa fa-pencil"></em>
                                                    </a>
                                                </td>

                                                <td>
                                                    <form action="{{ route('delete.user', $user->id) }}" method="post">
                                                        {{ csrf_field() }} {{ method_field('delete') }}

                                                        <button class="btn btn-danger btn-xs"><em class="fa fa-trash"></em></button>

                                                    </form>
                                                    {{-- <a href="{{ route('delete.user',$user->id) }}"
                                                       class="btn btn-default btn-xs">
                                                        <em class="fa fa-eye"></em>
                                                    </a> --}}
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>

                                     <hr>
                                     <h4>Indice de paginación.</h4>
                                     {{ $users->links() }}

                                </div>

                            </div>
                        </div>
                        <!-- Chart Starts Here -->
                    </div>
                </div>
            </div>
    </section>
@endsection
