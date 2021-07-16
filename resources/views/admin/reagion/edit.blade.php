@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<div class="add-driver clear-col">
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
				<form method="POST" action="{{ route('admin.reagion.update') }}">
					@csrf
                    <input type="hidden" name="id" value="{{encrypt($data['country']->id)}}">
					<div class="input-form ">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Country Name:</label>
									<input type="text" placeholder="Country Name" class="form-control" name="countries_name" value="{{$data['country']->countries_name}}">
									@error('countries_name')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Country Iso Code:</label>
									<input type="text" placeholder="Country Iso Code" class="form-control" name="countries_iso_code" value="{{$data['country']->countries_iso_code}}">
									@error('countries_iso_code')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>
                        <div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Country Isd code:</label>
									<input type="text" placeholder="Country Isd code" class="form-control" name="countries_isd_code" value="{{$data['country']->countries_isd_code}}">
									@error('countries_isd_code')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="buttons">
						<button type="submit" class="same-btn1">Save</button>
						<button id="resetbtn" class="same-btn1">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
