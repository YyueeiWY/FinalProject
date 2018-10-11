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
function cartAction(action,product_code) {
	var queryString = "";
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val();
			break;
			case "remove":
				queryString = 'action='+action+'&code='+ product_code;
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
	/*
						jQuery.ajax({
						url: "ajax_count.php",
						data:{
							a:'a'
						},
						type: "POST",
						success:function(data){
							//$("#cart-info").html(data.items);
							console.log('success to remove');
						},
						error:function (data){
							console.log('fail to remove');
						}
						});
		*/
				break;
				case "empty":
					$(".btnAddAction").show();
					$(".btnAdded").hide();
					
				break;
			}	 
		}
	},
	error:function (){}
	});
}
</script>
  </head>

  <body id="page-top">
<style>
.open-cart-button {
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  top: 150px;
  right: 0;
  z-index: 9;
}
.cancel{
	position: fixed;
	right: 23px;
	z-index: 99;
	margin-top: -13px;
}
/* The popup form - hidden by default */
.cart-popup {
  background-color: white;
  display: none;
  position: fixed;
  top: 140px;
  right: 0;
  padding: 20px;
  border: 3px solid #f1f1f1;
  border-radius: .50rem;
  z-index: 9;
}
.checkout-btn{
	margin: 10px;
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
	
	<div class="cart-box"></div>
	
    <section id="portfolio">
      <div class="container wow fadeInUp">
        <div class="section-header">
		<div class="aboout_logo">
          <h1 class="section-title">Products</h1>
		  </div>
          <p class="section-description">Regen Cosmetic / South Korea</p>
        </div>
        <div class="row">

          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter=".filter-app, .filter-card, .filter-logo, .filter-web" class="filter-active">All</li>
              <li data-filter=".filter-app">V Mask</li>
              <li data-filter=".filter-card">GOLD FOIL</li>
              <li data-filter=".filter-logo">packages</li>
              <li data-filter=".filter-web">Others</li>
            </ul>
          </div>
        </div>

        <div class="row" id="portfolio-wrapper">
          <div class="portfolio-item filter-app">
			<div class="line"><h2>V Mask</h2></div>
	<?php
	$product_array = runQuery("SELECT * FROM product WHERE categories = 'Mask' ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form id="frmCart">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="200px" height="200px"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div><input type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" />
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			?>
			<input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class='btnAddAction btn btn-primary text-uppercase js-scroll-trigger' cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class='btnAdded btn text-uppercase js-scroll-trigger' <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			</div>
			</form>
		</div>
	<?php
			}
	}
	?>
          </div>
		  <hr>
		  
          <div class="portfolio-item filter-card">
			<div class="line"><h2>Gold Mask</h2></div>
	<?php
	$product_array = runQuery("SELECT * FROM product WHERE categories = 'gold mask' ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form id="frmCart">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="200px" height="200px"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div><input type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" />
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			?>
			<input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class='btnAddAction btn btn-primary text-uppercase js-scroll-trigger' cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class='btnAdded btn text-uppercase js-scroll-trigger' <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			</div>
			</form>
		</div>
	<?php
			}
	}
	?>
          </div>
		  <hr>

          <div class="portfolio-item filter-logo">
			<div class="line"><h2>Packages</h2></div>
	<?php
	$product_array = runQuery("SELECT * FROM product WHERE categories = 'packages' ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form id="frmCart">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="200px" height="200px"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div><input type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" />
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			?>
			<input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class='btnAddAction btn btn-primary text-uppercase js-scroll-trigger' cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class='btnAdded btn text-uppercase js-scroll-trigger' <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			</div>
			</form>
		</div>
	<?php
			}
	}
	?>
          </div>
		  <hr>

          <div class="portfolio-item filter-web">
			<div class="line"><h2>Others</h2></div>
				<h4>Coming soon...</h4>
          </div>
		  <hr>
		  
        </div>

      </div>
    </section><!-- #portfolio -->
	
	<!-- cart -->
	<button id="openCart" class="open-cart-button btn-primary"><i class="fa fa-shopping-cart" style="font-size:24px"></i></button>

<div class="cart-popup col-md-6 col-sm-6" id="myCart">
<button type="button" id="closeCart" class="btn cancel">Close</button>
	<div class="cart-back-wrap">
        <h5 class="text-uppercase">Shopping Cart</h5>	
		<div id="shopping-cart">
			<div id="cart-item"></div>
		</div>
		<div><a href="checkout.php">Checkout</a></div>
		<div><a id="btnEmpty" class="cart-action text-uppercase js-scroll-trigger" onClick="cartAction('empty','');">Empty Cart</a></div>
	</div>
</div>
	

<div class="count_items" id="cart-info">
<?php 
if(isset($_SESSION["cart_item"])){
	echo count($_SESSION["cart_item"]); 
}else{
	echo 0; 
}
?>
</div>

	
<script>
$(document).ready(function () {
	cartAction('','');
})
</script>

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
	//Show Items in Cart
	$( "#openCart").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$("#myCart").css("display","block") //display cart box
	});

	//close Items in Cart
	$( "#closeCart").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$("#myCart").css("display","none") //display cart box
	});	

</script>