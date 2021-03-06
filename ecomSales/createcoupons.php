<?php
   session_start();

   include 'connection_file.php';
   
  //generate code 
   if(isset($_POST['submit'])){
	   
	   if(isset($_POST['code']) && isset($_POST['discount'])){
		$code = $_POST['code'];
		$discount = $_POST['discount'];
		$date = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));
		$expiredate = date("Y-m-d H:i:s", strtotime("+7 day", STRTOTIME(date('h:i:sa'))));
	   
		$query = "INSERT INTO `promocode`(`id`, `code`, `discount`, `used`, `date`, `expiredate`) 
			VALUES (null, '$code', '$discount', 'valid', '$date', '$expiredate')";
			
			if (mysqli_query($conn, $query)){
				phpAlert("Coupon Created");
				header("Refresh:0");
			}else{
				/*
				phpAlert("INSERT Unique PromoCode");
				header("Refresh:0");
				*/
			}
	   }
		
		if(isset($_POST['send'])){
			$sendto = $_POST['send'];
			$title = 'You just got a PromoCode!!!';
			$content = 'It expires after 7days. Use it before Expire! ' . '<br>' . 'Code : '. $code . ' ' . 'for' . ' ' . $discount . '%';
			$date = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));
			$receiveset = "received";
			$orderid = "0";
			
			$sendquery = "INSERT INTO `notification`(`id`, `title`, `content`, `date`, `notifid`, `receive`, `orderid`, `expiredate`) 
					VALUES (null, '$title', '$content', '$date', '$sendto', '$receiveset', '$orderid', null)";
			
			if (mysqli_query($conn, $sendquery)){
				phpAlert("Success send to user");
				header("Refresh:0");
			}else{phpAlert("Fail to send to user");}
		
		}else{phpAlert("Content Blank");}
   }
   
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
	
	<link href="css/cart.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 

<script>
function generatecode(){
	var lengthcode = $('#lengthcode').val();
	
	jQuery.ajax({
	url: "ajax_generate.php",
	dataType:"json",
	data:{
		lengthcode:lengthcode
	},
	type: "POST",
	success:function(data){
		$("#code").val(data.lengthcode);
	}
	});
}

</script>
<script>
function search(string){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("search").innerHTML = xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "search.php?s="+string, true);
	xmlhttp.send(null);
}
</script>
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
	
	<div class="cart-box"></div>
	
    <section id="portfolio1" class="m-t-50">
	<form method="post" action="#">
      <div class="container wow fadeInUp">
        <div class="section-header">
		<div class="aboout_logo">
		  <img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
          <h1 class="section-title">Coupons</h1>
		  </div>
          <p class="section-description">Regen Cosmetic / South Korea</p>
        </div>

<div class="row">				
	<div class="cart-popup col-md-6" id="myCart">
		<div class="row">
			<div style="width: auto;">
				<h2>Create Promo Code</h2>
			</div>
		</div>
		<div class="wrap-address m-t-50">

			<div>Length Of Code :</div>
			<div class="wrap-input100 validate-input">
				<input placeholder="Length Of Code..." id="lengthcode" name="lengthcode" class="input100 container-margin">
				<span class="focus-input100"></span>
			</div>
		
			<div><input type="button" onclick="generatecode()" id="generate" name="generate" class="login100-form-btn" value="Generate Code"/></div>
					
					<div>Promo Code :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="Promo Code..." id="code" name="code" class="input100 container-margin">
						<span class="focus-input100"></span>
					</div>
					
					<div>Discount percentage %:</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="Discount %..." name="discount" class="input100 container-margin">
						<span class="focus-input100"></span>
					</div>
			</div>
	</div>
	<div class="col-md-5">
		<div style="width: auto;">
			<h2>Notification</h2>
		</div>
		<div class="wrap-address m-t-50">

		<div>Search User : </div>
		<div class="wrap-input100 validate-input">
			<input placeholder="Send to..." id="send" name="send" autocomplete="off" class="input100 container-margin">
			<span class="focus-input100"></span>
		</div>
		</div>
	</div>
</div>

		<div style="width: 300px; margin-left: auto; margin-right: auto;">
			<div><input type="submit" name="submit" class="login100-form-btn" value="Create"/></div>
		</div>
      </div>
		</form>
    </section><!-- #portfolio -->

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

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
	<script src="js/sidebar.js"></script>
	
	<!-- JavaScript Libraries -->
	<!--<script src="lib/jquery/jquery.min.js"></script>-->
	<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="lib/easing/easing.min.js"></script>
	<script src="lib/wow/wow.min.js"></script>
	
	<script src="lib/waypoints/waypoints.min.js"></script>
	<script src="lib/counterup/counterup.min.js"></script>
	<script src="lib/superfish/hoverIntent.js"></script>
	<script src="lib/superfish/superfish.min.js"></script>
	
	<!-- Template Main Javascript File -->
	<script src="js/portfolio.js"></script>

	
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