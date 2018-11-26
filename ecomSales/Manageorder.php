<?php
   session_start();

   include 'connection_file.php';
   
   if(isset($_POST['submit'])){
	   
		if($_POST['sortby'] == 'datedesc'){
			$sortby = 'B.date DESC LIMIT 0, 10';
		}else if($_POST['sortby'] == 'dateasc'){
			$sortby = 'B.date ASC LIMIT 0, 10';
		}else{
			$sortby = 'A.payid';
		}
		
   }else{
	   $sortby = 'B.date ASC LIMIT 0, 10';
   }
   
		$query = "SELECT B.id, A.payid
				FROM payment A JOIN productorder B ON A.id = B.payid 
				JOIN product C ON C.id = B.productid";
		
		if ($result = mysqli_query($conn,$query)){

		// Fetch one and one row
			while ($row = mysqli_fetch_row($result)){
				$rowid = $row[0];
				$inputid = 'value' . $row[0];
				$salesusername = $row[1];

				if(isset($_POST[$rowid]) && isset($_POST[$inputid])){
					$inputvalue = $_POST[$inputid];
					
					$setprogress = "UPDATE `productorder` SET `delivery`='sent' WHERE id = '$rowid';";
					if (mysqli_query($conn,$setprogress)){
						
						$itemtitle = 'Order ID:' . $rowid . ' ' . 'has been sent out';
						$itemcontent = 'Tracking code : ' . $inputvalue . '<br>' . 'Item will be arrived for 2 to 4 days with poslaju' . '<br>' . 'Please do track your item with following link: ' . '<br>' . 'https://www.poslaju.com.my/track-trace-v2/';
						$date = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));
						$expiredate = date("Y-m-d H:i:s", strtotime("+4 day", STRTOTIME(date('h:i:sa'))));
						$sendto = $salesusername;
						$receivedset = 'receiving';
						
							$sendnotif = "INSERT INTO `notification`(`id`, `title`, `content`, `date`, `notifid`, `receive`, `orderid`, `expiredate`) 
									VALUES (null, '$itemtitle', '$itemcontent', '$date', '$sendto', '$receivedset', '$rowid', '$expiredate')";
							if (mysqli_query($conn,$sendnotif)){
								
								header("Refresh:0");
								
							}else{phpAlert('Fail to delete');}	
						
					}else{phpAlert('Fail to set');}   
					
				}
			}
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
	
	<div class="cart-box"></div>
	
    <section id="portfolio1" class="m-t-50">
      <div class="container wow fadeInUp">
        <div class="section-header">
		<div class="aboout_logo">
		  <img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
          <h1 class="section-title">Manage Order</h1>
		  </div>
          <p class="section-description">Regen Cosmetic / South Korea</p>
        </div>
		<form method="post" enctype="multipart/form-data">
		<div class="m-t-50 m-b-20">
			<select name="sortby">
				<option value="payid">Name</option>
				<option value="datedesc">Date DESC</option>
				<option value="dateasc">Date ASC</option>
			</select>
		</div>
			<div style="width: 300px; margin-left: auto; margin-right: auto;">
				<div><input type="submit" name="submit" class="login100-form-btn" value="Sort"/></div>
			</div>
		</form>
	<div>				
		<div class="m-t-50">
		<?php
		if (isset($_SESSION['LoginID'])){
			$username = $_SESSION['LoginID'];

		/*uery = "SELECT product.name, product.code, product.categories, product.image,
				productorder.quantity, productorder.date, productorder.address, productorder.city, productorder.state, 
				productorder.postcode, productorder.contact, productorder.email, productorder.delivery
				FROM product
				INNER JOIN productorder ON product.id = productorder.productid ORDER BY date DESC LIMIT 0, 10";
		*/
		$query = "SELECT B.id, A.payid, B.date, B.quantity, B.delivery, B.address, B.city, B.state, B.postcode, B.contact, B.email,
				A.code, C.name, C.code, C.categories, C.image, C.price
				FROM payment A JOIN productorder B ON A.id = B.payid 
				JOIN product C ON C.id = B.productid ORDER BY $sortby";
		
		if ($result = mysqli_query($conn,$query)){
			$i = 0;
		// Fetch one and one row
			while ($row = mysqli_fetch_row($result)){
				$i++;
				$rowid = $row[0];
				$inputid = 'value' . $row[0];
				$salesusername = $row[1];
				$date = $row[2];
				$quantity = $row[3];
				$progress = $row[4];
				$address = $row[5];
				$city = $row[6];
				$state = $row[7];
				$postcode = $row[8];
				$contact = $row[9];
				$email = $row[10];
				$promocode = $row[11];
				$productname = $row[12];
				$img = $row[15];
				$productprice = $row[16];
   
				if($progress == 'sent'){}else{
		?>
		<form method="post" enctype="multipart/form-data">
		<div class="news col-md-12 m-t-20">
			<div class="col-md-12"><label class="text-uppercase"><h5>User Name : <strong><?php echo $salesusername; ?></strong></h5></label></div>
			<div class="col-md-12">Product Name : <strong><?php echo $productname; ?></strong></div>
				
				<div class="row">
					<div class="col-md-12"><img src="<?php echo $img; ?>" width="100px" height="100px"></div>
				</div>
				
				<div class="row">
				
			<div class="m-t-10 m-b-20" style="width: 300px; margin-left: auto; margin-right: auto;">
			<div><label><strong>Shipping Code :</strong></label></div>
				<div class="wrap-input100 validate-input">
					<input placeholder="Shipping Code..." id="shipcode" name="<?php echo $inputid; ?>" class="input100 container-margin" required>
					<span class="focus-input100"></span>
				</div>
			
				<div><button type="submit" name="<?php echo $rowid; ?>" class="login100-form-btn">Send</button></div>
			</div>
			
				</div>

				<div class="row">
					<div class="col-md-4">Promo Code : <strong><?php echo $promocode; ?></strong></div>
					<div class="col-md-4">Product Price : <strong><?php echo $productprice; ?></strong></div>
					<div class="col-md-4">Quantity : <strong><?php echo $quantity; ?></strong></div>
				</div>
				
				<div class="row">
					<div class="col-md-4">Address : <strong><?php echo $address; ?></strong></div>
					<div class="col-md-4">State : <strong><?php echo $state; ?></strong></div>
					<div class="col-md-4">Post Code : <strong><?php echo $postcode; ?></strong></div>
				</div>
				<div class="row">
					<div class="col-md-4">Email : <strong><?php echo $email; ?></strong></div>
					<div class="col-md-4">Contact : <strong><?php echo $contact; ?></strong></div>
					<div class="col-md-4">Date : <strong><?php echo $date; ?></strong></div>
				</div><hr>

				<div class="row">
					<div class="col-md-12 m-b-20">Status : <strong><?php echo $progress; ?></strong></div>
				</div>
		</div>
		</form>
		<?php
				}
			}
		  }
		}
		?>
		</div>
	</div>
      </div>
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