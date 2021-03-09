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
	<header>
		<div class="top-bg home">
			<div  class="container">
				<div class="top-nav clearfix">
					<div class="logo">
						<a href="{{asset('public/landing')}}/index_ar.html"><img src="{{asset('public/landing')}}/images/logo.png" alt="Logo"></a>
					</div>
					<nav>
						<ul>
							<li><a href="{{route('term.condition')}}?lang={{Request::get('lang')}}">الأحكام والشروط</a></li>
							<li><a href="{{route('support')}}?lang={{Request::get('lang')}}">الدعم</a></li>
							<li><a href="{{route('privacy.policy')}}?lang={{Request::get('lang')}}">الخصوصية والسياسة</a></li>
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
				<div class="yopo-logo">
					<img src="{{asset('public/landing')}}/images/logo.png" class="img-responsive">
					<h3>Que es Jamali?</h3>
					<p>Tu aplicación de servicios ya está aquí, todo lo que se te hacía difícil de hacer, ya tiene solución, busca quien te ayude en nuestra plataforma, o por otro lado si tu deseas ayudar a otro a realizar las tareas que él no puede también puedes hacerlo en nuestra App, de una manera fácil sencilla y segura y de acuerdo al presupuesto que tu tengas estimado o si eres un servidor el valor que tu decidiste cobrar.</p>

					<button class="g-bg play-video"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Play Video</button>
				</div>
				<div class="yopo-mobile">
					<img src="{{asset('public/landing')}}/images/yopo-phone.png" class="img-responsive">
				</div>
			</div>
		</div>
	</header>

	<div class="video-wrap">
		<div class="video-inner">
			<div class="video-main">
				<button onclick="pauseVid()" type="button">&#215;</button>
				<video id="video" controls>
				  <source src="{{asset('public/landing')}}/videos/yopo-video-es.mp4" type="video/mp4">
				  Su navegador no soporta la etiqueta de vídeo.
				</video>
			</div>
		</div>
	</div>

	<!--for user-->
	<section class="for-uv">
		<div class="container">
			<div class="col-md-5 col-sm-4">
				<div class="mobile-img">
					<img src="{{asset('public/landing')}}/images/m1.png" class="img-responsive">
				</div>
			</div>
			<div class="col-md-7 col-sm-8">
				<div class="uv-data">
					<h3>Para Usuario:</h3>
					<p>El usuario es quien contrata los servicios ofrecidos en nuestra plataforma y para contratar un servicio debe realizar los siguientes procesos:</p>
					<div class="process-list">
						<ul>
							<li class="clearfix">
								<span class="number">1</span>
								<div class="process">
									<h5>Proceso: 1</h5>
									<p>Incribase en nuestra plataforma</p>
								</div>
							</li>
							<li class="clearfix">
								<span class="number">2</span>
								<div class="process">
									<h5>Proceso: 2</h5>
									<p>Busque usuarios cerca de usted que realicen el servicio que usted desea</p>
								</div>
							</li>
							<li class="clearfix">
								<span class="number">3</span>
								<div class="process">
									<h5>Proceso: 3</h5>
									<p>Envié requerimiento de servicio al usuario que escogió y espere a que el usuario vender acepte su trabajo</p>
								</div>
							</li>
							<li class="clearfix">
								<span class="number">4</span>
								<div class="process">
									<h5>Proceso: 4</h5>
									<p>Pague provisoriamente a Yopo mientras el trabajo es completado</p>
								</div>
							</li>
							<li class="clearfix">
								<span class="number">5</span>
								<div class="process">
									<h5>Proceso: 5</h5>
									<p>Libere el pago y evalué a su servidor una vez que este satisfecho con el trabajo</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--end-->

	<!--for vendore-->
	<section class="for-uv vendore-bg">
		<div class="container">
			<div class="col-md-7 col-sm-8">
				<div class="uv-data">
					<h3>Para Vendedor:</h3>
					<p>El vendedor es quien ofrece los servicios a través de nuestra plataforma y para realizarlos debe realizar los siguientes pasos:</p>

					<div class="process-list">
						<ul>
							<li class="clearfix">
								<span class="number">1</span>
								<div class="process">
									<h5>Proceso: 1</h5>
									<p>Incribase en nuestra plataforma</p>
								</div>
							</li>
							<li class="clearfix">
								<span class="number">2</span>
								<div class="process">
									<h5>Proceso: 2</h5>
									<p>Agregue los servicios que desea realizar</p>
								</div>
							</li>
							<li class="clearfix">
								<span class="number">3</span>
								<div class="process">
									<h5>Proceso: 3</h5>
									<p>Acepte solicitudes de trabajos que esté dispuesto a hacer</p>
								</div>
							</li>
							<li class="clearfix">
								<span class="number">4</span>
								<div class="process">
									<h5>Proceso: 4</h5>
									<p>Realice el trabajo y reporte en la app que lo termino</p>
								</div>
							</li>
							<li class="clearfix">
								<span class="number">5</span>
								<div class="process">
									<h5>Proceso: 5</h5>
									<p>Obtenga su pago una vez que el usuario acepte el trabajo satisfactoriamente</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-5 col-sm-4">
				<div class="mobile-img">
					<img src="{{asset('public/landing')}}/images/m2.png" class="img-responsive">
				</div>
			</div>
		</div>
	</section>
	<!--end-->

	<!--why-us-->
	<section class="why-us">
		<div class="container">
			<div class="heading">
				<h3>Por que Nosotros?</h3>
				<p>Porque somos los únicos en acercar la comodidad facilidad y sencillez de hacer lo difícil fácil. Y algunas de las razones que nos basamos para decir lo anterior son:</p>
			</div>
			<div class="features">
				<div class="row">
					<!--sinlge-feature-->
					<div class="col-sm-4">
						<div class="sinlge-feature">
							<div class="img">
								<img src="{{asset('public/landing')}}/images/thunder.png">
							</div>
							<h5>Facil y Rapido</h5>
							<p>En pocos segundos puedes encontrar quien realice el trabajo que tu no quieres hacer , o si eres vendor</p>
						</div>
					</div>

					<!--sinlge-feature-->
					<div class="col-sm-4">
						<div class="sinlge-feature">
							<div class="img">
								<img src="{{asset('public/landing')}}/images/secure.png">
							</div>
							<h5>Confiable y seguro</h5>
							<p>Procuramos tener un historial tanto de nuestros users como nuestros vendor tu puedes ver sus rates de manera que sea confiable y seguro trabajar en nuestra plataforma</p>
						</div>
					</div>

					<!--sinlge-feature-->
					<div class="col-sm-4">
						<div class="sinlge-feature">
							<div class="img">
								<img src="{{asset('public/landing')}}/images/doller.png">
							</div>
							<h5>Envia y obten tus pagos</h5>
							<p>Trabajamos con la plataforma de PayPal para asegurar que los pagos sean realizados correcta oportuna y eficazmente</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--end-->

	<!--app-screenshot-->
	<section class="app-screenshot">
		<div class="container">
			<div class="heading">
				<h3>Vistas de la aplicacion</h3>
				<p>Aca algunas vistas de nuestra aplicación</p>
			</div>
			<div class="tabs-section">
				<ul class="nav nav-tabs">
				    <li class="active"><a data-toggle="tab" href="{{asset('public/landing')}}/#user">Para el usuario</a></li>
				    <li><a data-toggle="tab" href="{{asset('public/landing')}}/#vendore">Para los Vendore</a></li>
				  </ul>

				  <div class="tab-content">
				    <div id="user" class="tab-pane fade in active">
						<div class="screenshot-slider">
							<div class="row">
								<div class="large-12 columns">
									<div class="loop owl-carousel owl-theme">
										<div class="item">
											<img src="{{asset('public/landing')}}/images/1.jpg" class="img-responsive">
										</div>
										<div class="item">
											<img src="{{asset('public/landing')}}/images/2.jpg" class="img-responsive">
										</div>
										<div class="item">
											<img src="{{asset('public/landing')}}/images/3.jpg" class="img-responsive">
										</div>
										<div class="item">
											<img src="{{asset('public/landing')}}/images/4.jpg" class="img-responsive">
										</div>
										<div class="item">
											<img src="{{asset('public/landing')}}/images/5.jpg" class="img-responsive">
										</div>
									</div>
								</div>
							</div>
							<div class="mobile-screen">
								<img src="{{asset('public/landing')}}/images/mobile.png">
							</div>
						</div>
				    </div>
				    <div id="vendore" class="tab-pane fade">
				     	<div class="screenshot-slider">
							<div class="row">
								<div class="large-12 columns">
									<div class="loop owl-carousel owl-theme">
										<div class="item">
											<img src="{{asset('public/landing')}}/images/6.jpg" class="img-responsive">
										</div>
										<div class="item">
											<img src="{{asset('public/landing')}}/images/7.jpg" class="img-responsive">
										</div>
										<div class="item">
											<img src="{{asset('public/landing')}}/images/8.jpg" class="img-responsive">
										</div>
										<div class="item">
											<img src="{{asset('public/landing')}}/images/9.jpg" class="img-responsive">
										</div>
										<div class="item">
											<img src="{{asset('public/landing')}}/images/10.jpg" class="img-responsive">
										</div>
									</div>
								</div>
							</div>
							<div class="mobile-screen">
								<img src="{{asset('public/landing')}}/images/mobile.png">
							</div>
						</div>
				    </div>
				  </div>
			</div>
		</div>
	</section>
	<!--end-->

	<!--download-app-->
	<section class="download-app">
		<div class="container">
			<div class="heading">
				<h3>Descarga App</h3> 
			</div>
			<div class="apps-link">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<div class="apps">
							<h4>Para Usuario</h4>
							<button> <img src="{{asset('public/landing')}}/images/play-store.png"> Play Store</button>
							<button> <img src="{{asset('public/landing')}}/images/apple-store.png"> Apple Store</button>
						</div>
					</div>

					<div class="col-md-6 col-sm-6">
						<div class="apps">
							<h4>Para Business</h4>
							<button> <img src="{{asset('public/landing')}}/images/play-store.png"> Play Store</button>
							<button> <img src="{{asset('public/landing')}}/images/apple-store.png"> Apple Store</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--end-->

	<footer>
		<div class="container">
			<div class="footer-body">
				<h4 class="heading">تابعنا:</h4>
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
    <script>
      var vid = document.getElementById("video");

      function playVid() {
        vid.play();
      }

      function pauseVid() {
        vid.pause();
        $("body").removeClass("show");
      }
    </script>
</body>
</html>