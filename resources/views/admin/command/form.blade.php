@extends('adminlte::page')

@section('title', 'Command')

@section('content_header')
    @if($command)
      <h1>Modification Commande</h1>
    @else
      <h1>Ajout Commande</h1>
    @endif  
@stop

@section('content')
    <section class="user-update">
        <div class="row">        
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active" style="width: 100%;"><a href="#settings" data-toggle="tab" aria-expanded="true" style="font-size: 18px; font-weight: bold;">Informations Commandes</a></li>
            </ul>
            <div class="tab-content">            

              <div class="tab-pane active" id="settings">
                  {!! Form::open(array('url' => ($command) ? route('command.update', ['command' => $command->id]) : route('command.store'),'files' => true,'class'=>'form-horizontal','id'=>'form-profil','method'=>($command) ? 'PATCH' : 'POST')) !!}

                  <div class="form-group">
                    <label for="inputNumcommand" class="col-sm-3 control-label">Numero commande</label>
                    <input type="hidden" name="id" value="{{($command) ? $command->num_command : ''}}">
                    <div class="col-sm-9">
                      <input type="number" name="inputNumcommand" class="form-control" id="inputNumcommand" placeholder="Numero commande" value="{{ ($command) ? $command->num_command : '' }}">
                    </div>
                  </div>                  
                  <div class="form-group">
                    <label for="inputNbreProduct" class="col-sm-3 control-label">Nombre de produit</label>

                    <div class="col-sm-9">
                      <input type="number" name="inputNbreProduct" class="form-control" id="inputNbreProduct" placeholder="Nombre de produit" value="{{ ($command) ? $command->nbre_product : '' }}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputTotalprice" class="col-sm-3 control-label">Total de prix</label>

                    <div class="col-sm-9">
                      <input type="number" name="inputTotalprice" class="form-control" id="inputTotalprice" placeholder="Total de prix" value="{{ ($command) ? $command->total_price : '' }}">
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