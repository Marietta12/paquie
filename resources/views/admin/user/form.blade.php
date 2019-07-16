@extends('adminlte::page')

@section('title', 'Profil')

@section('content_header')
    @if($user)
      <h1>Modification utilisateur</h1>
    @else
      <h1>Ajout utilisateur</h1>
    @endif  
@stop

@section('content')
    <section class="user-update">
        <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle img-profil" src="{{ $user ? (($user->photo =='' || !isset($user->photo)) ? url('image/Admin/Profil/avatar.png') : url('image/Admin/Profil/'.$user->photo.'')) : url('image/Admin/Profil/avatar.png')}}" alt="User profile picture">

              <h3 class="profile-username text-center user_name">{{ $user ? $user->name : '' }}</h3>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" style="width: 100%;"><a href="#settings" data-toggle="tab" aria-expanded="true" style="font-size: 18px; font-weight: bold;">Informations du compte</a></li>
            </ul>
            <div class="tab-content">            

              <div class="tab-pane active" id="settings">
                  {!! Form::open(array('url' => ($user) ? route('user.update', ['user' => $user->id]) :route('user.store'),'files' => true,'class'=>'form-horizontal','id'=>'form-profil','method'=>($user) ? 'PATCH' : 'POST')) !!}

                  <div class="form-group">
                    <label for="inputName" class="col-sm-3 control-label">Nom et Pr&eacute;nom</label>
                    <input type="hidden" name="id" value="{{ $user ? (isset($user->id) ? $user->id : '') : '' }}">
                    <div class="col-sm-9">
                      <input type="text" name="inputName" class="form-control" id="inputName" placeholder="Nom" value="{{ $user ? (isset($user->name) ? $user->name : '') : '' }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" name="inputEmail" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user ? (isset($user->email) ? $user->email : '') : '' }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhone" class="col-sm-3 control-label">Téléphone</label>

                    <div class="col-sm-9">
                      <input type="text" name="inputPhone" class="form-control" id="inputPhone" placeholder="Téléphone" value="{{ $user ? (isset($user->phone) ? $user->phone : '') : '' }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-sm-3 control-label">Mot de passe</label>

                    <div class="col-sm-9">
                      <input type="password" name="inputPassword" class="form-control" id="inputPassword" placeholder="Mot de passe">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputConfirmPassword" class="col-sm-3 control-label">Confirmez le mot de passe</label>

                    <div class="col-sm-9">
                      <input type="password" name="inputConfirmPassword" class="form-control" id="inputConfirmPassword" placeholder="Confirmez le mot de passe">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus" class="col-sm-3 control-label">Status </label>

                    <div class="col-sm-9">
                      <input type="hidden" name="inputStatus" value="{{($user) ? $user->status : '0'}}">
                      <input type="checkbox" name="status" class="form-check-input" id="inputStatus" {{ $user ? (($user->status == 1) ? 'checked' : '') : '' }} >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPhoto" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" name="inputPhoto" class="form-control" id="inputPhoto">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-12">
                      <button type="submit" class="btn pull-right  btn-success">Enregistrer</button>
                    </div>
                  </div>
                {!! Form::close() !!}
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
    </section>
@stop

@section('js')
  {!! Html::script('js/admin/user.js') !!}
@stop