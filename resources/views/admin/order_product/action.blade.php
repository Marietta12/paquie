<div class="btn-group">
    <a href="{{ Url('admin/order_product/'.$admin->id.'/edit/') }}"
       class="btn btn-default btn-sm btn-warning" title="Edit"><i
                class="fa fa-fw fa-edit" style="color:white;"></i></a>
    {!! Form::open(array('url' => route('order_product.destroy', [$admin->id]), 'class' => 'pull-left')) !!} &nbsp; &nbsp;
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn delete-btn btn-danger btn-sm','order_id'=>'Delete'] ) !!}
    {{ Form::close() }}
</div>
                                        