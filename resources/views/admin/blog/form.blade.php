@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    @if($blog)
      <h1>Modification Blog</h1>
    @else
      <h1>Ajout Blog</h1>
    @endif  
@stop

@section('content')
    <section class="user-update">
        <div class="row">
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" style="width: 100%;"><a href="#settings" data-toggle="tab" aria-expanded="true" style="font-size: 18px; font-weight: bold;">Informations Blog</a></li>
            </ul>
            <div class="tab-content">            

              <div class="tab-pane active" id="settings">
                  {!! Form::open(array('url' => ($blog) ? route('blog.update', ['blog' => $blog->id]) : route('blog.store'),'files' => true,'class'=>'form-horizontal','id'=>'form-profil','method'=>($blog) ? 'PATCH' : 'POST')) !!}

                  <div class="form-group">
                    <label for="inputTitle" class="col-sm-3 control-label">Titre</label>
                    <input type="hidden" name="id" value="{{($blog) ? $blog->id : ''}}">
                    <div class="col-sm-9">
                      <input type="text" name="inputTitle" class="form-control" id="inputTitle" placeholder="Titre" value="{{ ($blog) ? $blog->title : '' }}">
                    </div>
                  </div>    
                   <div class="form-group">
                    <label for="inputTitle" class="col-sm-3 control-label">User_id</label>
                    <input type="hidden" name="id" value="{{($blog) ? $blog->id : ''}}">
                    <div class="col-sm-9">
                      <input type="text" name="inputIdUser" class="form-control" id="inputIdUser" placeholder="User Id" value="{{ ($blog) ? $blog->user_id : '' }}">
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="inputDescription" class="col-sm-3 control-label">Description</label>

                    <div class="col-sm-9">
                      <input type="text" name="inputDescription" class="form-control" id="inputDescription" placeholder="Description" value="{{ ($blog) ? $blog->description : '' }}">
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="inputPhoto" class="col-sm-3 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" name="inputPhoto" class="form-control" id="inputPhoto" value="{{ ($blog) ? $blog->photo : '' }}">
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
  <!-- {!! Html::script('js/admin/user.js') !!} -->
@stop