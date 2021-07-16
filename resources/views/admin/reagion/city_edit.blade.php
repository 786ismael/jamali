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
				<form method="POST" action="{{ route('admin.city.update') }}">
					@csrf
                    <input type="hidden" name="id" value="{{encrypt($data['city']->city_id)}}">
					<div class="input-form ">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Country Name:</label>
                                    <select class="form-control" name="countries_name">
                                    @if(!empty($data['country']))
                                        @foreach($data['country'] as $country)
                                            @if($data['city']->country_id == $country->id)
                                                <option selected="selected" value="{{$country->id}}">{{$country->countries_name}}</option>
                                            @else
                                                <option value="{{$country->id}}">{{$country->countries_name}}</option>
                                            @endif
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
									<input type="text" placeholder="City Name" class="form-control" name="name" value="{{$data['city']->name}}">
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
						<button id="resetbtn" class="same-btn1">Reset</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
