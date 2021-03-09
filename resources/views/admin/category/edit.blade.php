@php
namespace App\Helpers;
$product_place_holder_image=ImageHelper::getProductPlaceholderImage();
use Illuminate\Support\Facades\Session;
@endphp
@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<div class="top-trip clearfix">
				<h2>Update Category</h2>
			</div>
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
				<form method="POST" enctype="multipart/form-data" action="{{ route('admin/category/update',$data['category']->category_id) }}">
					@csrf
					{{ method_field('PUT') }}
					<div class="input-form ">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Category Name:</label>
									<input type="text" placeholder="Category Name" class="form-control" name="category_name" value="{{$data['category']->category_name}}">
									@error('category_name')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group">
									<label>Category Name (Ar):</label>
									<input type="text" placeholder="Category Name Ar" class="form-control" name="category_name_ar" value="{{$data['category']->category_name_ar}}">
									@error('category_name_ar')
										<span class="invalid-feedback" role="alert">
											<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<div class="form-group">
									<label>Category Image:</label>
									<div class="upload-file">
										<button>
											<input type="file" class="form-control" name="category_image" id="upload-photo-1">
											<span>Choose File</span>
										</button>
									</div>
									<div class="pictures-viewers">
                                        <img style="cursor: pointer;" data-original="{{$data['category']->category_image}}" src="{{$data['category']->category_image}}" id="show-image-1" width="70"  height="70">
                                    </div>
									@error('category_image')
										<span class="invalid-feedback" role="alert">
										<strong style="color: red">{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="buttons">
						<button type="submit" class="same-btn1">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection