<!DOCTYPE html>
<html>
  <head>
    <title>Jamali</title>
    <meta charset="UTF-8" />
    <meta name="keywords" content="Dating, partner" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--google fonts-->
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat:400,500,500i&display=swap"
      rel="stylesheet"
    />
    <!--css-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/landing')}}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('public/landing')}}/css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/landing')}}/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{asset('public/landing')}}/css/responsive.css" />
    <link rel="shortcut icon" href="{{asset('public/landing')}}/images/favicon.ico" type="image/x-icon">
    <!--font awesome 4-->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{asset('public/landing')}}/font-awesome/css/font-awesome.min.css"
    />
  </head>
<body>
	<header class="custom-header">
		<div class="top-bg inner-page">
			<div  class="container">
				<div class="top-nav clearfix">
					<div class="logo">
						<a href="{{route('index')}}"><img src="{{asset('public/landing')}}/images/logo.png" alt="Logo"></a>
					</div>
					<nav>
						<ul>
							<li><a href="{{ route('index')}}?lang={{Request::get('lang')}}">Home</a></li>
							<li>
								<a href="{{route('term.condition')}}?lang={{Request::get('lang')}}">Terms and conditions</a>
							  </li>
							  <li><a href="{{route('support')}}?lang={{Request::get('lang')}}">Support</a></li>
							  <li><a href="{{route('privacy.policy')}}?lang={{Request::get('lang')}}">Privacy and policy</a></li>
						</ul>
						<div class="select-language">
							<select onchange="location = this.options[this.selectedIndex].value;">
								<option value="{{route('index')}}?lang=en">English</option>
								<option value="{{route('index')}}?lang=ar" @if(Request::get('lang') == 'ar') selected @endif>Arabic</option>
							</select>​
						</div>
					</nav>
				</div>
				<div class="mobile-menu">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
	</header>

	<section class="term_condition form-support">
	  	<div class="container">
	  		<h3 class="section-heading">Support</h3>
	  		<div class="fs-inner">
	  			<form>
	  				<h2 class="text-center">Send a support request!</h2>
			        <div class="row">
						<div class="col-sm-6">
							<input type="text" class="form-control" id="" placeholder="First name"  required>
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" id="" placeholder="Last name" required>
						</div>
						<div class="col-sm-6">
							<input type="email" class="form-control" id="" placeholder="Email"  required>
						</div>
						<div class="col-sm-6">
							<input type="number" class="form-control" id="" placeholder="Phone number"  required>
						</div>
						<div class="col-sm-12">
							<textarea class="form-control" rows="5" id="" placeholder="Message"></textarea>
						</div>

						<div class="col-sm-12">
							<div class="text-center">
								<button class="btn btn-primary support-btn" type="submit">Submit</button>
							</div>
						</div>
			        </div>
	        	</form>
	  		</div>
	  	</div>
	  </section>

	<footer>
		<div class="container">
			<div class="footer-body">
				<h4 class="heading">Follow us on</h4>
				<ul>
					<li>
						<a href="" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href="" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
					</li>
					<li>
						<a href=""><i class="fa fa-twitter" aria-hidden="true"></i></a>
					</li>
				</ul>
				<!-- <h5>The purpose of lorem ipsumcreate natural text looking block of text </h5>
				<p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is.</p> -->
			</div>
		</div>
	</footer>
    <!--script-->
    <script type="text/javascript" src="{{asset('public/landing')}}/js/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('public/landing')}}/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="{{asset('public/landing')}}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('public/landing')}}/js/custom.js"></script>
</body>
</html>