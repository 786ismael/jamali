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
				<form method="POST" action="{{ route('admin.city.store') }}">
					@csrf
					<div class="input-form ">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Country Name:</label>
                                    <select class="form-control" name="country_id">
                                    @if(!empty($data['country']))
                                        @foreach($data['country'] as $country)
                                            <option value="{{$country->id}}">{{$country->countries_name}}</option>
                                        @endforeach
                                    @endif
                                    </select>
									@error('countries_name')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>City Name:</label>
									<input type="text" placeholder="City Name" class="form-control" name="name" value="">
									@error('name')
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
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
