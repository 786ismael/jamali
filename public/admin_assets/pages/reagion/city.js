$(document).ready(function(){

	var Datatables = $('#laravel_datatable').DataTable({
		processing: true,
		serverSide: true,
		"ordering": false,
		destroy: true,
		ajax: base_url+'/admin/city/'+$('[data_id]').attr('data_id'),

		columns: [
			{ data: 'number_key', name: 'number_key' },

			{ data: 'name', name: 'name' },

			{ data: 'status', name: 'status',
				render: function (data, type, column, meta) {
					if(column.status==1){
						var cheked="checked";
					}else{
						var cheked="";
					}
					return '<label class="switch">'+
					'<input type="checkbox" '+cheked+' class="active-status-change" value="'+column.status+'" city_id="'+column.city_id+'">'+
					'<span class="slider round"></span>'+
					'</label>' ;
				}
			},

			{ data: 'id', name: 'id' ,
				render: function (data, type, column, meta) {
				return '<div class="btns">'+
					'<a href="'+base_url+'/admin/city/edit/'+column.city_id+'"><button class="pen"><i class="fa fa-pencil"></i></button></a>'+
					'<button class="pen delete" data_delete="'+column.city_id+'"><i class="fa fa-trash"></i></a>'+
					'</div>' ;
				}
			}
		]
	});

	$('body').on('click','.delete', function() {
        var delete_id = $('[data_delete]').attr('data_delete');
        var path='admin/city/delete';

        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this record!",
            icon: "warning",
            buttons: [
              'No, cancel it!',
              'Yes, I am sure!'
            ],
            dangerMode: true,
         },
         function(isConfirm){

           if (isConfirm){

            $.ajax({
                "headers":{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                },
                'type':'POST',
                'url' :  base_url + '/' +path,
                'data' : {  id : delete_id },
                'beforeSend': function() {

                },
                'success' : function(response){
                if(response.status == 1){
                    swal(response.status ,response.message, 'success');
                    setTimeout(function(){
                        window.location.reload();
                    },2000);
                    }
                },
                'error' :  function(errors){
                    console.log(errors);
                },
                'complete': function() {

                }
            });

            } else {
                swal("Cancelled", "Your Record is safe :)", "error");
            }
         });
    });

	$('body').on('click','.active-status-change', function() {
		var city_id = $(this).attr("city_id");
		//status=$('.active-status-change').val();
		status=$(this).closest('tr').find('.active-status-change').val();
        if(status == 1){
            success_status = 'Deactivated';
        }else{
            success_status = 'Activated';
        }
		path='admin/active_city_status_change';

		$.ajax({
            "headers":{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            },
            'type':'GET',
            'url' :  base_url + '/' +path,
            'data' : {  id : city_id, status:status },
            'beforeSend': function() {

            },
                'success' : function(response){
			if(response.status == 'success'){
				swal(success_status ,response.message, 'success')
				$('.active-status-change').val(response.data.status);
					if(status==1){
						$(this).closest('tr').find('.active-status-change').prop('checked', false);
					}else{
						$(this).closest('tr').find('.active-status-change').prop('checked', true);
					}
				}
			},
			'error' :  function(errors){
				console.log(errors);
			},
			'complete': function() {

			}
		});
	});

});
