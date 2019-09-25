@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
      <section class="">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{count($users)}}</h3>

              <p>Utilisateurs</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('admin/user') }}" class="small-box-footer">Plus de détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{count($orders)}}</h3>

              <p>Commandes</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Plus de détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{count($products)}}</h3>

              <p>Produits</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('admin/product') }}" class="small-box-footer">Plus de détails <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
      </div>
      <!-- /.row -->
      </section>
      <section class="row">
        <!--  -->
        <div class="col-lg-12">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Dernières commandes</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Date de la cmd</th>
                    <th>Nom Client</th>
                    <th>Table</th>
                    <th>Nbr Menu</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($allorders as $keys=>$anorder)
                    <tr data-toggle="collapse" data-target="#collapseOne{{ $keys }}" aria-expanded="true" aria-controls="collapseOne" class="clickable" id="cmd{{ $keys }}">
                      <td >{{ ($anorder) ? $anorder['order']->created_at : '' }}</td>
                      <td >{{ ($anorder) ? $anorder['order']->client_name : '' }}</td>                      
                      <td >{{ ($anorder) ? $anorder['order']->table_client_nbr : '' }} </td>                      
                      <td >{{ ($anorder) ? sizeof($anorder['products']) : '0' }} </td>                      
                      <td>
                        @if($anorder)
                          @switch($anorder['order']->status)
                            @case(0)
                              <span class="label label-warning">Non Traité</span>      
                            @break
                            @case(1)
                              <span class="label label-info">Traité</span>      
                            @break
                            @case(2)
                              <span class="label label-success">Terminé</span>      
                            @break
                          @endswitch
                        @endif
                        
                      </td>
                    </tr>
                    <tr id="collapseOne{{ $keys }}" class="collapse bg-info" aria-labelledby="headingOne" data-parent="#accordionExample" data-nbr="{{ $keys }}">
                      <td></td>
                      <td colspan="4">
                        @foreach($anorder['products'] as $k=>$product)
                          <p>
                            Menu: {{ $product->title }} | Prix Unitaire: {{ $product->prix }} Ar | Quantité: {{ $anorder['quantities'][$k] }}
                          </p>
                        @endforeach
                        <p>
                          Montant total: {{ ($anorder) ? $anorder['order']->total_price : '' }} Ar
                        </p>

                        <div class="d-flex">
                          <div class="form-check form-check-inline">
                            <button class="btn btn-sm btn-warning btn-check">
                              @if($anorder['order']->status == 0)
                                <i class="fa fa-check-square valeur" data-valeur="0" data-id="{{ $anorder['order']->id }}"></i>
                              @else
                                <i class="fa fa-square valeur" data-valeur="0" data-id="{{ $anorder['order']->id }}"></i>
                              @endif 
                              Non Traité
                            </button>
                            
                          </div>
                          <div class="form-check form-check-inline">
                            <button class="btn btn-sm btn-info btn-check">
                              @if($anorder['order']->status == 1)
                                <i class="fa fa-check-square valeur" data-valeur="1" data-id="{{ $anorder['order']->id }}"></i>
                              @else
                                <i class="fa fa-square valeur" data-valeur="1" data-id="{{ $anorder['order']->id }}"></i>
                              @endif
                              Traité
                            </button>
                          </div>
                          <div class="form-check form-check-inline">
                            <button class="btn btn-sm btn-success btn-check">
                              @if($anorder['order']->status == 2)
                                 <i class="fa fa-check-square valeur" data-valeur="2" data-id="{{ $anorder['order']->id }}"></i>
                              @else
                               <i class="fa fa-square valeur" data-valeur="2" data-id="{{ $anorder['order']->id }}"></i>
                              @endif
                              Terminé
                          </button>
                          </div>
                        </div>
                          
                      </td>
                      
                    </tr>

                    @endforeach
                  <!-- <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-info">Processing</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR1848</a></td>
                    <td>Samsung Smart TV</td>
                    <td><span class="label label-warning">Pending</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR7429</a></td>
                    <td>iPhone 6 Plus</td>
                    <td><span class="label label-danger">Delivered</span></td>
                  </tr>
                  <tr>
                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                    <td>Call of Duty IV</td>
                    <td><span class="label label-success">Shipped</span></td>
                  </tr> -->
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Nouvelle commande</a>
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Toutes les commandes</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>  
        <!--  -->
          </section>
@stop

@section('js')
  {!! Html::script('js/admin/status.js') !!}
@stop