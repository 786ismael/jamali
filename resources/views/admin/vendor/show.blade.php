@extends('admin.layouts.app')
@section('content')
<div class="main-body">
	<div class="inner-body">
		<div class="driver-details">
			<div class="top-trip clearfix">
				<h2>Vendor's Details</h2>
			</div>
			<div class="top-details">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-xs-12">
						<!--profile-details-->
						<div class="profile-details">
							<div class="img-wrapper clearfix">
								<div class="img-p">
									<div class="img">
										<img src="{{$data['user']->profile_image}}">
									</div>
								</div>
								{{-- <div class="img-p">
									<div class="img">
										<img src="{{$data['user']->registration_card}}">
									</div>
								</div> --}}
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

					<div class="col-md-6 col-sm-6 col-xs-12" style="border-left:1px solid gray">
						<h4>Document's</h4>
						<div class="photos clearfix">
							<div class="p-wrapper">
								<div class="single-img" style="background-image: url('{{$data['user']->document_1}}');">
								</div>
							</div>

							<div class="p-wrapper">
								<div class="single-img" style="background-image: url('{{$data['user']->document_2}}');">
								</div>
							</div>

							<div class="p-wrapper">
								<div class="single-img" style="background-image: url('{{$data['user']->document_3}}');">
								</div>
							</div>

						</div>
					</div>
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