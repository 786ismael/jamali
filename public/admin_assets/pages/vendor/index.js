$(document).ready(function(){
	
	var Datatables = $('#laravel_datatable').DataTable({
		processing: true,
		serverSide: true,
		"ordering": false,
		destroy: true,
		ajax: base_url+'/admin/vendor',

		columns: [
			{ data: 'number_key', name: 'number_key' },

			{ data: 'profile_image', name: 'profile_image' , 
				render: function (data, type, column, meta) {
					return '<div class="img">'+
					'<img src="'+column.profile_image+'">'+
					'</div>' ;
				}
			},
			{ data: 'vendor_type', name: 'vendor_type' , 
				render: function (data, type, column, meta) {
					if(column.vendor_type == '1'){
						return 'Artisat';
					}else{
						return 'Salon';
					}
				}
			},
			{ data: 'user_name', name: 'user_name' },

			{ data: 'email', name: 'email' },

			{ data: 'phone_number', name: 'phone_number' },
			
			{ data: 'active_status', name: 'active_status',
				render: function (data, type, column, meta) {
					if(column.active_status==1){
						var cheked="checked";
					}else{
						var cheked="";
					}
					return '<label class="switch">'+
					'<input type="checkbox" '+cheked+' class="active-status-change" value="'+column.active_status+'" user_id="'+column.id+'">'+
					'<span class="slider round"></span>'+
					'</label>' ;
				}
			},

			{ data: 'approve_status', name: 'approve_status',
				render: function (data, type, column, meta) {
					if(column.approve_status==1){
						var cheked="checked";
					}else{
						var cheked="";
					}
					return '<label class="switch">'+
					'<input type="checkbox" '+cheked+' class="approve-status-change" value="'+column.approve_status+'" user_id="'+column.id+'">'+
					'<span class="slider round"></span>'+
					'</label>' ;
				}
			},
			{ data: 'id', name: 'id' , 
				render: function (data, type, column, meta) {
				return '<div class="btns">'+
					/*'<a href="'+base_url+'/admin/driver/edit/'+column.id+'"><button class="pen"><i class="fa fa-pencil"></i></button></a>'+*/
					'<a href="'+base_url+'/admin/vendor/show/'+column.id+'"><button class="eye"><i class="fa fa-eye"></i></button></a>'+
					'</div>' ;
				}
			}
		]
	});

	$('body').on('click','.active-status-change', function() {
		var user_id = $(this).attr("user_id");
		//status=$('.active-status-change').val();
		status=$(this).closest('tr').find('.active-status-change').val();

		if(status==0){
			var success_status='Activate';
		}else{
			var success_status='Deactivate';
		}
		path='admin/vendor/active_status_change/';

		$.ajax({
			"headers":{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			},
			'type':'PUT',
			'url' :  base_url + '/' +path,
			'data' : {  id : user_id, status:status },
			'beforeSend': function() {

			},
			'success' : function(response){
			if(response.status == 'success'){
				swal(success_status ,response.message, 'success')
				$('.active-status-change').val(response.data.active_status);
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

	$('body').on('click','.approve-status-change', function() {
		//console.log("Ganesh");
		//return false;
		var user_id = $(this).attr("user_id");
		//status=$('.active-status-change').val();
		status=$(this).closest('tr').find('.approve-status-change').val();

		if(status==0){
			var success_status='Approved';
		}else{
			var success_status='Unapproved';
		}
		path='admin/vendor/approve_status_change/';

		$.ajax({
			"headers":{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			},
			'type':'PUT',
			'url' :  base_url + '/' +path,
			'data' : {  id : user_id, status:status },
			'beforeSend': function() {

			},
			'success' : function(response){
			if(response.status == 'success'){
				swal(success_status ,response.message, 'success')
				$('.active-status-change').val(response.data.active_status);
					/*if(status==1){
						$(this).closest('tr').find('.active-status-change').prop('checked', false);
					}else{
						$(this).closest('tr').find('.active-status-change').prop('checked', true);
					}*/
				}
			},
			'error' :  function(errors){
				console.log(errors);
			},
			'complete': function() {

			}
		});
	});

	$('body').on('change','.approve-status-change', function() {
		//console.log("Ganesh");
		//return false;
		var user_id = $(this).attr("user_id");
		//status=$('.active-status-change').val();
		status=$(this).closest('tr').find('.approve-status-change').val();

		if(status==0){
			var success_status='Approved';
		}else{
			var success_status='Unapproved';
		}
		path='admin/vendor/approve_status_change/';

		$.ajax({
			"headers":{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			},
			'type':'PUT',
			'url' :  base_url + '/' +path,
			'data' : {  id : user_id, status:status },
			'beforeSend': function() {

			},
			'success' : function(response){
			if(response.status == 'success'){
				swal(success_status ,response.message, 'success')
				$('.active-status-change').val(response.data.active_status);
					/*if(status==1){
						$(this).closest('tr').find('.active-status-change').prop('checked', false);
					}else{
						$(this).closest('tr').find('.active-status-change').prop('checked', true);
					}*/
				}
			},
			'error' :  function(errors){
				console.log(errors);
			},
			'complete': function() {

			}
		});
	});

	$('select[name="vendor_type"]').on('change',function(e){
		Datatables.column(2).search($(this).val()).draw();
	});

});