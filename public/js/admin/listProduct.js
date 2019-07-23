
jQuery(document).ready(function () {

    
    $('.select-brand, .select-product-status, .select-product-manager').popover({
        trigger: "hover"    
    });
    var table;

    if (jQuery('#listproduct').length > 0) {
        table = jQuery('#listproduct').on('preXhr.dt', function ( e, settings, data ) {
            } )
            .dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {   
                "url": base_url+"admin/get_product",
                "type": "GET",
                error: function(responses, status, error){
                    console.log(responses);
                }
            },
            "responsive"   : true,
            "bPaginate"    : true,
            "bLengthChange": true,
            "bFilter"      : true,
            "bInfo"        : true,
            "bAutoWidth"   : false,
            "order"        : [[1, "desc"]],
            "lengthMenu"   : [20, 40, 60, 80, 100],
            "pageLength"   : 20,
            columns        : [
                {data: 'title', name:'title',searchable: true, sortable: true},
                {data: 'description', name:'description',searchable: true, sortable: true},
                {data: 'prix', name:'prix',searchable: true, sortable:true},
                {data: 'category_id', name:'category_id',searchable: true, sortable:true},
                {data: 'action', name:'action',searchable: false, sortable: false}               
            ],
            fnDrawCallback : function () {
                var $paginate = this.siblings('.dataTables_paginate');

                if (this.api().data().length <= this.fnSettings()._iDisplayLength) {
                    $paginate.hide();
                }
                else {
                    $paginate.show();
                }
             },
             "language": {
                 "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
              }
        });
    }
    
});