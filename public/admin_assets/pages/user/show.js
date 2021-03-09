$(document).ready(function(){
	console.log("User show");
	console.log(base_url);

	$('#laravel_datatable').DataTable({
		processing: true,
		serverSide: true,
		retrieve: true,
		"ordering": false,
		ajax: base_url+'/admin/user/trip_history?user_id='+user_id+'&&status=0',
		columns: [
			{ data: 'number_key', name: 'number_key' },
			{ data: 'trip_reference_id', name: 'trip_reference_id' },
			{ data: 'delivery_user_name', name: 'delivery_user_name' },
			{ data: 'from', name: 'from' },
			{ data: 'to', name: 'to' },
			{ data: 'charge', name: 'charge' },
			{ data: 'status', name: 'status',
				/*render: function (data, type, column, meta) {
						
						html = '';
						html += '<div class="select-class">';
						html +='<select name="order-status-change" class="order-status-change"  trip_id="'+column.trip_id+'">';
						html += '<option value="0"';
						if(data == 0){
							html += 'selected';
						}
						html +=  '>Pending</option>';
						html += '<option value="1"';
						if(data == 1){
							html += 'selected';
						}
						html +='>Completed</option>';
						html += '<option value="2"';
						if(data == 2){
							html += 'selected';
						}
						html +='>Rejected</option>';
						html += '</select>';
						html += '<div>';
						//data = 0;
						return html;
					}*/
			},

			{ data: 'trip_id', name: 'trip_id' , 
				render: function (data, type, column, meta) {
				return '<div class="btns">'+
					'<a href="'+base_url+'/admin/trip/show/'+column.trip_id+'"><button class="eye"><i class="fa fa-eye"></i></button></a>'+
					
					'</div>' ;
				}
			}
		]
	});

	$('body').on('click','.ongoing-order-history', function() {
	var user_id = $(this).attr("user-id");
		$('#laravel_datatable').DataTable({
			processing: true,
			serverSide: true,
			retrieve: true,
			"ordering": false,
			ajax: base_url+'/admin/user/trip_history?user_id='+user_id+'&&status=0',
			columns: [
				{ data: 'number_key', name: 'number_key' },
				{ data: 'trip_reference_id', name: 'trip_reference_id' },
				{ data: 'delivery_user_name', name: 'delivery_user_name' },
				{ data: 'from', name: 'from' },
				{ data: 'to', name: 'to' },
				{ data: 'charge', name: 'charge' },
				{ data: 'status', name: 'status',
					/*render: function (data, type, column, meta) {
							
							html = '';
							html += '<div class="select-class">';
							html +='<select name="order-status-change" class="order-status-change"  trip_id="'+column.trip_id+'">';
							html += '<option value="0"';
							if(data == 0){
								html += 'selected';
							}
							html +=  '>Pending</option>';
							html += '<option value="1"';
							if(data == 1){
								html += 'selected';
							}
							html +='>Completed</option>';
							html += '<option value="2"';
							if(data == 2){
								html += 'selected';
							}
							html +='>Rejected</option>';
							html += '</select>';
							html += '<div>';
							//data = 0;
							return html;
						}*/
				},

				{ data: 'trip_id', name: 'trip_id' , 
					render: function (data, type, column, meta) {
					return '<div class="btns">'+
						'<a href="'+base_url+'/admin/trip/show/'+column.trip_id+'"><button class="eye"><i class="fa fa-eye"></i></button></a>'+
						
						'</div>' ;
					}
				}
			]
		});
	});

	$('body').on('click','.repeat-order-history', function() {
		var user_id = $(this).attr("user-id");
		console.log(user_id);
		$('#laravel_datatable2').DataTable({
			processing: true,
			serverSide: true,
			retrieve: true,
			"ordering": false,
			ajax: base_url+'/admin/user/trip_history?user_id='+user_id+'&&status=1',
			columns: [
				{ data: 'number_key', name: 'number_key' },
				{ data: 'trip_reference_id', name: 'trip_reference_id' },
				{ data: 'delivery_user_name', name: 'delivery_user_name' },
				{ data: 'from', name: 'from' },
				{ data: 'to', name: 'to' },
				{ data: 'charge', name: 'charge' },
				{ data: 'status', name: 'status',
					/*render: function (data, type, column, meta) {
							
							html = '';
							html += '<div class="select-class">';
							html +='<select name="order-status-change" class="order-status-change"  trip_id="'+column.trip_id+'">';
							html += '<option value="0"';
							if(data == 0){
								html += 'selected';
							}
							html +=  '>Pending</option>';
							html += '<option value="1"';
							if(data == 1){
								html += 'selected';
							}
							html +='>Completed</option>';
							html += '<option value="2"';
							if(data == 2){
								html += 'selected';
							}
							html +='>Rejected</option>';
							html += '</select>';
							html += '<div>';
							//data = 0;
							return html;
						}*/
				},

				{ data: 'trip_id', name: 'trip_id' , 
					render: function (data, type, column, meta) {
					return '<div class="btns">'+
						'<a href="'+base_url+'/admin/trip/show/'+column.trip_id+'"><button class="eye"><i class="fa fa-eye"></i></button></a>'+
						
						'</div>' ;
					}
				}
			]
		});
	});

	$('body').on('click','.order-history', function() {
		var user_id = $(this).attr("user-id");
		console.log(user_id);
		$('#laravel_datatable3').DataTable({
			processing: true,
			serverSide: true,
			retrieve: true,
			"ordering": false,
			ajax: base_url+'/admin/user/trip_history?user_id='+user_id+'&&status=2',
			columns: [
				{ data: 'number_key', name: 'number_key' },
				{ data: 'trip_reference_id', name: 'trip_reference_id' },
				{ data: 'delivery_user_name', name: 'delivery_user_name' },
				{ data: 'from', name: 'from' },
				{ data: 'to', name: 'to' },
				{ data: 'charge', name: 'charge' },
				{ data: 'status', name: 'status',
					/*render: function (data, type, column, meta) {
							
							html = '';
							html += '<div class="select-class">';
							html +='<select name="order-status-change" class="order-status-change"  trip_id="'+column.trip_id+'">';
							html += '<option value="0"';
							if(data == 0){
								html += 'selected';
							}
							html +=  '>Pending</option>';
							html += '<option value="1"';
							if(data == 1){
								html += 'selected';
							}
							html +='>Completed</option>';
							html += '<option value="2"';
							if(data == 2){
								html += 'selected';
							}
							html +='>Rejected</option>';
							html += '</select>';
							html += '<div>';
							//data = 0;
							return html;
						}*/
				},

				{ data: 'trip_id', name: 'trip_id' , 
					render: function (data, type, column, meta) {
					return '<div class="btns">'+
						'<a href="'+base_url+'/admin/trip/show/'+column.trip_id+'"><button class="eye"><i class="fa fa-eye"></i></button></a>'+
						
						'</div>' ;
					}
				}
			]
		});
	});


	$('body').on('change','.driver-status-change', function() {
		var trip_id = $(this).attr("trip_id");
		status      =this.value;
		console.log('status===='+status)
		console.log('trip_id===='+trip_id)
		//return false;

		//status=$(this).closest('tr').find('.active-status-change').val();

		if(status==0){
			var success_status='Order Status Change';
		}else{
			var success_status='Order Status Change';
		}
		path='admin/driver/order_status_change/';

		$.ajax({
			"headers":{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			},
			'type':'PUT',
			'url' :  base_url + '/' +path,
			'data' : {  trip_id : trip_id, status:status },
			'beforeSend': function() {

			},
			'success' : function(response){
			if(response.status == 'success'){
				swal(success_status ,response.message, 'success')
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
});