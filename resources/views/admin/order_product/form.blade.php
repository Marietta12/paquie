@extends('adminlte::page')

@section('title', 'Order_product')

@section('content_header')
    @if($order_product)
      <h1>Modification Ordre de produit</h1>
    @else
      <h1>Ajout Ordre de produit</h1>
    @endif  
@stop

@section('content')
    <section class="user-update">
        <div class="row">        
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" style="width: 100%;"><a href="#settings" data-toggle="tab" aria-expanded="true" style="font-size: 18px; font-weight: bold;">Informations Ordre de produit</a></li>
            </ul>
            <div class="tab-content">            

              <div class="tab-pane active" id="settings">
                  {!! Form::open(array('url' => ($order_product) ? route('order_product.update', ['order_product' => $order_product->id]) : route('order_product.store'),'files' => true,'class'=>'form-horizontal','id'=>'form-profil','method'=>($order_product) ? 'PATCH' : 'POST')) !!}

                  <div class="form-group">
                    <label for="inputNumorder_product" class="col-sm-3 control-label">Ordre de produit</label>
                    <input type="hidden" name="id" value="{{($order_product) ? $order_product->id : ''}}">
                    <div class="col-sm-9">
                      <input type="number" name="inputNumorder_product" class="form-control" id="inputNumorder_product" placeholder="Numero order_producte" value="{{ ($order_product) ? $order_product->order_id : '' }}">
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="inputIdProduct" class="col-sm-3 control-label">Id de produit</label>

                    <div class="col-sm-9">
                      <input type="number" name="inputIdProduct" class="form-control" id="inputIdProduct" placeholder="Id de produit" value="{{ ($order_product) ? $order_product->product_id : '' }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputQuantity" class="col-sm-3 control-label">Quantité</label>

                    <div class="col-sm-9">
                      <input type="number" name="inputQuantity" class="form-control" id="inputQuantity" placeholder="Quantité" value="{{ ($order_product) ? $order_product->quantity : '' }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputPrice" class="col-sm-3 control-label">Prix</label>

                    <div class="col-sm-9">
                      <input type="number" name="inputPrice" class="form-control" id="inputPrice" placeholder="Prix" value="{{ ($order_product) ? $order_product->price : '' }}">
                    </div>
                  </div> 

                  <div class="form-group">
                    <label for="inputSousTotal" class="col-sm-3 control-label">Sous total</label>

                    <div class="col-sm-9">
                      <input type="number" name="inputSousTotal" class="form-control" id="inputSousTotal" placeholder="Sous total" value="{{ ($order_product) ? $order_product->sous_total : '' }}">
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