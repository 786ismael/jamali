@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<div class="add-driver">
				@if($message = Session::get('success'))
					<div class="alert alert-success">
						<ul>
							<li>{{ $message }}</li>
						</ul>
					</div>
				@endif

				@if($message = Session::get('error'))
					<div class="alert alert-danger">
						<ul>
							<li>{{ $message }}</li>
						</ul>
					</div>
				@endif
				<form  method="POST" enctype="multipart/form-data" action="{{ route('admin/promocode/store') }}">
					@csrf
					{{ method_field('PUT') }}
					<div class="input-form">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Promocode :</label>
									<div class="add-promocode">
										<input type="text" class="form-control" placeholder="Code" name="promocode" value="{{old('promocode')}}" id="promocode">
										<button class="promocode-generate">Generate</button>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label> Discount:</label>
									<input type="number" placeholder="Name" class="form-control" name="discount" value="{{old('discount')}}">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Activation Date:</label>
									<input type="date" placeholder="Select Date" class="form-control" name="activation_date" value="{{old('activation_date')}}" id="activation_date">
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Validity :</label>
									<select class="form-control" name="validate_days" id="validate_days">
										<option value="">Select</option>
										@if($data['validate_days']->isEmpty())
											<option value="">Record Not Found</option>
										@else
											@foreach($data['validate_days'] as $key => $value)

												<option value="{{$value->validate_day_id}}" data-days="{{$value->days}}" @if(old('validate_days')==$value->validate_day_id){{'selected'}}@endif>{{$value->days_name}}</option>	

											@endforeach
										@endif
									</select>
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Expire date:</label>
									<input type="text" placeholder="Expire date" class="form-control" name="expire_date" value="{{old('expire_date')}}" id="expire_date" required="">
								</div>
							</div>										
						</div>
					</div>

					<div class="buttons">
						<button class="same-btn1" type="submit">Save</button>
						<button class="same-btn1">Reset</button>
						<button class="same-btn2">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection