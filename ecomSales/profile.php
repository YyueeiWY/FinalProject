<?php
   session_start();

   include 'connection_file.php';
   
   if(isset($_POST['profile_edit_btn_active'])){
	   $username = $_SESSION['LoginID'];
	   $fname_edit = $_POST['fname_edit'];
	   $lname_edit = $_POST['lname_edit'];
	   $email_edit = $_POST['email_edit'];
	   $phone_edit = $_POST['phone_edit'];
	   
	   $query_edit = "UPDATE `login` SET `fname`='$fname_edit',`lname`='$lname_edit',`email`='$email_edit',`phone`='$phone_edit' WHERE username = '$username'";
	   
	if (mysqli_query($conn, $query_edit)) {
		header("Refresh:0");
	} else {
		phpAlert('Invalid Information');
		header("Refresh:0");
	}
   
   }
   
   if(isset($_POST['profile_address_1_btn_active'])){
	   $username = $_SESSION['LoginID'];
	   $address_edit_1 = $_POST['address_1'];
	   $city_edit_1 = $_POST['city_1'];
	   $state_edit_1 = $_POST['state_1'];
	   $postcode_edit_1 = $_POST['postcode_1'];
	   
	   $query_edit_1 = "UPDATE `user_address` SET `address`='$address_edit_1',`city`='$city_edit_1',`state`='$state_edit_1',`postcode`='$postcode_edit_1' WHERE username = '$username' AND addnum = '1'";
	   
	if (mysqli_query($conn, $query_edit_1)) {
		header("Refresh:0");
	} else {
		phpAlert('Invalid Information');
		header("Refresh:0");
	}
   
   }
   
   if(isset($_POST['profile_address_2_btn_active'])){
	   $username = $_SESSION['LoginID'];
	   $address_edit_2 = $_POST['address_2'];
	   $city_edit_2 = $_POST['city_2'];
	   $state_edit_2 = $_POST['state_2'];
	   $postcode_edit_2 = $_POST['postcode_2'];
	   
	   $query_edit_2 = "UPDATE `user_address` SET `address`='$address_edit_2',`city`='$city_edit_2',`state`='$state_edit_2',`postcode`='$postcode_edit_2' WHERE username = '$username' AND addnum = '2'";
	   
	if (mysqli_query($conn, $query_edit_2)) {
		header("Refresh:0");
	} else {
		phpAlert('Invalid Information');
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

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>     

	 <div class="container">	
		<a class="navbar-brand js-scroll-trigger" href="index.php">ROYARY Resources</a>
		
		<div id="guest">
	    <?php 
			navbar();
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
				$profile_img = $row[6];
				$datejoin = $row[7];
				$phone = $row[8];
		
		?>
	
	<div class="container emp-profile" style="margin-top: 10%;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <?php echo "<img src='img/icons/".$profile_img."'></img>"; ?>
                            <div class="file btn btn-lg btn-primary" style="display:none;">
                                Change Photo
                                <input type="file" id="file_edit" name="file"/>
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
										<div class="row">
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
					<button class='profile-submit-btn' id="profile_profile_btn" style="display:none;">Save Change</button>
				</div>
			</div>				
        </div>
<?php
			}
		}
	}
?>
	</section>
	
	<!-- Under Agent Chart-->
	<section class="py-0">
		<div class="container emp-profile">
            
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
		$('#fname').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $fname; ?>" value="<?php echo $fname; ?>" name="fname_edit" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#lname').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $lname; ?>" value="<?php echo $lname; ?>" name="lname_edit" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#email').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $email; ?>" value="<?php echo $email; ?>" name="email_edit" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
		$('#phone').html('<div class="wrap-input100 validate-input"><input placeholder="<?php echo $phone; ?>" value="<?php echo $phone; ?>" name="phone_edit" class="input100 container-margin" maxlength="50"><span class="focus-input100"></span></div>');
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