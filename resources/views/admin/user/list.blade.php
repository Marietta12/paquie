@extends('adminlte::page')

@section('title', 'Profil')

@section('content_header')
    <h1>Liste des utilisateurs</h1>
    <a class="btn btn-primary header-button" href="{{ route('user.create') }}"> <i class="fa fa-plus"></i> Ajout</a>
@stop

@section('css')
    
@stop

@section('content')

    <section class="user-list">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nom et Pr&eacute;nom</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
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
    {!! Html::script('js/admin/list.js') !!}
  <script type="text/javascript">
    $(document).on('click', '.delete-btn', function(event) {
        event.preventDefault();
        var $form = jQuery(this).closest('form');
        $('#confirm').modal({backdrop: 'static', keyboard: false})
                .one('click', '#delete', function () {
                $form.trigger('submit'); // submit the form
        });
    });

      $('.user-list').on('click','.form-check-input',function(){
        var user_id = $(this).closest('.switch').data('id');
        
        $.ajax({
            type: "POST",
            data: {'user_id':user_id},
            url: base_url + 'admin/user_status',
            success: function (success) {
                if (success.status == 1){
                    toastr.success('Utilisateur activé');
                }
                else{
                    toastr.warning('Utilisateur desactivé');
                }
            },
            error: function (error) {
                console.log(error);
            }
        });
          // if($(this).find('.form-check-input').prop('checked')){
          //   var user_id = $(this).data('id');
          // }else{
          //   console.log('false');
          // }
      });
      
  </script>  
@stop