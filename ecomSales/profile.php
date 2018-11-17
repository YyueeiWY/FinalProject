<?php
   session_start();

   include 'connection_file.php';
   
   if(isset($_POST['profile_profile_btn'])){
	   $username = $_SESSION['LoginID'];
	   

		if(isset($_POST['fname_edit']) || isset($_POST['lname_edit']) || isset($_POST['email_edit']) || isset($_POST['phone_edit'])){
			$fname_edit = $_POST['fname_edit'];
			$lname_edit = $_POST['lname_edit'];
			$email_edit = $_POST['email_edit'];
			$phone_edit = $_POST['phone_edit'];
			
				//upload file 
				$file = $_FILES['file'];
				$fileName = $_FILES['file']['name'];
			
			if($_POST['fname_edit'] == NULL || $_POST['lname_edit'] == NULL || $_POST['email_edit'] == NULL || $_POST['phone_edit'] == NULL){
				phpAlert('unable to set null');
				header("Refresh:0");
			}else{
				if($_FILES['file']['name'] == NULL || $_FILES['file']['name'] == ''){
					
					$query_edit = "UPDATE `login` SET `fname`='$fname_edit',`lname`='$lname_edit',`email`='$email_edit',`phone`='$phone_edit' WHERE username = '$username'";				
				
				}else{
					
				$delete_query = "SELECT * FROM login WHERE username = '$username'";
				if($select = mysqli_query($GLOBALS['conn'], $delete_query)){
					while ($row = mysqli_fetch_row($select)) {
							$file_name = $row[9];
							$file_type = $row[10];
					
						if($file_name != "" || $file_name != null){
							$dir = "img/profile-img/";
							$file_delete = $dir . $file_name;
							
							unlink($file_delete);
						}
					}
				}
					
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
									$fileDestination = 'img/profile-img/' . $fileNameNew;
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
					
					$query_edit = "UPDATE `login` SET `fname`='$fname_edit',`lname`='$lname_edit',`email`='$email_edit',`phone`='$phone_edit' ,`name`='$fileNameNew',`type`='$fileType' WHERE username = '$username'";
				
				}
				
				if (mysqli_query($conn, $query_edit)) {
					header("Refresh:0");
				} else {
					phpAlert('Invalid Information');
					header("Refresh:0");
				}
			}
		}
		
/*
				$insert = "INSERT INTO replies(CategoryId, SubcategoryId, TopicId, Author, Reply, Date_Posted, name, type) 
					VALUES ('$cid','$scid','$tid','$user','$comment','$date', '$fileNameNew', '$fileType')";
				$query = mysqli_query($connect, $insert);
				if ($query) {
					addreply($cid, $scid, $tid);
					header("Location: /readtopic.php?cid=$cid&scid=$scid&tid=$tid");
				} else {
					echo "<script>alert('something went wrong trying to reply please try again')</script>";
				}
	*/	
	 
		if(isset($_POST['address_1']) || isset($_POST['city_1']) || isset($_POST['state_1']) || isset($_POST['postcode_1'])){	
			$address_edit_1 = $_POST['address_1'];
			$city_edit_1 = $_POST['city_1'];
			$state_edit_1 = $_POST['state_1'];
			$postcode_edit_1 = $_POST['postcode_1'];
			
			if($_POST['postcode_1'] == NULL || $_POST['postcode_1'] == ''){
				$query_edit_1 = "UPDATE `user_address` SET `address`='$address_edit_1',`city`='$city_edit_1',`state`='$state_edit_1',`postcode`=null WHERE username = '$username' AND addnum = '1'";
			}else{
				$query_edit_1 = "UPDATE `user_address` SET `address`='$address_edit_1',`city`='$city_edit_1',`state`='$state_edit_1',`postcode`='$postcode_edit_1' WHERE username = '$username' AND addnum = '1'";
			}
			
			//$query_edit_1 = "UPDATE `user_address` SET `address`='$address_edit_1',`city`='$city_edit_1',`state`='$state_edit_1',`postcode`='$postcode_edit_1' WHERE username = '$username' AND addnum = '1'";
			
			if (mysqli_query($conn, $query_edit_1)) {
				header("Refresh:0");
			} else {
				phpAlert('Invalid Information');
				header("Refresh:0");
			}
		}
		
		if(isset($_POST['address_2']) || isset($_POST['city_2']) || isset($_POST['state_2']) || isset($_POST['postcode_2'])){
			$address_edit_2 = $_POST['address_2'];
			$city_edit_2 = $_POST['city_2'];
			$state_edit_2 = $_POST['state_2'];
			$postcode_edit_2 = $_POST['postcode_2'];
			
			if($_POST['postcode_2'] == NULL || $_POST['postcode_2'] == ''){
				$query_edit_2 = "UPDATE `user_address` SET `address`='$address_edit_2',`city`='$city_edit_2',`state`='$state_edit_2',`postcode`=null WHERE username = '$username' AND addnum = '2'";
			}else{
				$query_edit_2 = "UPDATE `user_address` SET `address`='$address_edit_2',`city`='$city_edit_2',`state`='$state_edit_2',`postcode`='$postcode_edit_2' WHERE username = '$username' AND addnum = '2'";
			}
			
			//$query_edit_1 = "UPDATE `user_address` SET `address`='$address_edit_1',`city`='$city_edit_1',`state`='$state_edit_1',`postcode`='$postcode_edit_1' WHERE username = '$username' AND addnum = '1'";
			
			if (mysqli_query($conn, $query_edit_2)) {
				header("Refresh:0");
			} else {
				phpAlert('Invalid Information');
				header("Refresh:0");
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

	<link href="css/cart.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
	<script type="text/javascript" src="data.json"></script>

  </head>

  <body id="page-top">
 	<style>
	body{
		background-image:url('img/background/polyagonal-web-design.jpg');
	}
	.containerWrap{
		background:white;
	}
	footer{
		background:white;
	}
	#myTable{
		text-align:center;
		margin-left:auto;
		margin-right:auto;
		width:100%;
		overflow:auto;
	}
	#date_row{
		padding-left:50px;
		padding-right:50px;
	}
	#agent_row{
		padding-left:10px;
		padding-right:10px;
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

    <!-- Header -->
    <header class="masthead">
    </header>

	<?php

	$admin = $_SESSION['admin'];

	if ($admin == 'admin'){
	?>
	<!-- Under Agent Chart-->
	<section class="py-0">
		<div class="container emp-profile m-t-150">
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" style="width: 20%; margin-left: auto; margin-right: auto;">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<div class="panel panel-container" style="width: 80%; margin-left: auto;">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div><em class="fa fa-xl fa-shopping-cart color-blue" style="font-size: 2em;"></em></div>
				<?php
				$totalsalesquery = "SELECT sum(quantity) FROM `productorder`";
				
				if ($result = mysqli_query($conn,$totalsalesquery)){
					
				// Fetch one and one row
					while ($row = mysqli_fetch_row($result)){
						$totalsale = $row[0]
				?>
						<div class="large"><?php echo $totalsale; ?></div>
				<?php
					}
				}
				?>
						<div class="text-muted">Total Sales</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div><em class="fa fa-xl fa fa-credit-card color-orange" style="font-size: 2em;"></em></div>
				<?php
				$totalpaymentquery = "SELECT count(id) FROM `payment`";
				
				if ($result = mysqli_query($conn,$totalpaymentquery)){
					
				// Fetch one and one row
					while ($row = mysqli_fetch_row($result)){
						$totalpayment = $row[0]
				?>
						<div class="large"><?php echo $totalpayment; ?></div>
				<?php
					}
				}
				?>
						<div class="text-muted">Total Payment Made</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div><em class="fa fa-xl fa-users color-teal" style="font-size: 2em;"></em></div>
				<?php
				$countuserquery = "SELECT count(userid) FROM `login`";
				
				if ($result = mysqli_query($conn,$countuserquery)){
					
				// Fetch one and one row
					while ($row = mysqli_fetch_row($result)){
						$countuser = $row[0]
				?>
						<div class="large"><?php echo $countuser; ?></div>
				<?php
					}
				}
				?>
						<div class="text-muted">Total Users</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Line Chart
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row--> 
        </div>
	</section>
<?php
	}else{
?>
	<div class="m-t-150"></div>
<?php
	}
?>

	<!-- profile -->
	<section class="py-0">
	
<?php
		if (isset($_SESSION['LoginID'])){
			$username = $_SESSION['LoginID'];

		$query = "SELECT * FROM `login` WHERE username='$username'";
		
		if ($result = mysqli_query($GLOBALS['conn'],$query)){
			
		// Fetch one and one row
			while ($row = mysqli_fetch_row($result)){
				$userId = $row[0];
				$username = $row[1];
				$password = $row['2'];
				$fname = $row[3];
				$lname = $row[4];
				$email = $row[5];
				$datejoin = $row[6];
				$phone = $row[7];
				$name = $row[9];
				$type = $row[10];
		
		?>
	
	<div class="container emp-profile">
			<form method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <?php 
							if (strcasecmp('image/jpg', $type) == 0 || strcasecmp('image/jpeg', $type) == 0
							|| strcasecmp('image/png', $type) == 0 || strcasecmp('image/pdf', $type) == 0 || strcasecmp('image/gif', $type) == 0) {
								echo "<div id='preview'><img src='img/profile-img/".$name."'></img></div>"; 
							}else{
								echo "<div id='preview'><img src='img/profile-img/default.png'></img></div>"; 
							}
							?>
                            <div class="file btn btn-lg btn-primary" id="file_edit" style="display:none;">
                                Change Photo
                                <input type="file" name="file" onchange="readURL(this)"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h2>
                                        <?php echo $fname ." ". $lname; ?>
                                    </h2>
								<div class="p-b-50">
                                    <h6>
                                        text...
                                    </h6>
								</div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>Order</p>
                            <a href="">Order History</a><br/>
                            <a href="">link..</a><br/>
                            <a href="">link..</a>
                            <p>SomeThing</p>
                            <a href="">link..</a><br/>
                            <a href="">link..</a><br/>
                            <a href="">link..</a><br/>
                            <a href="">link..</a><br/>
                            <a href="">link..</a><br/>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="username"><?php echo $username; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Password :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <div id="password"><input type="password" value="<?php echo $password; ?>" disabled/></div><!--?php echo $password; ?-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>First Name :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="fname"><?php echo $fname; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Last Name :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="lname"><?php echo $lname; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="email"><?php echo $email; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="phone"><?php echo $phone; ?></p>
                                            </div>
                                        </div>
										<div class="row">
										    <div class="col-md-3" style="margin-left:auto;">
												<button class='profile-edit-btn' id="profile_edit_btn">Edit Profile</button>
											</div>
										</div>
									<hr style="width:100%">
			<?php 
			$address_query = "SELECT * FROM `user_address` WHERE username='$username' AND addnum = '1'";
			
			if ($result = mysqli_query($GLOBALS['conn'],$address_query)){
				
			// Fetch one and one row
				while ($row = mysqli_fetch_row($result)){
					$address = $row[3];
					$city = $row[4];
					$state = $row[5];
					$postcode = $row[6];
			?>				
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address 1 :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="address_1"><?php echo $address; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>City :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="city_1"><?php echo $city; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>State :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="state_1"><?php echo $state; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Post Code :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="postcode_1"><?php echo $postcode; ?></p>
                                            </div>
                                        </div>
										<div class="row">
										    <div class="col-md-3" style="margin-left:auto;">
												<button class='profile-edit-btn' id="profile_address_1_btn">Edit Address</button>
											</div>
										</div>
									<hr style="width:100%">
			<?php 
				}
			}
			
			$address_query_1 = "SELECT * FROM `user_address` WHERE username='$username' AND addnum = '2'";
			
			if ($result = mysqli_query($GLOBALS['conn'],$address_query_1)){
				
			// Fetch one and one row
				while ($row = mysqli_fetch_row($result)){
					$address_1 = $row[3];
					$city_1 = $row[4];
					$state_1 = $row[5];
					$postcode_1 = $row[6];
			?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Address 2 :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="address_2"><?php echo $address_1; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>City :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="city_2"><?php echo $city_1; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>State :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="state_2"><?php echo $state_1; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Post Code :</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p id="postcode_2"><?php echo $postcode_1; ?></p>
                                            </div>
                                        </div>
										<div class="row p-b-100">
										    <div class="col-md-3" style="margin-left:auto;">
												<button class='profile-edit-btn' id="profile_address_2_btn">Edit Address</button>
											</div>
										</div>
							<?php
				}
			}
							?>
						
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Experience</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hourly Rate</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>10$/hr</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Total Projects</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>230</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>English Level</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Expert</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Availability</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>6 months</p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
				<div class="row">
					<div class="col-md-3" style="margin-left:auto;">
						<button class='login100-form-btn' id="profile_profile_btn" name="profile_profile_btn" style="display:none;">Save Change</button>
					</div>
				</div>		
			</form>
        </div>
<?php
			}
		}
	}
?>
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
	
	<script src="jschart/chart.min.js"></script>
	<script src="jschart/chart-data.php"></script>
	<script src="jschart/bootstrap-datepicker.js"></script>
	<script src="jschart/custom.js"></script>
	<script>
	window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>	
  </body>

</html>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
	
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
	//edit profile
	$( "#profile_edit_btn").click(function(e) {
		e.preventDefault(); 
		$('#fname').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $fname; ?>" value="<?php echo $fname; ?>" name="fname_edit" class="input100 container-margin" maxlength="50" required/><span class="focus-input100"></span></div>');
		$('#lname').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $lname; ?>" value="<?php echo $lname; ?>" name="lname_edit" class="input100 container-margin" maxlength="50" required/><span class="focus-input100"></span></div>');
		$('#email').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $email; ?>" value="<?php echo $email; ?>" name="email_edit" class="input100 container-margin" maxlength="50" required/><span class="focus-input100"></span></div>');
		$('#phone').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $phone; ?>" value="<?php echo $phone; ?>" name="phone_edit" class="input100 container-margin" maxlength="50" required/><span class="focus-input100"></span></div>');
		$('#profile_edit_btn').css("display","none");
		$('#profile_profile_btn').css("display", "block");
		$('#file_edit').css("display","block");
	});
	
	//edit address
	$( "#profile_address_1_btn").click(function(e) {
		e.preventDefault(); 
		$('#address_1').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $address; ?>" value="<?php echo $address; ?>" name="address_1" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#city_1').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $city; ?>" value="<?php echo $city; ?>" name="city_1" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#state_1').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $state; ?>" value="<?php echo $state; ?>" name="state_1" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#postcode_1').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $postcode; ?>" value="<?php echo $postcode; ?>" name="postcode_1" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#profile_address_1_btn').css("display","none");
		$('#profile_profile_btn').css("display", "block");
	});
	
	//edit address
	$( "#profile_address_2_btn").click(function(e) {
		e.preventDefault(); 
		$('#address_2').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $address_1; ?>" value="<?php echo $address_1; ?>" name="address_2" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#city_2').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $city_1; ?>" value="<?php echo $city_1; ?>" name="city_2" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#state_2').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $state_1; ?>" value="<?php echo $state_1; ?>" name="state_2" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#postcode_2').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $postcode_1; ?>" value="<?php echo $postcode_1; ?>" name="postcode_2" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#profile_address_2_btn').css("display","none");
		$('#profile_profile_btn').css("display", "block");
	});
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