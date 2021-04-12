@extends('admin.layouts.app')
@section('content')
<div class="main-body">
	<div class="inner-body">
		<div class="top-trip clearfix">
			<h2>Product Details</h2>
		</div>
		<div class="driver-details">
			<div class="tab-content">
			    <div id="Dashboard" class="dashboard tab-pane fade in active">
			    	<!--profile-details-->
					<div class="profile-details clearfix">
						<div class="img">
							<img src="{{$data['product']->product_image}}">
						</div>
						<div class="txt-details">
							<ul>
								<li><span>Category Name :</span> {{$data['product']->category->category_name}}</li>
								<li><span>Product Name :</span> {{$data['product']->product_name}}</li>
								@if($data['product']->category_id!='2')
								<li><span>Price :</span> {{$data['product']->price}}</li>
								<li><span>Discount (%):</span> {{$data['product']->discount}}</li>
								<li><span>Actual Price. :</span> {{$data['product']->actual_price}}</li>
								@else
								<li><span>Description. :</span> {{$data['product']->description}}</li>
								@endif
							</ul>
						</div>
					</div><!--end-->
			    </div>
			   @if($data['product']->category_id=='2')

				   <div id="" class="">
						<div class="driver-data-table">
							<div class="data-table">
								<div class="table-fbutton clearfix">
									<div class="btns">
										<h2>Product Combos :</h2>
									</div>
									<div class="s-btn">
										<div class="searchbar">
											<label>Search :</label>
											<input type="text" name="">
										</div>
										<a href="{{route('admin/product/create_combo',$data['product']->product_id)}}"><button>Add More Combo</button></a>
									</div>
								</div>
								<div class="table-responsive">
									<table id="laravel_datatable" class="table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Price</th>
												<th>Discount (%)</th>
												<th>Actual Price</th>
												<th>Stock</th>
												<th>Quantity</th>
												<th>Action</th>
											</tr>
										</thead>
									</table>
								</div>
							</div>
						</div>
				   </div>
			   @endif 
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var product_id = '{{$data['product']->product_id}}';
</script>
@endsection