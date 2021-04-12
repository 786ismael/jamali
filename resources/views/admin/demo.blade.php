@extends('admin.layouts.app')
@section('content')
	<div class="main-body">
		<div class="inner-body">
			<div class="driver-data-table">
				<div class="top-trip clearfix">
					<h2>Driver Status</h2>
				</div>

				<div class="data-table">
					<div class="table-fbutton clearfix">
						<div class="btns">
							<button class="active">CSV</button>
							<button>Print</button>
							<!-- <button>PDF</button>
							<button>Print</button> -->
						</div>
						<div class="s-btn">
							<div class="searchbar">
								<label>Search :</label>
								<input type="text" name="">
							</div>
							<!-- <a href="add_driver.html"><button>Add Driver</button></a> -->
							<div class="from-date">
								<label>From Date</label>
								<input type="date" name="">
								<label>To Date</label>
								<input type="date" name="">
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<table id="dataTable" class="table">
							<thead>
								<tr>
									<th>Id No.</th>
									<th>Profile</th>
									<th>Driver Name</th>
									<th>Average traveled</th>
									<th>Total earnings</th>
								</tr>
							</thead>
							<tbody>
								<!--single table row-->
								<tr>
									<td>1</td>
									<td>
										<div class="img">
											<img src="images/profile.jpg">
										</div>
									</td>
									<td> john Doe </td>
									<td> j350km </td>
									<td> 150$ </td>

								</tr> <!--end-->
								
							</tbody>
						</table>
					</div>

					<div class="t-pagination clearfix">
						<div class="text-result">
							<p>Showing 1 to 1 of 1 entries</p>
						</div>
						<div class="pagination-no">
							<ul>
								<li><button>Previous</button></li>
								<li><span class="active">1</span></li>
								<li><span>2</span></li>
								<li><button>Next</button></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection