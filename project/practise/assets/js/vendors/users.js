jQuery(document).ready(function(){
		users_tbl = jQuery('#users_tbl').dataTable( {
        							"processing": true,
        							"serverSide": true,
									"iDisplayLength": 5,
						         	"ajaxSource": APPLICATION_URL+"administrator/users/dt_list/",
						         	"aoColumns": [
						            { "bSortable": false },
						            { "bSortable": true },
						            { "bSortable": true },
						            { "bSortable": true },
									{ "bSortable": false },
						            { "bSortable": false },
						            { "bSortable": false },
						            
						            	
						       	],
						       	"order":[['0','asc']],
						      	"sDom": "<'row'<'col-sm-6 col-xs-5'l><'col-sm-6 col-xs-7'f>r>t<'row'<'col-sm-5 hidden-xs'i><'col-sm-7 col-xs-12 clearfix'p>>",
						       	'fnDrawCallback' : function(oSettings){
						       		jQuery(".dataTables_length select").addClass('form-control');
						       		jQuery('.user_part').append(jQuery(".shift_portion").html());
						       		jQuery(".shift_portion").remove();
						       		jQuery('#user_tbl_filter').parents(".col-md-6:first").remove();
						       		jQuery(".user_part").parents(".row-fluid:first").append('<div class="clearfix"></div>');
		  							jQuery('.dataTables_paginate').parents('.row').show();
									jQuery('.dataTables_filter').show();		
						       	},
    	});
});    	
    	