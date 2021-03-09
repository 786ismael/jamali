$(document).ready(function(){
	console.log("Orders");
	console.log(base_url);
	$('#laravel_datatable').DataTable({
		processing: true,
		serverSide: true,
		"ordering": false,
		ajax: base_url+'/admin/order',
		//dom: 'lBfrtip',
		//"scrollX": false,
		/*buttons:[
		'copy', 'csv', 'pdf', 'print'
		],*/
		//"lengthMenu": [ 10, 50, 100, 500],
		columns: [
			{ data: 'number_key', name: 'number_key' },
			{ data: 'user_name', name: 'user_name' },
			{ data: 'vendor_user_name', name: 'vendor_user_name' },
			{ data: 'service_name', name: 'service_name' },
			{ data: 'service_amount', name: 'service_amount'},
			{ data: 'appointment_date', name: 'appointment_date' },
			{ data: 'appointment_time', name: 'appointment_time' },
			{ data: 'status', name: 'status' },
			/*{ data: 'status', name: 'status',
				render: function (data, type, column, meta) {
						//console.log('order_id=>'+column.order_id);
						html = '';
						html += '<div class="select-class">';
						html +='<select name="order-status-change" class="order-status-change"  order_id="'+column.order_id+'">';
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
					}
			},*/

			{ data: 'appointment_id', name: 'appointment_id' , 
				render: function (data, type, column, meta) {
				return '<div class="btns">'+
					'<a href="'+base_url+'/admin/order/show/'+column.appointment_id+'"><button class="eye"><i class="fa fa-eye"></i></button></a>'+
					//'<a href="'+base_url+'/admin/order/edit/'+column.order_id+'"><button class="pen"><i class="fa fa-pencil"></i></button></a>'+
					'</div>' ;
				}
			}
		]
	});

	$('body').on('change','.trip-status-change', function() {
		var order_id = $(this).attr("order_id");
		status      =this.value;
		console.log('status===='+status)
		console.log('order_id===='+order_id)
		//return false;

		//status=$(this).closest('tr').find('.active-status-change').val();

		if(status==0){
			var success_status='Order Status Change';
		}else{
			var success_status='Order Status Change';
		}
		path='admin/trip/order_status_change/';

		$.ajax({
			"headers":{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			},
			'type':'PUT',
			'url' :  base_url + '/' +path,
			'data' : {  order_id : order_id, status:status },
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