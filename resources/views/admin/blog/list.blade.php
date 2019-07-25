@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1>Liste des blog</h1>
    <a class="btn btn-primary header-button" href="{{ route('blog.create') }}"> <i class="fa fa-plus"></i> Ajout</a>
@stop

@section('css')
    
@stop

@section('content')

    <section class="user-list">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="listblog" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Photo</th>                           
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
    {!! Html::script('js/admin/listBlog.js') !!}
  <script type="text/javascript">
    $(document).on('click', '.delete-btn', function(event) {
        event.preventDefault();
        var $form = jQuery(this).closest('form');
        $('#confirm').modal({backdrop: 'static', keyboard: false})
                .one('click', '#delete', function () {
                $form.trigger('submit'); // submit the form
        });
    });
     
      
  </script>  
@stop