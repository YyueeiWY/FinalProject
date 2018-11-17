<?php
   session_start();

   include 'connection_file.php';
   
  //generate code 
   if(isset($_POST['submit'])){
		if(isset($_POST['productname']) && isset($_POST['productcode']) && isset($_POST['categories']) && isset($_POST['productprice'])){
			$productname = $_POST['productname'];
			$productcode = $_POST['productcode'];
			$categories = $_POST['categories'];
			$productprice = $_POST['productprice'];
			$productstock = $_POST['productstock'];
			
			//upload file 
			$file = $_FILES['file'];
			$fileName = $_FILES['file']['name'];
			$fileTmpName = $_FILES['file']['tmp_name'];
			$fileSize = $_FILES['file']['size'];
			$fileError = $_FILES['file']['error'];
			$fileType = $_FILES['file']['type'];

			$fileExt = explode('.', $fileName);
			$fileActualExt = strtolower(end($fileExt));

				$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'gif', 'JPG', 'JPEG', 'PNG', 'PDF', 'GIF');
				if (in_array($fileActualExt, $allowed)) {
					if ($fileError === 0) {
						if ($fileSize < 10000000) {
							$fileNameNew = uniqid('', true) . "." . $fileActualExt;
							if (strcasecmp('image/jpg',$fileType) ==0||strcasecmp('image/jpeg', $fileType) ==0
								||strcasecmp('image/png', $fileType)==0 ||strcasecmp('image/pdf' ,$fileType)==0 
								||strcasecmp('image/gif',$fileType)==0) {
								$fileDestination = 'img/product-images/' . $fileNameNew;
							}
							move_uploaded_file($fileTmpName, $fileDestination);
						} else {
							echo "Your file is too big!";
							return false;
						}
					} else {
						echo "There was an error uploading your file!";
						return false;
					}
				} else {
					echo "You cannot upload files of this type!";
					return false;
				}
				
				$imgname = 'img/product-images/' . $fileNameNew;
				
				$query = "INSERT INTO `product`(`id`, `name`, `code`, `categories`, `image`, `price`) 
				VALUES (null, '$productname', '$productcode', '$categories', '$imgname ', '$productprice')";
				
				if (mysqli_query($conn, $query)) {
					
					$stockquery = "INSERT INTO `stock`(`id`, `code`, `stock`) VALUES (null, '$productcode', '$productstock')";
					
					if (mysqli_query($conn, $stockquery)) {
						phpAlert('success upload product');
						header("Refresh:0");
					} else {
						phpAlert('fail to upload product stock');
						header("Refresh:0");
					}
					
					header("Refresh:0");
				} else {
					phpAlert('Invalid Information');
					phpAlert('fail to upload product');
					header("Refresh:0");
				}

		}
   }
   
if(isset($_POST['submitstock'])){
	$restockcode = $_POST['restockcode'];
	$productunit = $_POST['productunit'];
	
		$restockquery = "UPDATE `stock` SET `stock` = stock +'$productunit' WHERE stock.code = '$restockcode';";
		
		if (mysqli_query($conn, $restockquery)) {
			phpAlert('success Restock product');
			header("Refresh:0");
		} else {
			phpAlert('fail to Restock product');
			header("Refresh:0");
		}
}

