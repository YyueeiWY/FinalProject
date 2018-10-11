<?php
   session_start();
   require('config_file.php');
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
  </head>

  <body id="page-top">
<style>
.dropbtn {
    background-color: rgba(0, 0, 0, .1);
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: rgba(0, 0, 0, .6);
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd}

.show {display:block;}
</style>

	<?php
	// SAVE NEW FUNCTION
	if (isset($_SESSION['LoginID'])){
		 $switch = $_SESSION['switch'];
		 if($switch == "login" || $switch == "agent"){
		 if (isset($_POST['btnSaveNew'])) {
         $AgentID = $_POST['agentID'];
         $SalesQuantity= $_POST['SalesQuantity'];
         $SaleDate= $_POST['SaleDate'];
		 $connect = get_mysqli();
		 
         if (mysqli_connect_errno()) 
            phpAlert("Save New Connection Error!");
         else {
			$radio = $_POST['switch'];
			if($radio == 'login'){
            $query = "Insert into sales values(NULL,'$AgentID', $SalesQuantity, '$SaleDate')";
				}else if($radio == 'agent'){
			$query = "Insert into sales_1 values(NULL,'$AgentID', $SalesQuantity, '$SaleDate')";
					}else if($radio == 'supagent'){
			$query = "Insert into sales_2 values(NULL,'$AgentID', $SalesQuantity, '$SaleDate')";
						}else{
				 phpAlert("Please select radio");
						}
            if (mysqli_query($connect, $query)){
               phpAlert("New Sales " . " added! from" . $AgentID);
				header("Refresh:0");
			}else
               phpAlert("Error Values! or Agent doesn't Exist!");
				header("Refresh:0");
			}
		 
         mysqli_close($connect);
      }
		 }else{
			 phpAlert("Only Admin can Insert!");
			 header('Location: index.php');
		 }
	}else{
	   phpAlert("Please Login before using the System.");
	   header('Location: login.php');
   }
	?>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
	<?php
		include 'sideBar.php';
	?>

		<span style="font-size:30px;cursor:pointer" onclick="openNav()" class="sideBar">&#9776; </span>
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">ROYARY Resources</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
		
		<div id="guest">
	    <?php 
			include 'navBar.php';
		?>
		
	  </div>
		
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
    </header>


    <!-- Add Agent -->
    <section class="py-0">
	<div class="limiter">
		<div class="container-login100">
		<!--Add Agent Form -->
			<div class="wrap-login100">

				<form class="login100-form validate-form" style="margin-left:auto; margin-right:auto;" method="POST">
					
					<span class="login100-form-title">
						Add Sales
					</span>
					<div class="radio" id="radio" style="margin-left:auto; margin-right:auto; text-align:center;">
					<input type="radio" name="switch" value="login" checked="checked"> Admin </input>&nbsp;&nbsp;
					<input type="radio" name="switch" value="agent"> Agent </input>&nbsp;&nbsp;
					<input type="radio" name="switch" value="supagent"> Sup Agent </input>
					</div>
					<br><br>
					
					<center><label>Personal Agent ID</label></center>
					<hr>
					<div class="wrap-input100 validate-input" data-validate = "Valid 5 digits ID">
						<input class="input100" type="text" name="agentID" placeholder="Agent ID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-address-card-o" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Sales Quantity is required">
						<input class="input100" type="text" name="SalesQuantity" placeholder="SalesQuantity">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-bar-chart" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Date is required">
						<input id="demo" class="input100" type="text" name="SaleDate" placeholder="SaleDate">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="button" onclick ="dateFunction()" class="login100-form-btn" onclick="dateFunction()" value="Date Today">
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="btnSaveNew">
							Save
						</button>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
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
	
	function dateFunction() {
		var date = new Date();
		var year = date.getFullYear();
		var month = date.getMonth()+1;
		var day = date.getDate();
		var n =	(year + "/" + month + "/" + day);
			//var d = n.toLocaleString();
			document.getElementById("demo").value = n;
}
	</script>
  </body>

</html>
