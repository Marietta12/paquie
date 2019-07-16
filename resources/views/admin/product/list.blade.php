@extends('adminlte::page')

@section('title', 'Product')

@section('content_header')
    <h1>Liste des produits</h1>
    <a class="btn btn-primary header-button" href="{{ route('product.create') }}"> <i class="fa fa-plus"></i> Ajout</a>
@stop

@section('css')
    
@stop

@section('content')

    <section class="user-list">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="listproduct" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Prix</th>
                                <th>Catégories</th>              
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <!-- -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@stop

@section('js')
    {!! Html::script('js/admin/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('js/admin/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('js/admin/listProduct.js') !!}
  <script type="text/javascript">
    $(document).on('click', '.delete-btn', function(event) {
        event.preventDefault();
        var $form = jQuery(this).closest('form');
        $('#confirm').modal({backdrop: 'static', keyboard: false})
                .one('click', '#delete', function () {
                $form.trigger('submit'); // submit the form 
        });
    });

     /* $('.category-list').on('click','.form-check-input',function(){
        var category_id = $(this).closest('.switch').data('id');
        
        $.ajax({
            type: "POST",
            data: {'category_id':category_id},
            url: base_url + 'admin/category_status',
            error: function (error) {
                console.log(error);
            }
        });
          // if($(this).find('.form-check-input').prop('checked')){
          //   var user_id = $(this).data('id');
          // }else{
          //   console.log('false');
          // }
      });*/
      
  </script>  
@stop