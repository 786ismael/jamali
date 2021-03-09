@extends('admin.layouts.app')
@section('content')
<div class="main-body">
	<div class="inner-body">
		<div class="driver-data-table">
			<div class="top-trip clearfix">
				<h2>Categories</h2>
				<!-- <button data-toggle="modal" data-target="#filter">Filter</button> -->
			</div>

			<div class="data-table">
				<div class="table-fbutton clearfix">
					
					<div class="s-btn">
						<div class="searchbar">
							<label>Search :</label>
							<input type="text" name="">
						</div>
						<a href="{{route('admin/category/create')}}"><button>Add Category</button></a>
					</div>
				</div>
				<div class="table-responsive">
					<table id="laravel_datatable" class="table">
						<thead>
							<tr>
								<th>Sr.No.</th>
								<th>Category Name</th>
								<th>Category Image</th>
								<th>Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection