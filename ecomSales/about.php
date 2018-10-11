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
	<link href="images/icons/RoyaryResources-4.png" rel="icon">

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

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
	<?php
		sidebar();
		
	if (isset($_SESSION['LoginID'])){
      echo '<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="sideBar">&#9776; </span>';
	}
	?>
      <div class="container">	
        <a class="navbar-brand js-scroll-trigger" href="index.php">ROYARY Resources</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
		
	<?php

		  if (!isset($_SESSION["LoginID"])){
          echo "<a class='btn btn-primary text-uppercase js-scroll-trigger' href='login.php'>Sign In</a>&nbsp;";
		  
		  echo "<a class='btn btn-primary text-uppercase js-scroll-trigger' href='register.php'>Sign Up</a>";
		  }else{

		echo '<div id="guest">';
			navBar();
		echo '</div>';
		  }
	  ?>
		
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger about_dropdown" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	

    <!-- Description -->
	<!--
    <section class="" id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
			<img src="images/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
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
				<img src="images/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
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
	
    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
			<img src="images/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">ROYARY RESOURCES</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>2017-2018</h4>
                    <h4 class="subheading">Our Humble Beginnings</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">We ROYARY RESOURCES platform supports for end user, online store , distributor and many more with easy application form.
						you only need to fill the application form and then our employee will contact you within 24 hours or less.</p>
                  </div>
                </div>
              </li>
			  
			  <!--
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>March 2011</h4>
                    <h4 class="subheading">An Agency is Born</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
			  
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>December 2012</h4>
                    <h4 class="subheading">Transition to Full Service</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
			  
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>July 2014</h4>
                    <h4 class="subheading">Phase Two Expansion</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                  </div>
                </div>
              </li>
			  -->
			  
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Be Part
                    <br>Of Our
                    <br>Story!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
			<img src="images/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">Regen.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/1798720_808684215855646_7566589140677885849_n.jpg" alt="">
              <h4>Tze Hao</h4>
              <p class="text-muted">product Leader</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://web.facebook.com/hao.tze" target="_blank">
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
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/10410425_10152616904762434_7877385868301943981_n.jpg" alt="">
              <h4>Chun Kit</h4>
              <p class="text-muted">Product Leader</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://web.facebook.com/lee.c.kit.16?ref=br_rs" target="_blank">
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
          </div>
		  
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/18814138_1374108042673800_945319169965492159_n.jpg" alt="">
              <h4>Danson</h4>
              <p class="text-muted">Lead Developer</p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="#">
                    <i class="fa fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="https://web.facebook.com/yyi.wong" target="_blank">
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
          </div>
		  
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
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