if(isset($_POST['deleteproduct'])){
	$deletecode = $_POST['deletecode'];
	
		$deletestockquery = "DELETE FROM `stock` WHERE code = '$deletecode'";
		
		if (mysqli_query($conn, $deletestockquery)) {
			
			$deletequery = "DELETE FROM `product` WHERE code = '$deletecode'";
						
			if (mysqli_query($conn, $deletequery)) {
				phpAlert('success delete product');
				header("Refresh:0");
			} else {
				phpAlert('fail to delete product');
				header("Refresh:0");
			}

		} else {
			phpAlert('fail to delete product');
			header("Refresh:0");
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
	<form method="post" enctype="multipart/form-data">
      <div class="container wow fadeInUp">
        <div class="section-header">
		<div class="aboout_logo">
		  <img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
          <h1 class="section-title">Add Product</h1>
		  </div>
          <p class="section-description">Regen Cosmetic / South Korea</p>
        </div>

<div class="row">				
	<div class="cart-popup col-md-6" id="myCart">
		<div class="row">
			<div style="width: auto;">
				<h2>Product Details</h2>
			</div>
		</div>
		<div class="wrap-address m-t-50">

			<div>Product Name :</div>
			<div class="wrap-input100 validate-input">
				<input placeholder="Product Name..." id="productname" name="productname" class="input100 container-margin" required>
				<span class="focus-input100"></span>
			</div>
					
					<div>Product Code :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="Product Code..." id="productcode" name="productcode" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					
					<div>Product Categories :</div>
					<div>
					<select class="login100-form-btn" name="categories">
						<option value="Mask">Mask</option>
						<option value="gold Mask">Gold Mask</option>
						<option value="packages">packages</option>
					</select>
					</div>
					
					<div>Product Price :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="Product Price..." id="productprice" name="productprice" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					
					<div>Product Stock :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="Product Stock..." id="productstock" name="productstock" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
			</div>
	</div>
	<div class="col-md-5">
		<div style="width: auto;">
			<h2>Product Image</h2>
		</div>
		<div class="wrap-address m-t-50">
		<div class="profile-img">
			<div id='preview'></div>
			<div class="file btn btn-lg btn-primary" id="file_edit">
				Change Photo
                <input type="file" name="file" onchange="readURL(this)"/>
            </div>
			</div>
		</div>
	</div>
</div>

		<div style="width: 300px; margin-left: auto; margin-right: auto;">
			<div><input type="submit" name="submit" class="login100-form-btn" value="Upload"/></div>
		</div>
      </div>
		</form>
		
	<div class="m-t-50">
		<form method="post">
			<div class="container wow fadeInUp">
				<div class="section-header">
					<div class="aboout_logo">
						<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
						<h1 class="section-title">Restock Product</h1>
					</div>
					<p class="section-description">Regen Cosmetic / South Korea</p>
				</div>
				
				<div class="row">
				<div class="cart-popup col-md-6" id="myCart">
					<div class="wrap-address m-t-50">
						<div>Product Code :</div>
						<div class="wrap-input100 validate-input">
							<input placeholder="Product Code..." id="restockcode" name="restockcode" class="input100 container-margin" required>
							<span class="focus-input100"></span>
						</div>
						
						<div>Product Unit:</div>
						<div class="wrap-input100 validate-input">
							<input placeholder="Product Unit..." id="productunit" name="productunit" class="input100 container-margin" required>
							<span class="focus-input100"></span>
						</div>
					</div>
				</div>
	
				</div>
			</div>
		
			<div style="width: 300px; margin-left: auto; margin-right: auto;">
				<div><input type="submit" name="submitstock" class="login100-form-btn" value="Submit Stock"/></div>
			</div>
		</form>
	</div>
	
	<div class="m-t-50">
		<form method="post">
			<div class="container wow fadeInUp">
				<div class="section-header">
					<div class="aboout_logo">
						<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
						<h1 class="section-title">Delete Product</h1>
					</div>
					<p class="section-description">Regen Cosmetic / South Korea</p>
				</div>
				
				<div class="row">
				<div class="cart-popup col-md-6" id="myCart">
					<div class="wrap-address m-t-50">
						<div>Product Code :</div>
						<div class="wrap-input100 validate-input">
							<input placeholder="Product Code..." id="deletecode" name="deletecode" class="input100 container-margin" required>
							<span class="focus-input100"></span>
						</div>
					</div>
				</div>
	
				</div>
			</div>
		
			<div style="width: 300px; margin-left: auto; margin-right: auto;">
				<div><input type="submit" name="deleteproduct" class="login100-form-btn" value="Delete Product"/></div>
			</div>
		</form>
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
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
				$('#preview').empty();
                reader.onload = function (e) {
					if(input.files[0].type.includes('image')){
						//$('#preview').attr('src', e.target.result);
						$('#preview').append("<img id='image' src="+  e.target.result +">")
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>