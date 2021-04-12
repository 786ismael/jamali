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
				<form  method="POST" enctype="multipart/form-data" action="{{ route('admin/category/update',$data['category']->category_id) }}">
					@csrf
					{{ method_field('PUT') }}
					<div class="input-form">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Category Name :</label>
									<div class="add-promocode">
										<input type="text" class="form-control" placeholder="Category name" name="category_name" value="{{$data['category']->category_name}}" id="category_name" >
									</div>
								</div>
							</div>	
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Category Image :</label>
									<div class="add-promocode">
										<input type="file" class="form-control" name="category_image" id="category_image" >
									</div>
								</div>
							</div>					
						</div>
					</div>

					<div class="buttons">
						<button class="same-btn1" type="submit">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection