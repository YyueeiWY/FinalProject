<?php
   session_start();

   include 'connection_file.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="stylesheet" type="text/css" href="css/style2.css" />
	
    <title>ROYARY Resources</title>
	<!-- Favicons -->
	<link href="img/icons/RoyaryResources-4.png" rel="icon">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
  
    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">
	<link href="css/sidebar.css" rel="stylesheet">
	
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>     
	  
	 <div class="container">	

		<a class="navbar-brand js-scroll-trigger" href="index.php">ROYARY Resources</a>
	 
		<div id="guest">
	    <?php 
			navbar();
		?>	
		</div>
	  
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger about_dropdown" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
	
    <!-- Header -->
	<!--
    <header id="home" class="masthead">
      <div class="container">
        <div class="intro-text">
		  <img src="images/icons/1RoyaryResources-4.png" width="200px" height="200px"><img>
          <div class="intro-lead-in text-color khaki">Welcome To Our Studio! </br> It's Nice To Meet You</div>
          <div class="text-color lightgold"><h1>ROYARY </br>Resources</h1><h6>beauty</h6></div> 
        </div>
      </div>
    </header>
	-->
	
	<div id="home">
		<div style="height:100px;">
		
			<ul class="cb-slideshow">
				<li><span>Image 01</span></li>
				<li><span>Image 02</span></li>
				<li><span>Image 03</span></li>
				<li><span>Image 04</span></li>
				<li><span>Image 05</span></li>
				<li><span>Image 06</span></li>
			</ul>
			
		</div>
	</div>

		<?php

		  if (!isset($_SESSION["LoginID"])){
          echo "<div class='wrap-sign-all'><div class='sign-text'>Sign In Here</div><div class='wrap-sign-in-block'><div><a class='login100-form-btn sign-in-block' href='login.php'>Sign In</a></div>";
		  
		  echo "<div><a class='login100-form-btn sign-in-block' href='register.php'>Sign Up</a></div></div></div>";
		  
		  }else{
			  
			echo "<div class='wrap-sign-all'><div class='sign-text1'>Shop Now</div><div class='wrap-sign-in-block'><div><a class='login100-form-btn sign-in-block' href='cart.php'>Shop Now</a></div>";
			
			echo "<div><a class='login100-form-btn sign-in-block' href='#'>My Order</a></div></div></div>";
		  }
	  ?>
	  
	<div style="height:20px;">
	</div>
	
    <!-- Description -->
	<!--
    <section class="" id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
			<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
            <h2 class="section-heading text-uppercase">Description</h2>
            <h3 class="section-subheading text-muted">Let science revolutionize your skincare routine. Founded by a group of Korean cosmetic surgeons and dermatologists, Regen is a medical beauty group which specialises in formulating effective products that deliver clinically proven results.</h3>
			<div><img class="col-lg-4 margin-down float-left" src="img/portfolio/4a41d0f2-0b42-4bf5-907f-5ede06db78d9.jpg"></img>
			<h2>YOUR V LINE SOLUTION</h2>
			<h6>A good percentage of the beauty trends we see come out of Korea are effective. Most are, at the very least, quite intriguing—this curiosity is definitely a large part of what has driven the K-beauty craze to peak levels this year. (That and the impossibly flawless complexion of the average Korean woman, of course.)
				So whenever we hear of a new fad taking Seoul by storm, needless to say, we're going to do everything we can to try it. And that, folks, is how V-masks made their way to the Byrdie offices. Like under-eye patches for your chin, these sheets promise a sharper, firmer jawline, no surgery needed. But do they actually get the job done? We had to find out.</h6>
			</div>
		  </div>
        </div>
        <div class="row text-center">
				  <!--
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-tags fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Web Security</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-tags fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Step 1: <span style="color:yellow;">Upper Face Mask.</h4>
            <p class="text-muted">(4 types: Moisturizing, Whitening, Pore, Wrinkle) Different type of mask promotes different function as described. Choose the one which suits your skin condition.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-tags fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Step 2: <span style="color:yellow;">Lower Face Mask.</h4>
            <p class="text-muted">Extracts from Halophyte, an organism which thrives in very salty environments, help eliminate bloating and water retention. The concept is simple, osmotic pressure created by the hypertonic environment lifts out excess water that bulks your face. The end result? A gorgeously slim V-line face with 91.5 degree angles, the "golden" measurement for a beautiful visage.</p>
          </div>
		  <!--
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fa fa-circle fa-stack-2x text-primary"></i>
              <i class="fa fa-tags fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Web Security</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
          </div>
        </div>
      </div>
    </section>
	
	<!-- Description
	<section class="describtion" id="describtion">
		<div>
		<div class="col-lg-12">
			<div class="container">
				<div class="text-center">
				<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
				<h2 class="section-heading text-uppercase">Description</h2>
				<h3 class="section-subheading text-muted">Let science revolutionize your skincare routine. Founded by a group of Korean cosmetic surgeons and dermatologists, Regen is a medical beauty group which specialises in formulating effective products that deliver clinically proven results.</h3>
				<div><h5>Regen 2 Step Synergy Effect V Mask</h5>
				<h3 class="text-muted">consists of 2 Steps:</h3></div>
				</div>
				<div><img class="col-lg-4 float-left margin-down" src="img/portfolio/4a41d0f2-0b42-4bf5-907f-5ede06db78d9.jpg"></img></div>
				</br>
				<div><div class="float-left padding-logo"><img class="border-rad" src="images/icons/numbers-one-in-ribbons-collection_1207-84.jpg"></img></div>
				<div><h6>Step 1: <span style="color:yellow;">Upper Face Mask.</span></h6> <h3 class="section-subheading text-muted">(4 types: Moisturizing, Whitening, Pore, Wrinkle) Different type of mask promotes different function as described. Choose the one which suits your skin condition.</h3></div></div>
				</br>
				<div><div class="float-left padding-logo"><img class="border-rad" src="images/icons/numbers-two-in-ribbons-collection_1207-84.jpg"></img></div>
				<h6>Step 2: <span style="color:yellow;">Lower Face Mask.</span></h6> <h3 class="section-subheading text-muted">Extracts from Halophyte, an organism which thrives in very salty environments, help eliminate bloating and water retention. The concept is simple, osmotic pressure created by the hypertonic environment lifts out excess water that bulks your face. The end result? A gorgeously slim V-line face with 91.5 degree angles, the "golden" measurement for a beautiful visage.</h3></div>
			</div>
		</div>
		</div>
	</section>
	Description -->
	
    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
			<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
            <h2 class="section-heading text-uppercase">New Products</h2>
            <h3 class="section-subheading-1 text-muted">2 STEP SYNERGY EFFECT MASK.</h3>
			<a class='btn btn-primary text-uppercase js-scroll-trigger bttm' href='cart.php'>Shop now</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/428758963.g_400-w_g.jpg" alt="" style="height:290px;">
            </a>
            <div class="portfolio-caption">
              <h4>Box</h4>
              <p class="text-muted">Each Box Consists of 5 Masks</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/495693842_00.g_400-w-st_g.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Pore</h4>
              <p class="text-muted">Clean Oil</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/495693842_01.g_400-w-st_g.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Whitening</h4>
              <p class="text-muted">Clean Dark/uneven skin</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/495693842_02.g_400-w-st_g.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Moisturizing</h4>
              <p class="text-muted">Dry/rough skin</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/495693842_03.g_400-w-st_g.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Wrinkle</h4>
              <p class="text-muted">Against Aging</p>
            </div>
          </div>
		  <!--
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fa fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="img/portfolio/06-thumbnail.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>Window</h4>
              <p class="text-muted">Photography</p>
            </div>
          </div>
		  -->
        </div>
      </div>
    </section>
	
	<!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Who will be most suitable for this mask ?</h3>
            <ol class="cta-text">
				<li>who has a big and angular face</li>
				<li>who has a wide looking chin</li>
				<li>who has a long chin or asymmetric face</li>
				<li>who has a square shape face </li>
			</ol>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="cart.php">Shop now</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->
	
	<!-- how to use -->
	<section>
		<div class="col-lg-12 text-center">
			<div class="container">
				<div>
				<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
				<h2 class="section-heading text-uppercase">Guide </h2>
				<h3 class="section-subheading-1 text-muted">Steps following below:</h3>
				<a class='btn btn-primary text-uppercase js-scroll-trigger bttm' href='cart.php'>Shop now</a>
				</div></br>
				<div><img style="" src="img/portfolio/f1e2863d-f9e0-44a8-b33a-eff61313c234.jpg" class="col-lg-10"></img></div>
				</br></br>
				<a class='btn btn-primary text-uppercase js-scroll-trigger bttm' href='cart.php'>Shop now</a>
				<h3 class="section-subheading text-muted">Video show below:</h3>
				<iframe class="col-lg-10 qoo10-src="https://www.youtube.com/embed/CsL9t2n3uNo" width="640" height="480" frameborder="0" src="https://www.youtube.com/embed/CsL9t2n3uNo"></iframe>
			</div>
		</div>
	</section>
	<!-- how to use -->
	
	<!-- before after
	<section class="bg-light">
		<div class="col-lg-12 text-center">
			<div class="container">
				<img src="images/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
				<h2 class="section-heading text-uppercase">BEFORE AND AFTER</h2>
				<h3 class="section-subheading text-muted">Clear & Gorgeous Slim V-line face after applying the Mask. </h3>
				<div><img src="img/portfolio/a168b536-ba80-4fc3-bb05-ab296b10dc33.JPG" class="col-lg-7"></img></div>
				</br>
				<h6 class="section-heading text-uppercase">The Mask is free of</h6>
				<div class="bAUl">
				<ul class="section-subheading text-muted">
					<li>Alcohol</li>
					<li>Colouring</li>
					<li>Mineral Oil</li>
					<li>Presevatives</li>
				</ul>
				</div>
			</div>
		</div>
	</section>
	before after -->
	
	<!-- Clients -->
    <section class="py-5 client-bg bttm">
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
	  
        <div class="row">
          <div class="col-lg-12 text-center">
			<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Send us a mail</h3>
          </div>
        </div>
		
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" method="POST" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit" style="border:none; border-radius:40px;"">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Your Website 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h3 class="text-uppercase">Box</h3>
                  <p class="item-intro text-muted">Each Box Consists of 5 Masks</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/428758963.g_400-w_g.jpg" alt="">
                  <h6>2 STEP SYNERGY EFFECT MASK</h6>
				  <h6>(Moisturizing/Wrinkle/Whitening/Pore)</h6>
                  <ul class="list-inline">
                    <li><strong>Date: June 2018</strong></li>
				  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h3 class="text-uppercase">Pore</h3>
                  <p class="item-intro text-muted">Clean Oil</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/495693842_00.g_400-w-st_g.jpg" alt="">
                  <p align="left"><span style="font-weight:bold;">Mission 1: </span>Clean Oily skin due to excessive sebun and clear the waste around the pores.</p>
				  <p align="left"><span style="font-weight:bold;">Mission 2: </span>To have beautiful face with 91.5V sleek lines at any agnle</p>
                  </br>
				  <h6 style="text-decoration: underline;">2 STEP SYNERGY EFFECT MASK</h6>
				  </br>
				  <div class="float-left"><img class="border-rad" src="img/icons/numbers-one-in-ribbons-collection_1207-84.jpg"></img></div>
				  <h6>Step 1:(UPPER FACE MASK)</h6>
				  <p class="text-muted">Calendula flower extract controls excessive sebum production, shrinking pores to give tighter, more refined skin. Mineral-rich alpine water maintains moisture in the skin.</p>
				  
				  <div class="float-left"><img class="border-rad" src="img/icons/numbers-two-in-ribbons-collection_1207-84.jpg"></img></div>
				  <h6>Step 2:(LOWER FACE 'V' MASK)</h6>
				  <p class="text-muted">Extracts from Halophyte, an organism which thrives in very salty environment, help eliminate bloating and water retention. The concept is simple, osmotic pressure created by the hypertonic environment lifts out excess water that bulks your face. The end result? A gorgeously slim V-line face with 91.5 degree angles, the "golden" measurement for a beautiful visage.</p>
				    
				  <ul class="list-inline">
                    <li><strong>Date: June 2018</strong></li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h3 class="text-uppercase">Whitening</h3>
                  <p class="item-intro text-muted">Clean dark/uneven skin</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/495693842_01.g_400-w-st_g.jpg" alt="">
                  <p align="left"><span style="font-weight:bold;">Mission 1: </span>Clean dark and uneven skin tone to crystal-clear brillance skin.</p>
				  <p align="left"><span style="font-weight:bold;">Mission 2: </span>To have beautiful face with 91.5V sleek lines at any agnle</p>
                  </br>
				  <h6 style="text-decoration: underline;">2 STEP SYNERGY EFFECT MASK</h6>
				  </br>
				  <div class="float-left"><img class="border-rad" src="img/icons/numbers-one-in-ribbons-collection_1207-84.jpg"></img></div>
				  <h6>Step 1:(UPPER FACE MASK)</h6>
				  <p class="text-muted">Niacinamide is a whitening factor, making skin lighter and more brillant. Algae extracts help calm and soothe stressed skin. Dark and uneven skin tone is changed to crystal-clear skin.</p>
				  
				  <div class="float-left"><img class="border-rad" src="img/icons/numbers-two-in-ribbons-collection_1207-84.jpg"></img></div>
				  <h6>Step 2:(LOWER FACE 'V' MASK)</h6>
				  <p class="text-muted">Extracts from Halophyte, an organism which thrives in very salty environment, help eliminate bloating and water retention. The concept is simple, osmotic pressure created by the hypertonic environment lifts out excess water that bulks your face. The end result? A gorgeously slim V-line face with 91.5 degree angles, the "golden" measurement for a beautiful visage.</p>
				    
				  <ul class="list-inline">
                    <li><strong>Date: June 2018</strong></li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h3 class="text-uppercase">Moisturizing</h3>
                  <p class="item-intro text-muted">Dry/rough skin</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/495693842_02.g_400-w-st_g.jpg" alt="">
                  <p align="left"><span style="font-weight:bold;">Mission 1: </span>Fills Moisture to dry and rough skin.</p>
				  <p align="left"><span style="font-weight:bold;">Mission 2: </span>To have beautiful face with 91.5V sleek lines at any agnle</p>
                  </br>
				  <h6 style="text-decoration: underline;">2 STEP SYNERGY EFFECT MASK</h6>
				  </br>
				  <div class="float-left"><img class="border-rad" src="img/icons/numbers-one-in-ribbons-collection_1207-84.jpg"></img></div>
				  <h6>Step 1:(UPPER FACE MASK)</h6>
				  <p class="text-muted">A double-effect cocktail of Hyaluronic Acid, which holds up to 6000x its own weight in moisture, and Aqua Acyl extract from Xylitol, which promotes a moisture barrier between your skin and the environment.</p>
				  
				  <div class="float-left"><img class="border-rad" src="img/icons/numbers-two-in-ribbons-collection_1207-84.jpg"></img></div>
				  <h6>Step 2:(LOWER FACE 'V' MASK)</h6>
				  <p class="text-muted">Extracts from Halophyte, an organism which thrives in very salty environment, help eliminate bloating and water retention. The concept is simple, osmotic pressure created by the hypertonic environment lifts out excess water that bulks your face. The end result? A gorgeously slim V-line face with 91.5 degree angles, the "golden" measurement for a beautiful visage.</p>
				    
				  <ul class="list-inline">
                    <li><strong>Date: June 2018</strong></li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h3 class="text-uppercase">Wrinkle</h3>
                  <p class="item-intro text-muted">Against Aging</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/495693842_03.g_400-w-st_g.jpg" alt="">
                  <p align="left"><span style="font-weight:bold;">Mission 1: </span>Help skin to fight against Aging.</p>
				  <p align="left"><span style="font-weight:bold;">Mission 2: </span>To have beautiful face with 91.5V sleek lines at any agnle</p>
                  </br>
				  <h6 style="text-decoration: underline;">2 STEP SYNERGY EFFECT MASK</h6>
				  </br>
				  <div class="float-left"><img class="border-rad" src="img/icons/numbers-one-in-ribbons-collection_1207-84.jpg"></img></div>
				  <h6>Step 1:(UPPER FACE MASK)</h6>
				  <p class="text-muted">A powerful cocktail of Adenosine, Glacial Ikoma protein and Glycoprotein promotes skin elasticity and smoothns uneven skin surfaces. Helps fight inital signs of aging to maintain a youthful complexion</p>
				  
				  <div class="float-left"><img class="border-rad" src="img/icons/numbers-two-in-ribbons-collection_1207-84.jpg"></img></div>
				  <h6>Step 2:(LOWER FACE 'V' MASK)</h6>
				  <p class="text-muted">Extracts from Halophyte, an organism which thrives in very salty environment, help eliminate bloating and water retention. The concept is simple, osmotic pressure created by the hypertonic environment lifts out excess water that bulks your face. The end result? A gorgeously slim V-line face with 91.5 degree angles, the "golden" measurement for a beautiful visage.</p>
				  
				  <ul class="list-inline">
                    <li><strong>Date: June 2018</strong></li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 6
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here
                  <h3 class="text-uppercase">Project Name</h3>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Window</li>
                    <li>Category: Photography</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fa fa-times"></i>
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
	<script src="js/sidebar.js"></script>
	
  </body>

</html>
<script>
	/* When the user clicks on the button, 
	toggle between hiding and showing the dropdown content */
	function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
	}

	// Close the dropdown if the user clicks outside of it
	window.onclick = function(event) {
	if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
		}
		}
	}
	}
</script>