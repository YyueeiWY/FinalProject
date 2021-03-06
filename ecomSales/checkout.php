<?php
   session_start();

   include 'connection_file.php';
   
		if(empty($_SESSION["cart_item"])){
			phpAlert('Cart Empty');
			header('Location: order.php');
		}
		
  if(isset($_GET['submit'])){
	  $fname = $_GET['fname'];
	  $lname = $_GET['lname'];
	  $address = $_GET['address'];
	  $state = $_GET['state'];
	  $city = $_GET['city'];
	  $postcode = $_GET['postcode'];
	  $contact = $_GET['contact'];
	  $email = $_GET['email'];
	  if(isset($_GET['promocode'])){
		  $promocode = $_GET['promocode'];
	  }else{
		  $promocode = '';
	  }
	  header("Location: pay.php?fname=$fname&lname=$lname&address=$address&state=$state&city=$city&postcode=$postcode&contact=$contact&email=$email&promocode=$promocode");
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
	
function showEditBox(editobj,id) {
	$('#frmAdd').hide();
	$(editobj).prop('disabled','true');
	var currentMessage = $("#message_" + id + " .message-content").html();
	var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
	$("#message_" + id + " .message-content").html(editMarkUp);
}
function cancelEdit(message,id) {
	$("#message_" + id + " .message-content").html(message);
	$('#frmAdd').show();
}
function cartAction(action,product_id, product_code, current_quantity) {
	var buying_quantity = $("#qty_"+product_code).val();
	if(Number(buying_quantity) > Number(current_quantity)){
		
		alert('You quantity is exceed the current stock!!');
		location.reload();
	
	}else{
	var queryString = "";
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&id='+product_id+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val();
			break;
			case "remove":
				queryString = 'action='+action+'&id='+product_id+'&code='+ product_code;
			break;
			case "empty":
				queryString = 'action='+action;
			break;
		}	 
	}
	
	jQuery.ajax({
	url: "ajax_action.php",
	data:queryString,
	type: "POST",
	success:function(data){
		$("#cart-item").html(data);

		if(action != "") {
			switch(action) {
				case "add":
					$("#add_"+product_code).hide();
					$("#added_"+product_code).show();
						
						jQuery.ajax({
						url: "ajax_count.php",
						data:{
							add:'add'
						},
						type: "POST",
						dataType:"json",
						success:function(data){
							$("#cart-info").html(data.items);
						},
						error:function (data){
							console.log('fail to add');
						}
						});
						
				break;
				case "remove":
					$("#add_"+product_code).show();
					$("#added_"+product_code).hide();
						
						jQuery.ajax({
						url: "ajax_remove.php",
						data:{
							remove:'remove'
						},
						type: "POST",
						dataType:"json",
						success:function(data){
							$("#cart-info").html(data.items);
							$("#cart-info1").html(data.items);
						}
						});
						
						jQuery.ajax({
						url: "ajax_remove.php",
						data:{
							summary:'summary'
						},
						type: "POST",
						success:function(data){
							$("#producttotal").html(data);
						}
						});
						
				break;
				case "empty":
					$(".btnAddAction").show();
					$(".btnAdded").hide();
					
						jQuery.ajax({
						url: "ajax_remove.php",
						data:{
							empty:'empty'
						},
						type: "POST",
						dataType:"json",
						success:function(data){
							$("#cart-info").html(data.items);
							$("#cart-info1").html(data.items);
						}
						});
						
						jQuery.ajax({
						url: "ajax_remove.php",
						data:{
							summary:'summary'
						},
						type: "POST",
						success:function(data){
							$("#producttotal").html(data);
						}
						});
					
				break;
			}	 
		}
	},
	error:function (){}
	});
}
}

function promobtn(){
	var promocode = $('#promocode').val();
	
	jQuery.ajax({
	url: "ajax_promo.php",
	dataType:"json",
	data:{
		promocode:promocode
	},
	type: "POST",
	success:function(data){
		$("#promocode").val(data.promo);
		$("#validcode").html(data.validcode);
	}
	});
}

</script>
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
	<form method="get" action="#">
      <div class="container wow fadeInUp">
        <div class="section-header">
		<div class="aboout_logo">
		  <img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
          <h1 class="section-title">Checkout</h1>
		  </div>
          <p class="section-description">Regen Cosmetic / South Korea</p>
        </div>

