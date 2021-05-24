@php
namespace App\Helpers;
//$product_place_holder_image=ImageHelper::getProductPlaceholderImage();
//use Illuminate\Support\Facades\Session;
@endphp
@extends('admin.layouts.app')
@section('content')
<div class="main-body">
	<div class="inner-body">
		<div class="top-trip clearfix">
			<h2>Appointment Details</h2>
		</div>
		<div class="driver-details">
			<div class="tab-content">
			    <div id="Dashboard" class="dashboard tab-pane fade in active">
			    	<div class="row">
			    		<div class="col-md-6">
					    	<div class="profile-details clearfix">
								<div class="txt-details">
									<ul>
										<li><span>User :</span> {{$data['appointment']->user_name}}</li>
										<li><span>Vendor :</span> {{$data['appointment']->vendor_user_name}}</li>
										<li><span>Service :</span> {{$data['appointment']->service_name}}</li>
										<li><span>Appoitment Date  :</span> {{date('M,d Y',strtotime($data['appointment']->appointment_date))}}</li>
										<li><span>Appointment Time :</span> {{date('M,d Y',strtotime($data['appointment']->appointment_time))}}</li>
										<li><span>Service Amount :</span> {{$data['appointment']->service_amount}}</li>
										<li><span>Tax (%) :</span> {{$data['appointment']->tax_percentage}}</li>
										<li><span>Tax Amount :</span> {{$data['appointment']->tax_amount}}</li>
										<li><span>Total Service Amount :</span> {{$data['appointment']->total_service_amount}}</li>
										<li><span>Booking Amount :</span> {{$data['appointment']->booking_amount}}</li>
										 <li><span>Commission Percentage (%) :</span> {{$data['appointment']->commission_percentage}}</li>
										 <li><span>Commission Amount :</span> {{$data['appointment']->commission_amount}}</li>
										 <li><span>Total Payable Amount :</span> {{$data['appointment']->total_payable_amount}}</li>
										 <li><span>Remaining Amount :</span> {{$data['appointment']->remaining_amount}}</li>
										 <li><span>Booking Submmited Date :</span> {{date('M,d Y',strtotime($data['appointment']->created_at))}}</li>
									</ul>
								</div>
							</div><!--end-->
			    		</div>
			    		<div class="col-md-6">
			    			<div id="map" style="height: 400px; width: 400px;"></div>
			    		</div>
						<div class="col-md-12">
                              <button type="button" class="same-btn1 btn-delete">Delete</button>
						</div>
			    	</div>
					
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
			   {{-- @if($data['order']->order_id)
				   <div id="" class="">
						<div class="driver-data-table">
							<div class="data-table">
								<div class="table-fbutton clearfix">
									<div class="btns">
										<h2>Products :</h2>
									</div>
									<div class="s-btn">
										<div class="searchbar">
											<label>Search :</label>
											<input type="text" name="">
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table id="laravel_datatable" class="table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Product Image</th>
												<th>Product Name</th>
												<th>Price</th>
												<th>Quantity</th>
												<th>Total Price</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
				   </div>
			   @endif  --}}
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script>
		$('body').on('click','.btn-delete',function(e){
			e.preventDefault();
			$('#deleteModal').modal('show');
		});
  </script>
@endpush
