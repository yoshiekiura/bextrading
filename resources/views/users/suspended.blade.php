@extends('layouts.master')
@section('content')
    <!-- HOME -->
    <section class="home home-small" id="home">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-wrapper home-intro row vertical-content">

                        <div class="col-md-6 col-sm-8">
                            <div class="tabbable-panel">
                                <div class="tabbable-line">
                                    <div class="tab-content tab-content-BuySell m-t-9">

                                        <div class="tab-pane active" id="tab_default_2">
                                            <div class="panel panel-body">
                                                <form class="intro-form" action="#" id="invite-2" method="POST">
                                                    <h5><i class="fa fa-lock"></i>  ¡Su cuenta está <span>suspendida!</span> por falta de pago mayor a 90 días.</h5>
                                                </form>
                                                <span id="result"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- END HOME -->
@endsection
