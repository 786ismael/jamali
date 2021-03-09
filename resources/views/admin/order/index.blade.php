@extends('admin.layouts.app')
@section('content')
<div class="main-body">
	<div class="inner-body">
		<div class="driver-data-table">
			<div class="top-trip clearfix">
				<h2>Appointments</h2>
			</div>

			<div class="data-table">
				<div class="table-fbutton clearfix">
					
					<div class="s-btn">
						<div class="searchbar">
							<label>Search :</label>
							<input type="text" name="">
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<table id="laravel_datatable" class="table">
						<thead>
							<tr>
								<th>Sr.No.</th>
								<th>User Name</th>
								<th>Vendor Name</th>
								<th>Service Name</th>
								<th>Service Amount</th>
								<th>Appointment date</th>
								<th>Appointment time</th>
								<th>Status</th>
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