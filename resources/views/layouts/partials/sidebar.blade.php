<div class="sidebar-inner slimscrollleft">
    <div id="sidebar-menu">
        <ul>
            <li style="color: white" class="header3"></li>

            <h6 style="color: #e0d2d8" class="header3">{{__("Welcome")}}
                <hr><i class="mdi mdi-account-settings-variant"> {{ Auth::user()->name }}</i></h6>
            <p class="menu-title"> {{ Auth::user()->email }} </p>
            <hr>
            @can('users.index')
                <li>
                <a href="{{route('dashboard')}} " class="waves-effect"><i
                            class="dripicons-device-desktop"></i><span> {{__("Dashboard")}} </span></a>
                </li>
            @endcan

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-suitcase"></i><span>{{__("Operations")}}
                        <span
                                class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                   @can('orders.create')
                        <li><a href="{{ route('orders.create') }}">+ {{__("New Order")}} </a></li>
                   @endcan
                    @can('tickets.index')
                        <li><a href="{{ route('tickets.index') }}">+ {{__("Tickets")}} </a></li>
                    @endcan
                   @can('trades.index')
                        <li><a href="{{ route('trades.index') }}">+ {{__("Trades")}} </a></li>
                   @endcan

                </ul>
            </li>

          {{--   <li>
                <a href="#######" class="waves-effect"><i
                            class="######"></i><span> {{__("Transaction History")}} </span></a>
            </li> --}}

            <li>
                <a href="calendar.html" class="waves-effect"><i
                            class="dripicons-graph-bar"></i><span> {{__("Investments Graphs")}} </span></a>
            </li>


            @can('users.index')

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user-group"></i> <span> {{__("Clients")}}
                            <span
                                    class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('users.index') }}">+ {{__("Clients")}} </a></li>

                    </ul>
                </li>


            @endcan

            @can('brokers.create')
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-user-id"></i> <span> {{__("Agents")}}
                            <span
                                    class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('brokers.create') }}">+ {{__("Add Agent")}} </a></li>
                        <li><a href="{{ route('brokers.index') }}">+ {{__("Agents")}} </a></li>

                    </ul>
                </li>
            @endcan

            <li>
                <a href="#####" class="waves-effect"><i
                            class="dripicons-calendar"></i><span> {{__("Events")}} </span></a>
            </li>

             @can('products.index')

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-graph-bar"></i><span> {{__("Markets")}}
                        <span
                                class="badge badge-pill badge-success float-right">9</span> </span></a>
                <ul class="list-unstyled">
                   @can('categories.create') <li><a href="{{ route('categories.index') }}">+ {{__("Categories")}}</a></li>@endcan
                    @can('categories.create')<li><a href="{{ route('categories.create') }}">+ {{__("Add Category")}} </a></li>@endcan
                     @can('products.index')<li><a href="{{ route('products.index') }}">+ {{__("Products")}}</a></li>@endcan
                   @can('products.create') <li><a href="{{ route('products.create') }}">+ {{__("Add Product")}}</a></li>@endcan
                    <li><a href="form-validation.html">+ {{__("Set Market Values")}}</a></li>

                </ul>
            </li>
            @endcan

            @can('roles.create')
                   <li>
                    <a href="{{ route('roles.index') }}" class="waves-effect"><i
                                class="dripicons-lock"></i><span> Roles </span></a>
                    </li>
            @endcan

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-gear"></i><span> {{__("Settings")}}
                        <span
                                class="badge badge-pill badge-success float-right">9</span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="form-elements.html">+ {{__("Change Password")}} </a></li>
                    <li><a href="form-validation.html">+ {{__("Profile")}}</a></li>
                    <li><a href="form-validation.html">+ {{__("Validations")}}</a></li>

                </ul>
            </li>

            <li class="menu-title">Extras</li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i
                            class="dripicons-alarm"></i><span> Communications <span class="float-right"><i
                                    class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="advanced-animation.html">Request a Call</a></li>
                    <li><a href="advanced-highlight.html">Refer a friend</a></li>
                    <li><a href="advanced-rating.html">Purchase Request</a></li>
                </ul>
            </li>

            <li class="has_sub">
                <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-store"></i><span> Banking <span
                                class="float-right"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                <ul class="list-unstyled">
                    <li><a href="pages-timeline.html">Timeline</a></li>
                    <li><a href="pages-invoice.html">Invoice</a></li>
                    <li><a href="pages-directory.html">Directory</a></li>
                    <li><a href="pages-login.html">Login</a></li>
                    <li><a href="pages-register.html">Register</a></li>
                    <li><a href="pages-recoverpw.html">Recover Password</a></li>
                    <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                    <li><a href="pages-blank.html">Blank Page</a></li>
                    <li><a href="pages-404.html">Error 404</a></li>
                    <li><a href="pages-500.html">Error 500</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <div class="clearfix"></div>
</div> <!-- end sidebarinner -->