<head>
	<title>Jamali Dashboard</title>
	<meta charset="UTF-8">
	<meta name="keywords" content="jamali">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--css-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets')}}/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets')}}/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets')}}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets')}}/css/responsive.css">
	<!--font awesome 4-->
	<link rel="stylesheet" type="text/css" href="{{asset('public/admin_assets')}}/css/font-awesome.min.css">
	{{-- Sweet Alert  --}}
    <link  href="{{asset('public/admin_assets')}}/css/sweetalert.css" rel="stylesheet">

    <link  href="{{asset('public/admin_assets')}}/css/viewer_main.css" rel="stylesheet">
    <link  href="{{asset('public/admin_assets')}}/css/viewer.css" rel="stylesheet">

	<script src="{{asset('public/admin_assets')}}/js/sweetalert.min.js"></script>
	<!--data table-->
	<link  href="{{asset('public/admin_assets')}}/css/jquery.dataTables.min.css" rel="stylesheet">
	<link  href="{{asset('public/admin_assets')}}/css/buttons.dataTables.min.css" rel="stylesheet">
	<script src="{{asset('public/admin_assets')}}/js/jquery-3.3.1.js"></script>
	<script src="{{asset('public/admin_assets')}}/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('public/admin_assets')}}/js/dataTables.buttons.min.js"></script>
	<script src="{{asset('public/admin_assets')}}/js/buttons.flash.min.js"></script>
	<script src="{{asset('public/admin_assets')}}/js/jszip.min.js"></script>
	<script src="{{asset('public/admin_assets')}}/js/pdfmake.min.js"></script>
	<script src="{{asset('public/admin_assets')}}/js/vfs_fonts.js"></script>
	<script src="{{asset('public/admin_assets')}}/js/buttons.html5.min.js"></script>
	<script src="{{asset('public/admin_assets')}}/js/buttons.print.min.js"></script>
    <script src="{{asset('public/admin_assets')}}/js/custom.js"></script>
    
    <script src="{{asset('public/admin_assets')}}/js/viewer_main.js"></script>
    <script src="{{asset('public/admin_assets')}}/js/viewer.js"></script>

	<style type="text/css">
		pre {
    display: none;
    padding: 9.5px;
    margin: 0 0 10px;
    font-size: 13px;
    line-height: 1.42857143;
    color: #333;
    word-break: break-all;
    word-wrap: break-word;
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    border-radius: 4px;
}
	</style>
</head>`