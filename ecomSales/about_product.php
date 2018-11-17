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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 

  </head>

  <body id="page-top">
 
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">

      <div class="container">	
        <a class="navbar-brand js-scroll-trigger" href="index.php">ROYARY Resources</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
		
        <div class="collapse navbar-collapse" id="navbarResponsive">
		<div id="guest">
	    <?php 
			navbar();
		?>	
		</div>
		
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item product-dropdown">
              <a class="nav-link ">Products</a>
			  	<div class="product-dropdown-content">
					<a href="cart.php">Mask</a>
					<a href="#">coming soon</a>
				</div>
            </li>
            <li class="nav-item about-dropdown">
              <a class="nav-link js-scroll-trigger" href="#">About</a>
				<div class="about-dropdown-content">
					<a href="about.php">About us</a>
					<a href="about_product.php">About product</a>
				</div>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Contact</a>
            </li>
          </ul>
		  
			<!-- cart -->
			<ul class="navbar-nav text-uppercase">
			<li class="nav-item open-cart-button cart-dropdown"><a href="order.php"><i class="fa fa-shopping-cart" style="font-size:24px"></i>
				<i id="cart-count"><?php 
				if(isset($_SESSION["cart_item"])){
					echo count($_SESSION["cart_item"]); 
				}else{
					echo 0; 
				}
				?></i>
			</a></li>
			<li class="nav-item open-cart-button news-dropdown"><a href="news.php"><i class="fa fa-columns" style="font-size:24px"></i></a></li>
			</ul>
			<!--
			<div class="count_items" id="cart-info">
				<?php 
				if(isset($_SESSION["cart_item"])){
					echo count($_SESSION["cart_item"]); 
				}else{
					echo 0; 
				}
				?>
			</div>
			-->
			<!-- cart -->
        </div>
      </div>
    </nav>
	
    <!-- Description -->
    <section class="" id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
			<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
            <h2 class="section-heading text-uppercase">Description</h2>
            <h3 class="section-subheading text-muted">Let science revolutionize your skincare routine. Founded by a group of Korean cosmetic surgeons and dermatologists, Regen is a medical beauty group which specialises in formulating effective products that deliver clinically proven results.</h3>
			<div class="m-b-50"><img class="col-lg-4" src="img/portfolio/4a41d0f2-0b42-4bf5-907f-5ede06db78d9.jpg"></img></div>
			<div class="m-b-50">
				<h2>YOUR V LINE SOLUTION</h2>
				<h6>A good percentage of the beauty trends we see come out of Korea are effective. Most are, at the very least, quite intriguing—this curiosity is definitely a large part of what has driven the K-beauty craze to peak levels this year. (That and the impossibly flawless complexion of the average Korean woman, of course.)
				So whenever we hear of a new fad taking Seoul by storm, needless to say, we're going to do everything we can to try it. And that, folks, is how V-masks made their way to the Byrdie offices. Like under-eye patches for your chin, these sheets promise a sharper, firmer jawline, no surgery needed. But do they actually get the job done? We had to find out.</h6>
			</div>
		  </div>
        </div>
        <div class="row text-center">
				 
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
	
	<section class="bg-light" id="describtion">
		<div>
		<div class="col-lg-12">
			<div class="container">
				<div class="text-center">
				<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
				<h2 class="section-heading text-uppercase">Description</h2>
				<h3 class="section-subheading text-muted">Let science revolutionize your skincare routine. Founded by a group of Korean cosmetic surgeons and dermatologists, Regen is a medical beauty group which specialises in formulating effective products that deliver clinically proven results.</h3>
				<div><h5>Regen 2 Step Synergy Effect V Mask</h5>
				<h3 class="text-muted m-b-50">consists of 2 Steps:</h3>
				<img class="col-lg-4" src="img/portfolio/4a41d0f2-0b42-4bf5-907f-5ede06db78d9.jpg"></img>
				</div>
				</div>
				
				<div><h6>Step 1: <span style="color:yellow;">Upper Face Mask.</span></h6> <h3 class="section-subheading text-muted">(4 types: Moisturizing, Whitening, Pore, Wrinkle) Different type of mask promotes different function as described. Choose the one which suits your skin condition.</h3></div>
				<div><h6>Step 2: <span style="color:yellow;">Lower Face Mask.</span></h6> <h3 class="section-subheading text-muted">Extracts from Halophyte, an organism which thrives in very salty environments, help eliminate bloating and water retention. The concept is simple, osmotic pressure created by the hypertonic environment lifts out excess water that bulks your face. The end result? A gorgeously slim V-line face with 91.5 degree angles, the "golden" measurement for a beautiful visage.</h3></div>
					</div>
				</div>
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