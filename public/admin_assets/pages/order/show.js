$(document).ready(function(){
	console.log("Order Show Js");
	console.log(base_url);
	$('#laravel_datatable').DataTable({
		processing: true,
		serverSide: true,
		ajax: base_url+'/admin/order/show/'+order_id,
		columns: [
			{ data: 'number_key', name: 'number_key' },
			{ data: 'product_image', name: 'product_image',
				render: function (data, type, column, meta) {
						return '<div class="img">'+
						'<img src="'+column.product_image+'">'+
						'</div>' ;
					}
			},
			//{ data: 'number_key', name: 'number_key' },
			{ data: 'product_name', name: 'product_name' },
			{ data: 'price', name: 'price' },
			{ data: 'quantity', name: 'quantity' },
			{ data: 'total_price', name: 'total_price' },
		]
	});

	$('body').on('change','.order-zone-change', function() {
		var order_id 	= $(this).attr("order_id");
		zone_id      	= this.value;
		console.log('zone_id===='+zone_id)
		console.log('order_id===='+order_id)
		var success_status='Zone Change';
		path='admin/order/order_zone_change/';

		$.ajax({
			"headers":{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			},
			'type':'PUT',
			'url' :  base_url + '/' +path,
			'data' : {  order_id : order_id, zone_id:zone_id },
			'beforeSend': function() {

			},
			'success' : function(response){
				if(response.status == 'success'){
					swal(success_status ,response.message, 'success')
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