jQuery(document).ready(function () {

     $("#form-faqs").validate({
      rules : {
        questions : {
          required : true
        },
        answers : {
          required : true,         
        }
      },
      messages : {
        questions : "Veuillez ajouter un titre",
        answers : "Veuillez ajouter votre identifiant"               
      },
      submitHandler: function(form) {
        form.submit();
      }
     });

    
    $('.select-brand, .select-product-status, .select-product-manager').popover({
        trigger: "hover"    
    });
    var table;

    if (jQuery('#listfaqs').length > 0) {
        table = jQuery('#listfaqs').on('preXhr.dt', function ( e, settings, data ) {
            } )
            .dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {   
                "url": base_url+"admin/get_faqs",
                "type": "GET"
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
                {data: 'questions', name:'questions',searchable: true, sortable: true},
                {data: 'answers', name:'answers',searchable: true, sortable: true},
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