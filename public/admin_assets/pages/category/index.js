$(document).ready(function(){
	console.log("Product");
	console.log(base_url);
	$('#laravel_datatable').DataTable({
		processing: true,
		serverSide: true,
		"ordering": false,
		ajax: base_url+'/admin/category',
		//dom: 'lBfrtip',
		//"scrollX": false,
		/*buttons:[
		'copy', 'csv', 'pdf', 'print'
		],*/
		//"lengthMenu": [ 10, 50, 100, 500],
		columns: [
			{ data: 'number_key', name: 'number_key' },
			{ data: 'category_name', name: 'category_name' },
			{ data: 'category_image', name: 'category_image',
				render: function (data, type, column, meta) {
						return '<div class="img">'+
						'<img src="'+column.category_image+'">'+
						'</div>' ;
					}
			},
			{ data: 'category_id', name: 'category_id' , 
				render: function (data, type, column, meta) {
				return '<div class="btns">'+
					/*'<a href="'+base_url+'/admin/vehicle_type/show/'+column.vehicle_type_id+'"><button class="eye"><i class="fa fa-eye"></i></button></a>'+*/
					'<a href="'+base_url+'/admin/category/edit/'+column.category_id+'"><button class="pen"><i class="fa fa-pencil"></i></button></a>'+
					/*'<button class="close product-delete" id="'+column.product_id+'"><i class="fa fa-close"></i></button>'+*/
					'</div>' ;
				}
			}
		]
	});
});