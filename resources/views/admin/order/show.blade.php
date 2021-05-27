@extends('admin.layouts.app')
@section('content')
<div class="main-body">
	<div class="inner-body">
		<div class="top-trip clearfix">
			<div class="table-fbutton clearfix">
				@if(Session::get('message'))
				<div class="alert @if(Session::get('status')) {{ 'alert-success' }} @else {{ 'alert-danger' }} @endif" role="alert">
				<i class="fa @if(Session::get('status')) fa-check @else fa-times @endif mx-2"></i>
				{{Session::get('message')}}
				</div>
				@endif
			</div>
			<h2>Appointment Details</h2>
		</div>
		<div class="driver-details">
			<div class="tab-content">
			    <div id="Dashboard" class="dashboard tab-pane fade in active">
				    <form role="form" action="{{route('admin/order/update',$data['appointment']->appointment_id)}}" method="post">
					  @csrf
					  @method('put')
					<div class="row">
						<div class="col-md-12">
							<div class="profile-details clearfix">
								<div class="txt-details booking-details">
									<div class="row">
										<div class="col-md-4">
										<div class="form-group">
											<label>User</label>
											<input class="form-control" value="{{$data['appointment']->user_name}}" readonly/>
										</div>
										<div class="form-group">
											<label>Vendor</label>
											<input class="form-control" value="{{$data['appointment']->vendor_user_name}}" readonly/>
										</div>
										<div class="form-group">
											<label>Service</label>
											<input class="form-control" value="{{$data['appointment']->service_name}}" readonly/>
										</div>
										<div class="form-group">
											<label>Booking Date</label>
											<input type="date" class="form-control" name="booking_date" value="{{date('Y-m-d',strtotime($data['appointment']->appointment_date))}}" @if(!in_array($data['appointment']->status,[0,1])) readonly @endif/>
										</div>
										<div class="form-group">
											<label>Booking Time</label>
											<input type="time" class="form-control" name="booking_time" value="{{date('H:i',strtotime($data['appointment']->appointment_time))}}" @if(!in_array($data['appointment']->status,[0,1])) readonly @endif/>
										</div>
										<div class="form-group">
											<label>Booking Status</label>
											@php
												if($data['appointment']->status == '1')
												    $status = 'Accepted';
												elseif($data['appointment']->status == '2')
												    $status = 'Declined';
												elseif($data['appointment']->status == '3')
												    $status = 'Completed';
												else
												    $status = 'Pending';
											@endphp
 											<input type="text" class="form-control" name="booking_time" value="{{$status}}" readonly/>
										</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Total Payable Amount</label>
												<input class="form-control" value="{{$data['appointment']->total_payable_amount}}" readonly/>
											</div>
											<div class="form-group">
												<label>Service Amount</label>
												<input class="form-control" value="{{$data['appointment']->service_amount}}" readonly/>
											</div>
											<div class="form-group">
												<label>Tax (%)</label>
												<input class="form-control" value="{{$data['appointment']->tax_percentage}}" readonly/>
											</div>
											<div class="form-group">
												<label>Tax Amount</label>
												<input class="form-control" value="{{$data['appointment']->tax_amount}}" readonly/>
											</div>
											<div class="form-group">
												<label>Remaining Amount</label>
												<input class="form-control" value="{{$data['appointment']->remaining_amount}}" readonly/>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Total Service Amount</label>
												<input class="form-control" value="{{$data['appointment']->total_service_amount}}" readonly/>
											</div>
											<div class="form-group">
												<label>Booking Amount</label>
												<input class="form-control" value="{{$data['appointment']->booking_amount}}" readonly/>
											</div>
											<div class="form-group">
												<label>Commission Percentage (%)</label>
												<input class="form-control" value="{{$data['appointment']->commission_percentage}}" readonly/>
											</div>
											<div class="form-group">
												<label>Commission Amount</label>
												<input class="form-control" value="{{$data['appointment']->commission_amount}}" readonly/>
											</div>
											<div class="form-group">
												<label>Booking Submmited Date</label>
												<input class="form-control" value="{{$data['appointment']->created_at}}" readonly/>
											</div>
										</div>
									</div>
								</div>
							</div><!--end-->
						</div>
						<div class="col-md-12">
							<button type="button" class="same-btn1 btn-delete">Delete</button>
							@if(in_array($data['appointment']->status,[0,1]))
							  <button type="submit" class="same-btn1">Update</button>
 							@endif
						</div>
						<div class="col-md-12">
						<br>
						<p class="text-error">*You can update booking only date and time, If the booking status is pending or accepted</p>
						</div>
					</div>
					</form>
			    </div>
				<div class="modal" tabindex="-1" id="deleteModal" role="dialog">
				    <form class="form" action="{{route('admin/order/destroy',$data['appointment']->appointment_id)}}" method="POST">
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
@push('css')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />
@endpush
@push('js')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script>
		$('body').on('click','.btn-delete',function(e){
			e.preventDefault();
			$('#deleteModal').modal('show');
		});
  </script>
@endpush
