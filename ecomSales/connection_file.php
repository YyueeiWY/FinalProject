<?php

	$conn = mysqli_connect("", "root", "", "company");
	if (!$conn){
		die("Database Connection Failed" . mysqli_error($connection));
	}
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}

	function runQuery($query) {
		$result = mysqli_query($GLOBALS['conn'], $query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($conn, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}

   //function alert
      function phpAlert($msg) {
         echo '<script language="javascript">';
         echo 'alert ("' . $msg . '")';
         echo '</script>';
      }
	  
	function sidebar(){
	if (isset($_SESSION['LoginID'])){

		echo '<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="AddAgent.php">Add Agent</a>
			<a href="AddsupAgent.php">Add sup-Agent</a>
			<a href="AddSales.php">Add Sales</a>
			<a href="searchPage.php">Search Agent</a>
			<a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="logout.php">Logout ID</a>
			</div>';
	}else{}
}
	function navbar(){
		if (isset($_SESSION['LoginID'])){
			$username = $_SESSION['LoginID'];

		$query = "SELECT * FROM `login` WHERE username='$username'";
		
		if ($result = mysqli_query($GLOBALS['conn'],$query)){
			
		// Fetch one and one row
			while ($row = mysqli_fetch_row($result)){
				$profile_img = $row[6];
				
				echo "<div class='dropdown'>";
				echo "<div style='color:white;'><button onclick='myFunction()' class='dropbtn'><img src='img/icons/".$profile_img."' width='40px' height='40px' style='margin-right:10px;'></img>Welcome " . $username . "  &#x25BC;" . "</button></br></div>";
				echo "<div id='myDropdown' class='dropdown-content'>";
				echo "<a href='profile.php'>Profile</a>";
				echo "<a href='logout.php'>logout</a>";
				echo "</div>";
				echo "</div>";
				
				}
			}
        }
	}
?>
