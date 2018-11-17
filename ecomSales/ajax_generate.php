<?php

session_start();
require_once("connection_file.php");

if(isset($_POST["lengthcode"])) {
		
	$lengthcode = $_POST['lengthcode'];
	$result = randomString($lengthcode);
	
	die(json_encode(array('lengthcode'=>$result))); //output json 
}

?>