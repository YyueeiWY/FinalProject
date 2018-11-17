<?php

	$conn = mysqli_connect("", "root", "", "company");
	if (!$conn){
		die("Database Connection Failed" . mysqli_error($conn));
	}
	
	function randomString($length) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
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
				$name = $row[9];
				$type = $row[10];
				$admin = $row[8];
				
				if($admin == 'admin'){
					echo "<div class='dropdown'>";
					echo "<div style='color:white;'><button onclick='myFunction()' class='dropbtn'>";
						if (strcasecmp('image/jpg', $type) == 0 || strcasecmp('image/jpeg', $type) == 0
							|| strcasecmp('image/png', $type) == 0 || strcasecmp('image/pdf', $type) == 0 || strcasecmp('image/gif', $type) == 0) {
								echo "<img src='img/profile-img/".$name."' width='40px' height='40px' style='margin-right:10px; border: 0px solid; border-radius: 25px;'></img>";
							}else{
								echo "<img src='img/profile-img/default.png' width='40px' height='40px' style='margin-right:10px;'></img>";
							}
					echo "Welcome " . $username . "  &#x25BC;" . "</button></br></div>";
					echo "<div id='myDropdown' class='dropdown-content'>";
					echo "<a href='profile.php'>Profile</a>";
					echo "<a href='addproduct.php'>Manage Product</a>";
					echo "<a href='createcoupons.php'>Create coupons</a>";
					echo "<a href='Manageorder.php'>Manage Order</a>";
					echo "<a href='lostorder.php'>Manage Lost Order</a>";
					echo "<a href='logout.php'>logout</a>";
					echo "</div>";
					echo "</div>";
					}else{
						
						echo "<div class='dropdown'>";
						echo "<div style='color:white;'><button onclick='myFunction()' class='dropbtn'>";
							if (strcasecmp('image/jpg', $type) == 0 || strcasecmp('image/jpeg', $type) == 0
								|| strcasecmp('image/png', $type) == 0 || strcasecmp('image/pdf', $type) == 0 || strcasecmp('image/gif', $type) == 0) {
									echo "<img src='img/profile-img/".$name."' width='40px' height='40px' style='margin-right:10px; border: 0px solid; border-radius: 25px;'></img>";
								}else{
									echo "<img src='img/profile-img/default.png' width='40px' height='40px' style='margin-right:10px;'></img>";
								}
						echo "Welcome " . $username . "  &#x25BC;" . "</button></br></div>";
						echo "<div id='myDropdown' class='dropdown-content'>";
						echo "<a href='profile.php'>Profile</a>";
						echo "<a href='logout.php'>logout</a>";
						echo "</div>";
						echo "</div>";
					}
				}
			}
        } 
	}
	
//functions
function checkVar($var)
{
	$var = str_replace("\n", " ", $var);
	$var = str_replace(" ", "", $var);
	if(isset($var) && !empty($var) && $var != '')
	{
		return true;
	}
	else
	{
		return false;	
	}
}
function hasData($query)
{	$rows = mysqli_query($GLOBALS['conn'], $query)or die("somthing is wrong");
	$results = mysqli_num_rows($rows);
	if($results == 0)
	{
		return false;  
	}
	else
	{
		return true;  
	}
}
function isAjax()
	{
		if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' )
		{
	     	return true; 
		}	
		else
		{
			return false;
		}
		
	}

function cleanInput($data)
	{

		// Fix &entity\n;
		$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
		$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
		$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
		$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

		// Remove any attribute starting with "on" or xmlns
		$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

		// Remove javascript: and vbscript: protocols
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
		$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

		// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
		$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

		// Remove namespaced elements (we do not need them)
		$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

		do
		{
			// Remove really unwanted tags
			$old_data = $data;
			$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
		}
		while ($old_data !== $data);

		return $data;
	}
?>
