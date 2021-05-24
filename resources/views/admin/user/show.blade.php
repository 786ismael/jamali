@extends('admin.layouts.app')
@section('content')
<div class="main-body">
	<div class="inner-body">
		<div class="driver-details">
			<div class="top-trip clearfix">
				<h2>User Details</h2>
			</div>
			<div class="tab-content">
				<div class="dashboard tab-pane fade in active">
		    	<!--profile-details-->
				<div class="profile-details clearfix">
					<div class="img">
						<img src="{{$data['user']->profile_image}}">
					</div>
					<div class="txt-details">
						<ul>
						<form class="form" id="update-form" action="{{url('admin/user/update',$data['user']->id)}}" method="post" enctype="multipart/form-data">
							@csrf
							@method('put')
							<div class="form-group">
							   <label>Name</label>
							   <input type="text" name="name" placeholder="Name" value="{{$data['user']->user_name}}" class="form-control" readonly/>
							</div>
							<div class="form-group">
								<label>Email</label>
							   <input type="text" name="email" placeholder="Email" value="{{$data['user']->email}}" class="form-control" readonly/>
							</div>
							<div class="form-group">
								<label>Phone Number</label>
							   <input type="text" name="phone" placeholder="Phone Number" value="{{$data['user']->phone_number}}" class="form-control" readonly/>
							</div>
							<div class="form-group">
								<label>Registration Date</label>
								<input type="text" name="registration_date" placeholder="Registration Date" value="{{ date('M,d Y',strtotime($data['user']->created_at))}}" class="form-control" readonly/>
							</div>
							<div class="btn-wrapper">
								<input type="button" class="same-btn1 btn-edit" value="Edit" />
                                <button type="button" class="same-btn1 btn-delete">Delete</button>
								<input type="submit" class="same-btn1 btn-update" value="Update" />
								<a href="{{route('admin/user/show',$data['user']->id)}}" class="same-btn1 btn-cancel">Cancel</a>
							</div>
						</form>
						</ul>
					</div>
				</div><!--end-->

				<div class="modal" tabindex="-1" id="deleteModal" role="dialog">
				    <form class="form" action="{{route('admin/user/destroy',$data['user']->id)}}" method="POST">
					   @csrf
					   @method('DELETE')
						<div class="modal-dialog" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Delete</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn same-btn1">Confirm</button>
								<button type="button" class="btn same-btn1" data-dismiss="modal">Cancel</button>
							</div>
							</div>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
  	    var user_id='{{$data['user']->id}}';
        $('.btn-update,.btn-cancel').hide();
		$('body').on('click','.btn-edit',function(e){
			e.preventDefault();
			$('input[name="registration_date"]').parent('div').hide();
            $('.btn-edit,.btn-delete').hide();
			$('form input[type="text"]').removeAttr('readonly');
	        $('.btn-update,.btn-cancel').show();
		});

		$('body').on('click','.btn-delete',function(e){
             e.preventDefault();
			 $('#deleteModal').modal('show');
		});
		
     //Update Form
     $('#update-form').on('submit',function(e){
     	e.preventDefault();
			let form  = $(this);
 		    let data  = new FormData(this);
			$.ajax({
				"headers":{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			},
				'type':'POST',
				'url' : form.attr('action'),
				'data' : data,
				cache : false,
				contentType : false,
				processData : false,
			beforeSend: function() {
			},
			'success' : function(response){
				form.find('span.text-error').remove();
				if(response.status == 'success'){
					$('input[name="registration_date"]').parent('div').show();
					$('.btn-edit,.btn-delete').show();
					$('form input[type="text"]').attr('readonly','readonly');
					$('.btn-update,.btn-cancel').hide();
                    swal ( "Oops" , response.message ,  "success" );
				}
				if(response.status == 'failed'){
                   swal ( "Oops" , response.message ,  "error" );
				}
				if(response.status == 'error'){
				 $.each(response.errors, function (key, val) {
				    form.find('[name='+key+']').after('<span class="text-error">'+val+'</span>');
				 });
				}
			},
			'error' : function(error){
				console.log(error);
			},
			complete: function() {
			},
			});

			 $('.btn-cancel').on('click',function(e){
				    e.preventDefault();
					$('form span.text-error').remove();
					$('input[name="registration_date"]').parent('div').show();
					$('.btn-edit,.btn-delete').show();
					$('form input[type="text"]').attr('readonly','readonly');
					$('.btn-update,.btn-cancel').hide();
			 });
     });
</script>
@endpush