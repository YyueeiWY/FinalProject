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
							dataType:"json",
							data:{
								add:'add'
							},
							type: "POST",
							success:function(data){
								$("#cart-count").html(data.items);
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
							success:function(data){
								$("#cart-count").html(data.items);
							},
							error:function (data){
								console.log('fail to remove');
							}
							});
							
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
      <div class="container wow fadeInUp">
        <div class="section-header">
		<div class="aboout_logo">
		<img src="img/icons/1j+ojl1FOMkX9WypfBe43D6kjfGDpBFGnBbJwXs1M3EMoAJtlSEp2j...png"></img>
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
	$product_array = runQuery("SELECT product.id, product.name, product.code, product.categories, product.image, product.price, stock.stock 
								FROM product INNER JOIN stock ON product.code = stock.code 
								WHERE product.categories = 'Mask' ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item fade-up">
			<form id="frmCart">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="200px" height="200px"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="product-price"><?php echo "Stock: ".$product_array[$key]["stock"]; ?></div>
			<div class="product-price"><?php echo "Product Code: ".$product_array[$key]["code"]; ?></div>
			<div><div><input type="text" class="quan_input" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" /></div>
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			if($product_array[$key]["stock"] > 0){
			?>
			<input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class='btnAddAction login100-form-btn' cart-action" onClick = "cartAction('add', '<?php echo $product_array[$key]["id"]; ?>', '<?php echo $product_array[$key]["code"]; ?>', '<?php echo $product_array[$key]["stock"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class='btnAdded profile-edit-btn' <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			<?php
			}else{}
			?>
			</div>
			</form>
		</div>
	<?php
			}
	}
	?>
          </div>
		  
          <div class="portfolio-item filter-card">
			<div class="line"><h2>Gold Mask</h2></div>
	<?php
	$product_array = runQuery("SELECT product.id, product.name, product.code, product.categories, product.image, product.price, stock.stock 
								FROM product INNER JOIN stock ON product.code = stock.code 
								WHERE product.categories = 'gold mask' ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form id="frmCart">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="200px" height="200px"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="product-price"><?php echo "Stock: ".$product_array[$key]["stock"]; ?></div>
			<div class="product-price"><?php echo "Product Code: ".$product_array[$key]["code"]; ?></div>
			<div><div><input type="text" class="quan_input" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" /></div>
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			
			if($product_array[$key]["stock"] > 0){
			?>
			<input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class='btnAddAction login100-form-btn' cart-action" onClick = "cartAction('add', '<?php echo $product_array[$key]["id"]; ?>', '<?php echo $product_array[$key]["code"]; ?>', '<?php echo $product_array[$key]["stock"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class='btnAdded profile-edit-btn' <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			<?php
			}else{}
			?>
			</div>
			</form>
		</div>
	<?php
			}
	}
	?>
          </div>

          <div class="portfolio-item filter-logo w3-animate-zoom">
			<div class="line"><h2>Packages</h2></div>
	<?php
	$product_array = runQuery("SELECT product.id, product.name, product.code, product.categories, product.image, product.price, stock.stock 
								FROM product INNER JOIN stock ON product.code = stock.code 
								WHERE product.categories = 'packages' ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form id="frmCart">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="200px" height="200px"></div>
			<div><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="product-price"><?php echo "Stock: ".$product_array[$key]["stock"]; ?></div>
			<div class="product-price"><?php echo "Product Code: ".$product_array[$key]["code"]; ?></div>
			<div><div><input type="text" class="quan_input" id="qty_<?php echo $product_array[$key]["code"]; ?>" name="quantity" value="1" size="2" /></div>
			<?php
				$in_session = "0";
				if(!empty($_SESSION["cart_item"])) {
					$session_code_array = array_keys($_SESSION["cart_item"]);
				    if(in_array($product_array[$key]["code"],$session_code_array)) {
						$in_session = "1";
				    }
				}
			if($product_array[$key]["stock"] > 0){
			?>
			<input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" value="Add to cart" class='btnAddAction login100-form-btn' cart-action" onClick = "cartAction('add', '<?php echo $product_array[$key]["id"]; ?>', '<?php echo $product_array[$key]["code"]; ?>', '<?php echo $product_array[$key]["stock"]; ?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> />
			<input type="button" id="added_<?php echo $product_array[$key]["code"]; ?>" value="Added" class='btnAdded profile-edit-btn' <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
			<?php
			}else{}
			?>
			</div>
			</form>
		</div>
	<?php
			}
	}
	?>
          </div>

          <div class="portfolio-item filter-web w3-animate-zoom">
			<div class="line"><h2>Others</h2></div>
				<h4>Coming soon...</h4>
          </div>
		  
        </div>

      </div>
    </section><!-- #portfolio -->

<!--
	<div class="cart-popup w3-animate-right" id="myCart">
	<button type="button" id="closeCart" class="cancel">Close</button>
		<div class="cart-back-wrap">
			<h5 class="text-uppercase">Shopping Cart</h5>	
			<div id="shopping-cart">
				<div id="cart-item"></div>
			</div>
			<div class="m-b-10"><a href="checkout.php" class="login100-form-btn">Checkout</a></div>
			<div class="m-b-10"><a id="btnEmpty" class="cart-action login100-form-btn" onClick="cartAction('empty','','');">Empty Cart</a></div>
		</div>
	</div>

	
<script>
$(document).ready(function () {
	cartAction('','','');
})
</script>
-->
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