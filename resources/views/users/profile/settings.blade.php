@extends('layouts.master')
@section('content')
<h3>
  Client Settings {{ Auth::user()->name }}
</h3>
<div class="col-lg-10">
  <div class="panel panel-default">
    <div class="panel-heading">Control Panel</div>
    <div class="panel-body">
      <ul class="nav nav-pills">
        <li class="active"><a href="#home-pills" data-toggle="tab" aria-expanded="true">Introduction</a></li>
        <li class=""><a href="#profile-pills" data-toggle="tab" aria-expanded="false">Edit Profile</a></li>
        {{--
        <li class=""><a href="#messages-pills" data-toggle="tab" aria-expanded="false">Cambiar contraseña</a></li>
        <li class=""><a href="#settings-pills" data-toggle="tab" aria-expanded="false">Settings</a></li> --}}
      </ul>
      <div class="tab-content">
        <div id="home-pills" class="tab-pane fade active in">
          <br>
          <h4>Introduction</h4>
          <p>{{ config('app.name') }} welcomes you {{ Auth::user()->name }},
          </p>
          <p>Welcome to {{ config('app.name') }}, We are on a mision to provide financial solutions. We curretly have an investment community that is focused on the growth of an investor's capital When you are our client you will have an advisor asigned to complete your financial goals, generating a solid in a long term relationship</p>
          <p>If you need any assistance please follow  <a href="{{ route('contactbroker') }}">this link</a>            </p>
          <p>
            Sincerly,
          </p>
          <p>
            Client Services <br> {{config('app.name')}}
          </p>

        </div>
        <div id="profile-pills" class="tab-pane fade">
          <h4>Edit Profile</h4>
          <div class="form-group">
            <form action="{{ route('userupdate', Auth::id()) }}" method="post">
              {{ csrf_field() }} {{ method_field('PUT') }}
              <div class="col-sm-10">
                <div class="row">
                  <div class="col-sm-6">
                    <label class="col-sm-4 control-label">Tel Mobil</label>
                    <input type="text" name="mobile" class="form-control" value="{{ Auth::user()->mobile, old('mobile') }}">
                    <span class="help-block">Telephone</span>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-sm-2 control-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ Auth::user()->email, old('email') }}">
                    <span class="help-block">Email Address</span>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-sm-2 control-label">Telephone</label>
                    <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone, old('phone') }}">
                    <span class="help-block">Telephone</span>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-sm-2 control-label">País</label>
                    <input type="text" name="country" class="form-control" value="{{ Auth::user()->country, old('country') }}">
                    <span class="help-block">Residence Country</span>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-sm-2 control-label">Occupation</label>

                    <input type="text" name="ocupacion" class="form-control" value="{{ Auth::user()->ocupacion, old('ocupacion') }}">
                    <span class="help-block">Occupation</span>
                  </div>
                  <div class="col-sm-6">
                    <label class="col-sm-2 control-label">Beneficiary</label>

                    <input type="text" name="beneficiary" class="form-control" value="{{ Auth::user()->beneficiary, old('beneficiary') }}">
                    <span class="help-block">Account beneficiary</span>
                  </div>
                  {{-- inicio de imagen --}} {{--
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Subir Imagen</label>
                    <div class="col-sm-4">
                      <input type="file" name="foto" data-classbutton="btn btn-default" data-classinput="form-control inline" class="filestyle form-control"
                        id="filestyle-0" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);">

                    </div>
                  </div> --}} {{-- fin imagen --}}

                  <input type="submit" class="btn btn-primary pull-right" value="Actualizar">
                </div>
              </div>

          </div>

          </form>
        </div>
        {{--
        <div id="messages-pills" class="tab-pane fade">
          <h4>Cambiar Contraseña</h4>
          <p>Esta carecteristica esta en desarrollo si desea cambiar la contraseña deb
          </p>
        </div> --}} {{--
        <div id="settings-pills" class="tab-pane fade">
          <h4>Settings</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div> --}}
      </div>
    </div>
  </div>
</div>
@endsection