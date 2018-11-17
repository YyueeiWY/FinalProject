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
    <script type="text/javascript" src="check.js"></script>
	
  </head>

  <body id="page-top">
<style>
#regForm {
  margin: auto;
  font-family: Raleway;
  padding-bottom: 60px;
  min-width: 300px;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

#prevBtn {
  background-color: #bbbbbb;
  left:0;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
.container-margin{
	margin-top: 10px;
	margin-bottom: 10px;
}
</style>
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
				<i id="cart_count"><?php 
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

    <!-- Header -->


    <!-- Add Agent -->
    <section class="py-0">
	<div class="limiter">
		<div class="container-login100">
		<!--Add Agent Form -->
			<div class="wrap-login100">

				<form id="regForm" method="POST" action="registerSubmit.php">
				<h1>Register:</h1>
				<!-- One "tab" for each step in the form: -->
				<div class="tab container-margin">Login Info:
					<div class="wrap-input100 validate-input">
						<input placeholder="Username..." name="uname" id="userid" class="input100 container-margin" maxlength="20">
						<span class="focus-input100"></span>
					</div>
					
				<div id="status">
					<?php if (isset($_GET['error'])): ?>
						<!-- Display error when returning with error URL param? -->
					<?php endif;?>
				</div>	
					
					<div class="wrap-input100 validate-input">
						<input placeholder="Password..." id="password" name="pword" type="password" class="input100 container-margin" maxlength="20">
						<span class="focus-input100"></span>
					</div>
					
				<!--
					<div class="wrap-input100 validate-input">
						<input class="input100" id="confirm_password" onChange="isPasswordMatch();" type="password" name="re-Password" placeholder="Re-Password">
						<span class="focus-input100"></span>
					</div>
				-->
				</div>
				
				<div class="tab container-margin">Name:
					<div class="wrap-input100 validate-input">
						<input placeholder="First name..." id="fname" name="fname" class="input100 container-margin" maxlength="10">
						<span class="focus-input100"></span>
					</div>
				
					<div class="wrap-input100 validate-input">
						<input placeholder="Last name..." id="lname" name="lname" class="input100 container-margin" maxlength="10">
						<span class="focus-input100"></span>
					</div>
				</div>
				
				<div class="tab container-margin">Contact Info:
					<div class="wrap-input100 validate-input">
						<input placeholder="E-mail..." id="email" name="email" class="input100 container-margin" maxlength="50">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input">
						<input placeholder="Phone..." id="contact" name="phone" class="input100 container-margin">
						<span class="focus-input100"></span>
					</div>
				</div>
				
				<div style="overflow:auto;">
					<div style="float:right;">
					<button type="button" id="prevBtn" onclick="nextPrev(-1)" class="login100-form-btn">Previous</button>
					<button type="button" id="nextBtn" onclick="nextPrev(1)" class="login100-form-btn">Next</button>
					</div>
				</div>
				<!-- Circles which indicates the steps of the form: -->
				<div style="text-align:center;margin-top:40px;">
					<span class="step"></span>
					<span class="step"></span>
					<span class="step"></span>
					<span class="step"></span>
				</div>
				</form>

					<div class="text-center w-full p-t-120">
						<span class="login100-form-title">
							Have an account?
						</span>
						<a class="txt2" href="login.php">
							Sign In Now
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
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
	
	<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

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
	<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true, validation = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input"),
  userid = document.getElementById("userid"),
  password = document.getElementById("password"),
  fname = document.getElementById("fname"),
  lname = document.getElementById("lname"),
  email = document.getElementById("email"),
  contact = document.getElementById("contact");
  
  // A loop that checks every input field in the current tab:
  if(userid.value.length <= 4){
	  valid = false;
  }else{
	for (i = 0; i < y.length; i++) {
		// If a field is empty...
		if (y[i].value == "") {
		// add an "invalid" class to the field:
		y[i].className += " invalid";
		// and set the current valid status to false
		valid = false;
		}
	}
  }
  
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
  </body>

</html>