<div class="row">				
	<div class="cart-popup" id="myCart">
		<div class="row">
			<div style="width: auto;">
				<h2>DELIVERY ADDRESS</h2>
			</div>
		</div>
		<div class="wrap-address m-t-50">
			<?php 
	if(isset($_SESSION['LoginID'])){
		
		$username = $_SESSION['LoginID'];
			
		$query = "SELECT * FROM `login` WHERE username='$username'";
		
		if ($result = mysqli_query($GLOBALS['conn'],$query)){
			
		// Fetch one and one row
			while ($row = mysqli_fetch_row($result)){
				$fname = $row[3];
				$lname = $row[4];
				$email = $row[5];
				$phone = $row[7];
		
				
				$address_query = "SELECT * FROM `user_address` WHERE username='$username' AND addnum = '1'";
				
				if ($result = mysqli_query($GLOBALS['conn'],$address_query)){
					
				// Fetch one and one row
					while ($row = mysqli_fetch_row($result)){
						$address = $row[3];
						$city = $row[4];
						$state = $row[5];
						$postcode = $row[6];
			?>		
					<div>Your name :</div>
						<div class="inline">
						<div class="wrap-input100 validate-input">
							<input placeholder="first name..." name="fname" value="<?php echo $fname; ?>" class="input100 container-margin" required>
							<span class="focus-input100"></span>
						</div>
					</div>
					<div class="inline">
						<div class="wrap-input100 validate-input">
							<input placeholder="last name..." id="lname" name="lname" value="<?php echo $lname; ?>" class="input100 container-margin" required>
							<span class="focus-input100"></span>
						</div>
					</div>
					
					<div>Address :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="address*..." name="address" value="<?php echo $address; ?>" class="input100 container-margin"required>
						<span class="focus-input100"></span>
					</div>
					
					<div>State :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="state..." id="state" value="<?php echo $state; ?>" name="state" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					
					<div>City :</div>
					<div class="inline">
					<div class="wrap-input100 validate-input">
						<input placeholder="city..." name="city" value="<?php echo $city; ?>" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					</div>
					
					<div>Post Code :</div>
					<div class="inline">
					<div class="wrap-input100 validate-input">
						<input placeholder="postcode..." id="postcode" value="<?php echo $postcode; ?>" name="postcode" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					</div>
					
					<div>Contact :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="contact..." id="contact" name="contact" value="<?php echo $phone; ?>" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					
					<div>Email :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="email..." id="email" name="email" value="<?php echo $email; ?>" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
			<?php
					}
				}
			}
		}
	}else{
		?>
					<div>Your name :</div>
						<div class="inline">
						<div class="wrap-input100 validate-input">
							<input placeholder="first name..." name="fname" class="input100 container-margin" required>
							<span class="focus-input100"></span>
						</div>
					</div>
					<div class="inline">
						<div class="wrap-input100 validate-input">
							<input placeholder="last name..." id="lname" name="lname" class="input100 container-margin" required>
							<span class="focus-input100"></span>
						</div>
					</div>
					
					<div>Address :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="address*..." name="address" class="input100 container-margin"required>
						<span class="focus-input100"></span>
					</div>
					
					<div>State :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="state..." id="state" name="state" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					
					<div>City :</div>
					<div class="inline">
					<div class="wrap-input100 validate-input">
						<input placeholder="city..." name="city" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					</div>
					
					<div>Post Code :</div>
					<div class="inline">
					<div class="wrap-input100 validate-input">
						<input placeholder="postcode..." id="postcode" name="postcode" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					</div>
					
					<div>Contact :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="contact..." id="contact" name="contact" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
					
					<div>Email :</div>
					<div class="wrap-input100 validate-input">
						<input placeholder="email..." id="email" name="email" class="input100 container-margin" required>
						<span class="focus-input100"></span>
					</div>
		<?php
	}
			?>
			</div>
		<!-- <div class="cart-item" id="cart-item"></div> -->
		
	</div>

<div>
	<div class="checkoutbox">
		<div class="checkout-wrap">
			<div class="m-b-10"><input type="submit" name="submit" class="login100-form-btn" value="Preview & Pay"/></div>
			<div class="text-uppercase p-b-20"><strong>ORDER SUMMARY:</strong></div>
			<div class="checkout-summary">
			<div class="text-muted text-uppercase count_items" id="cart-info1">
				<?php
				if(isset($_SESSION["cart_item"])){
					echo count($_SESSION["cart_item"]); 
				}else{
					echo "0"; 
				}
				?> Products
				</div>
			<div id="producttotal">
				<div class="row">
                    <div class="col-md-6">
                        <label>Product total:</label>
                    </div>
                    <div class="col-md-6">
                        <p id="price">RM
							<?php
							if(isset($_SESSION["cart_item"])){
								$item_total = 0;
									
								foreach ($_SESSION["cart_item"] as $item){
									$item_total += ($item["price"]*$item["quantity"]);
								}
								echo $item_total;
							}
							?> 
						</p>
                    </div>
				</div>

				<div class="row">
                    <div class="col-md-6">
                        <label>Delivery:</label>
                    </div>
                    <div class="col-md-6">
                        <p id="delivery">Free</p>
                    </div>
				</div>
				
				<div class="row p-b-30">
                    <div class="col-md-6">
                        <label>GST:</label>
                    </div>
                    <div class="col-md-6">
                        <p id="gst">6%</p>
                    </div>
				</div>
				
				<div class="row">
                    <div class="col-md-6">
                        <label>Total Amount:</label>
                    </div>
                    <div class="col-md-6">
                        <p id="producttotaltax">RM
							<?php
							if(isset($_SESSION["cart_item"])){
								$item_total = 0;
									
								foreach ($_SESSION["cart_item"] as $item){
									$item_total += ($item["price"]*$item["quantity"]);
								}
								$tax = ($item_total/100)*6;
								echo $gst = ($item_total+$tax);
							}
							?> 
						</p>
                    </div>
				</div>
			</div>
			</div>
		</div>
	</div>
	
	<div class="promotbox">
		<div class="p-t-10">
			<div class="promobox-summary" id="openPromo">
				<strong>Promo Code</strong><i class="fa fa-tags" style="font-size: 20px; padding: 3px;"></i>
			</div>
		</div>
	</div>

	<div class="promotbox-content" id="myPromo">
		<div>
			<div class="m-b-10 promobox-content-summary">
				<div id="promopage">
					<div class="m-b-10"><button type="button" onclick="promobtn()" class="login100-form-btn">Apply</button></div>
						<div class="wrap-input100 validate-input">
							<input placeholder="promo code..." id="promocode" name="promocode" type="text" class="input100 container-margin">
							<span class="focus-input100"></span>
						</div>
					<div><h6 id="validcode"></h6></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
		<div style="width: 300px; margin-left: auto; margin-right: auto;">
			<div><input type="submit" name="submit" class="login100-form-btn" value="Preview & Pay"/></div>
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
<script>
$(document).ready(function(){
    $("#openPromo").click(function(){
        $("#myPromo").toggle();
    });
});
</script>