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
							<li><span>Name :</span> {{$data['user']->user_name}}</li>
							<li><span>Email :</span> {{$data['user']->email}}</li>
							<li><span>Phone Number :</span> {{$data['user']->phone_number}}</li>
							<li><span>Registration Date :</span> {{ date('M,d Y',strtotime($data['user']->created_at))}}</li>
						</ul>
					</div>
				</div><!--end-->
				
			</div>
		</div>
	</div>
</div>
@endsection
@push('js')
<script type="text/javascript">
	var user_id='{{$data['user']->id}}';
</script>
@endpush