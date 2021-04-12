
<script type="text/javascript" src="{{asset('public/admin_assets')}}/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{asset('public/admin_assets')}}/js/bootstrap.min.js"></script>
<!--data table-->
{{-- <script type="text/javascript" src="{{asset('public/admin_assets')}}/js/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="{{asset('public/admin_assets')}}/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{asset('public/admin_assets')}}/js/custom.js"></script> --}}
{{-- Added by ganesh --}}
{{-- <script type="text/javascript" src="{{asset('public/admin_assets/admin_js')}}/profile.js"></script> --}}
<script type="text/javascript">
	window.setTimeout(function() {
		$(".alert").fadeTo(500, 0).slideUp(500, function(){
			$(this).remove(); 
		});
    }, 3000);
</script>

<script type="text/javascript">
	var base_url = "{{url('/')}}";
</script>
@if(!empty($data['js']))
	@foreach($data['js'] as $js)		
		<script type="text/javascript" src="{{URL::asset('public/admin_assets/pages')}}/{{$js}}"></script>
	@endforeach
@endif