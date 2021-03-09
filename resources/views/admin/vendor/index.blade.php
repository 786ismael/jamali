@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<div class="driver-data-table">
				<div class="top-trip clearfix">
					<h2>Vendors </h2>
				</div>
				<div class="filter-wrapper">
                   <select name="vendor_type">
					   <option value="">All</option>
					   <option value="1">Artist</option>
					   <option value="2">Salon</option>
				   </select>
				</div>
				<div class="data-table">
					<div class="table-fbutton clearfix">
						<div class="s-btn">
							<div class="searchbar">
								<label>Search :</label>
								<input type="text" name="">
							</div>
							{{-- <a href="{{route('admin/driver/create')}}"><button>Add Drivers</button></a> --}}
						</div>
					</div>
					<div class="table-responsive">
						<table id="laravel_datatable" class="table" >
							<thead>
								<tr>
									<th>Sr.No.</th>
									<th>Profile Image</th>
									<th>Vendor Type</th>
									<th>User Name</th>
									<th>Email</th>
									<th>Phone Number.</th>
									<th>Active/Deactive</th>
									<th>Approve Status</th>
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