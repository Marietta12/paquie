@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    @if($product)
      <h1>Modification Produit</h1>
    @else
      <h1>Ajout Produit</h1>
    @endif  
@stop

@section('content')
    <section class="user-update">
        <div class="row">        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" style="width: 100%;"><a href="#settings" data-toggle="tab" aria-expanded="true" style="font-size: 18px; font-weight: bold;">Informations Produits</a></li>
            </ul>
            <div class="tab-content">            

              <div class="tab-pane active" id="settings">
                  {!! Form::open(array('url' => ($product) ? route('product.update', ['product' => $product->id]) : route('product.store'),'files' => true,'class'=>'form-horizontal','id'=>'form-product','method'=>($product) ? 'PATCH' : 'POST')) !!}

                  <div class="form-group">
                    <label for="inputTitle" class="col-sm-2 control-label">Titre</label>
                    <input type="hidden" name="id" value="{{($product) ? $product->id : ''}}">
                    <div class="col-sm-9">
                      <input type="text" name="inputTitle" class="form-control" id="inputTitle" placeholder="Titre" value="{{ ($product) ? $product->title : '' }}">
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="inputDescription" class="col-sm-2 control-label">Description</label>

                    <div class="col-sm-9">
                      <input type="text" name="inputDescription" class="form-control" id="inputDescription" placeholder="Description" value="{{ ($product) ? $product->description : '' }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPrix" class="col-sm-2 control-label">Prix</label>

                    <div class="col-sm-9">
                      <input type="text" name="inputPrice" class="form-control" id="inputPrice" placeholder="Prix" value="{{ ($product) ? $product->prix : '' }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPrix" class="col-sm-2 control-label">Categories</label>

                    <div class="col-sm-9">
                      <select name="inputCategory">
                        @foreach($categorys as $category)
                        <option value="{{$category->id}}">{{ $category->title }}</option>
                        @endforeach
                      </select> 
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPhoto" class="col-sm-2 control-label">Photo</label>

                    <div class="col-sm-9">
                      <input type="file" name="inputPhoto" class="form-control" id="inputPhoto" value="{{ ($product) ? $product->photo : '' }}">
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
  {!! Html::script('js/admin/listProduct.js') !!}
  <!-- {!! Html::script('js/admin/listCategory.js') !!} -->
@stop