$(document).ready(function(){
	console.log("Show Js");
	console.log(base_url);
	$('#laravel_datatable').DataTable({
		processing: true,
		serverSide: true,
		ajax: base_url+'/admin/product/show/'+product_id,
		columns: [
			{ data: 'number_key', name: 'number_key' },
			{ data: 'price', name: 'price' },
			{ data: 'discount', name: 'discount' },
			{ data: 'actual_price', name: 'actual_price' },
			{ data: 'stock', name: 'stock' },
			{ data: 'quantity', name: 'quantity' },
			{ data: 'product_combo_id', name: 'product_combo_id' , 
				render: function (data, type, column, meta) {
				return '<div class="btns">'+
					'<a href="'+base_url+'/admin/product/edit_combo/'+column.product_combo_id+'"><button class="pen"><i class="fa fa-pencil"></i></button></a>'+
					'</div>' ;
				}
			}
		]
	});
});