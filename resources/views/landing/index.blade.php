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
        <div class="container">
          <div class="top-nav clearfix">
            <div class="logo">
              <a href="{{route('index')}}"><img src="{{asset('public/landing')}}/images/logo.png" alt="Logo"></a>
            </div>
            <nav>
              <ul>
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
          <div class="yopo-logo">
            <img src="{{asset('public/landing')}}/images/logo.png" class="img-responsive" />
            <h3>What is Jamali?</h3>
            <p>
              Your service application is already here, everything that was
              difficult for you to do, it already has a solution, look for who
              can help you on our platform, or on the other hand if you want to
              help another to perform the tasks that he can not also you can Do
              it in our App, in an easy and safe easy way and according to the
              budget that you have estimated or if you are a server the value
              that you decided to charge.
            </p>

            <button class="g-bg play-video">
              <i class="fa fa-play-circle-o" aria-hidden="true"></i> Play Video
            </button>
          </div>
          <div class="yopo-mobile">
            <img src="{{asset('public/landing')}}/images/yopo-phone.png" class="img-responsive" />
          </div>
        </div>
      </div>
    </header>

    <div class="video-wrap">
      <div class="video-inner">
        <div class="video-main">
          <button onclick="pauseVid()" type="button">&#215;</button>
          <video id="video" controls>
            <source src="{{asset('public/landing')}}/videos/yopo-video-en.mp4" type="video/mp4" />
            Your browser does not support the video tag.
          </video>
        </div>
      </div>
    </div>

    <!--for user-->
    <section class="for-uv">
      <div class="container">
        <div class="col-md-5 col-sm-4">
          <div class="mobile-img">
            <img src="{{asset('public/landing')}}/images/m1.png" class="img-responsive" />
          </div>
        </div>
        <div class="col-md-7 col-sm-8">
          <div class="uv-data">
            <h3>For User:</h3>
            <p>
              The user is the one who hires the services offered on our platform
              and to hire a service you must perform the following processes
            </p>
            <div class="process-list">
              <ul>
                <li class="clearfix">
                  <span class="number">1</span>
                  <div class="process">
                    <h5>Process: 1</h5>
                    <p>Sign up for our platform</p>
                  </div>
                </li>
                <li class="clearfix">
                  <span class="number">2</span>
                  <div class="process">
                    <h5>Process: 2</h5>
                    <p>
                      Search for users near you who perform the service you want
                    </p>
                  </div>
                </li>
                <li class="clearfix">
                  <span class="number">3</span>
                  <div class="process">
                    <h5>Process: 3</h5>
                    <p>
                      Send service request to the user you chose and wait for
                      the user to sell accept your work
                    </p>
                  </div>
                </li>
                <li class="clearfix">
                  <span class="number">4</span>
                  <div class="process">
                    <h5>Process: 4</h5>
                    <p>Pay provisionally to Yopo while work is completed</p>
                  </div>
                </li>
                <li class="clearfix">
                  <span class="number">5</span>
                  <div class="process">
                    <h5>Process: 5</h5>
                    <p>
                      Free the payment and evaluate your server once you are
                      satisfied with the work
                    </p>
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
            <h3>For seller:</h3>
            <p>
              The seller is the one who offers the services through our platform
              and to perform them you must perform the following steps:
            </p>

            <div class="process-list">
              <ul>
                <li class="clearfix">
                  <span class="number">1</span>
                  <div class="process">
                    <h5>Process: 1</h5>
                    <p>Sign up for our platform</p>
                  </div>
                </li>
                <li class="clearfix">
                  <span class="number">2</span>
                  <div class="process">
                    <h5>Process: 2</h5>
                    <p>Add the services you want to perform</p>
                  </div>
                </li>
                <li class="clearfix">
                  <span class="number">3</span>
                  <div class="process">
                    <h5>Process: 3</h5>
                    <p>Accept job applications that you are willing to do</p>
                  </div>
                </li>
                <li class="clearfix">
                  <span class="number">4</span>
                  <div class="process">
                    <h5>Process: 4</h5>
                    <p>Do the work and report on the app that finished it</p>
                  </div>
                </li>
                <li class="clearfix">
                  <span class="number">5</span>
                  <div class="process">
                    <h5>Process: 5</h5>
                    <p>
                      Get your payment once the user accepts the job
                      successfully
                    </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 col-sm-4">
          <div class="mobile-img">
            <img src="{{asset('public/landing')}}/images/m2.png" class="img-responsive" />
          </div>
        </div>
      </div>
    </section>
    <!--end-->

    <!--why-us-->
    <section class="why-us">
      <div class="container">
        <div class="heading">
          <h3>Why we?</h3>
          <p>
            Because we are the only ones to bring comfort ease and simplicity to
            make the difficult easy. And some of the reasons we rely on to say
            the above are:
          </p>
        </div>
        <div class="features">
          <div class="row">
            <!--sinlge-feature-->
            <div class="col-sm-4">
              <div class="sinlge-feature">
                <div class="img">
                  <img src="{{asset('public/landing')}}/images/thunder.png" />
                </div>
                <h5>Fast and easy</h5>
                <p>
                  In a few seconds you can find who does the work that you do
                  not want to do, or if you are a vendor
                </p>
              </div>
            </div>

            <!--sinlge-feature-->
            <div class="col-sm-4">
              <div class="sinlge-feature">
                <div class="img">
                  <img src="{{asset('public/landing')}}/images/secure.png" />
                </div>
                <h5>Reliable and safe</h5>
                <p>
                  We try to have a history of both our users and our vendor you
                  can see their rates in a way that is reliable and safe to work
                  on our platform
                </p>
              </div>
            </div>

            <!--sinlge-feature-->
            <div class="col-sm-4">
              <div class="sinlge-feature">
                <div class="img">
                  <img src="{{asset('public/landing')}}/images/doller.png" />
                </div>
                <h5>Send and get payments</h5>
                <p>
                  We work with the PayPal platform to ensure that payments are
                  made correctly timely and efficiently
                </p>
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
          <h3>Application views</h3>
          <p>Here are some views of our application</p>
        </div>
        <div class="tabs-section">
          <ul class="nav nav-tabs">
            <li class="active">
              <a data-toggle="tab" href="{{asset('public/landing')}}/#user">For The User’s</a>
            </li>
            <li><a data-toggle="tab" href="{{asset('public/landing')}}/#vendore">For The Seller’s</a></li>
          </ul>

          <div class="tab-content">
            <div id="user" class="tab-pane fade in active">
              <div class="screenshot-slider">
                <div class="row">
                  <div class="large-12 columns">
                    <div class="loop owl-carousel owl-theme">
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/1.jpg" class="img-responsive" />
                      </div>
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/2.jpg" class="img-responsive" />
                      </div>
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/3.jpg" class="img-responsive" />
                      </div>
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/4.jpg" class="img-responsive" />
                      </div>
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/5.jpg" class="img-responsive" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mobile-screen">
                  <img src="{{asset('public/landing')}}/images/mobile.png" />
                </div>
              </div>
            </div>
            <div id="vendore" class="tab-pane fade">
              <div class="screenshot-slider">
                <div class="row">
                  <div class="large-12 columns">
                    <div class="loop owl-carousel owl-theme">
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/6.jpg" class="img-responsive" />
                      </div>
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/7.jpg" class="img-responsive" />
                      </div>
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/8.jpg" class="img-responsive" />
                      </div>
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/9.jpg" class="img-responsive" />
                      </div>
                      <div class="item">
                        <img src="{{asset('public/landing')}}/images/10.jpg" class="img-responsive" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mobile-screen">
                  <img src="{{asset('public/landing')}}/images/mobile.png" />
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
          <h3>Download application</h3>
        </div>
        <div class="apps-link">
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="apps">
                <h4>For User</h4>
                <button><img src="{{asset('public/landing')}}/images/play-store.png" /> Play Store</button>
                <button>
                  <img src="{{asset('public/landing')}}/images/apple-store.png" /> Apple Store
                </button>
              </div>
            </div>
 
            <div class="col-md-6 col-sm-6">
              <div class="apps">
                <h4>For Business</h4>
                <button><img src="{{asset('public/landing')}}/images/play-store.png" /> Play Store</button>
                <button>
                  <img src="{{asset('public/landing')}}/images/apple-store.png" /> Apple Store
                </button>
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
          <h4 class="heading">Follow us on</h4>
          <ul>
            <li>
              <a href="" target="_blank"
                ><i class="fa fa-facebook" aria-hidden="true"></i
              ></a>
            </li>
            <li>
              <a href="" target="_blank"
                ><i class="fa fa-instagram" aria-hidden="true"></i
              ></a>
            </li>
            <li>
              <a href=""
                ><i class="fa fa-twitter" aria-hidden="true"></i
              ></a>
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
