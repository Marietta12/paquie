@extends('adminlte::page')

@section('title', 'Category')

@section('content_header')
    @if($category)
      <h1>Modification Categorie</h1>
    @else
      <h1>Ajout Categorie</h1>
    @endif  
@stop

@section('content')
    <section class="user-update">
        <div class="row">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" style="width: 100%;"><a href="#settings" data-toggle="tab" aria-expanded="true" style="font-size: 18px; font-weight: bold;">Informations Categories</a></li>
            </ul>
            <div class="tab-content">            

              <div class="tab-pane active" id="settings">
                  {!! Form::open(array('url' => ($category) ? route('category.update', ['category' => $category->id]) : route('category.store'),'files' => true,'class'=>'form-horizontal','id'=>'form-category','method'=>($category) ? 'PATCH' : 'POST')) !!}

                  <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">Titre</label>
                    <input type="hidden" name="id" value="{{($category) ? $category->id : ''}}">
                    <div class="col-sm-9">
                      <input type="text" name="inputTitle" class="form-control" id="inputTitle" placeholder="Titre" value="{{ ($category) ? $category->title : '' }}">
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="inputDescription" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-9">
                      <input type="text" name="inputDescription" class="form-control" id="inputDescription" placeholder="Description" value="{{ ($category) ? $category->description : '' }}">
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="inputPhoto" class="col-sm-2 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" name="inputPhoto" class="form-control" id="inputPhoto" value="{{ ($category) ? $category->photo : '' }}">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-11">
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
  {!! Html::script('js/admin/listCategory.js') !!}
@stop