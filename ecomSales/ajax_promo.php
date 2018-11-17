<?php
session_start();
require_once("connection_file.php");
 
if(isset($_POST['promocode'])){
	
	$promocode = $_POST['promocode'];
	$sql = "SELECT * FROM `promocode` WHERE code = '$promocode' AND used = 'valid'";
	$result = mysqli_query($conn, $sql);
	
	if(!empty($_POST['promocode'])){
		if (mysqli_num_rows($result) > 0){
		
			while ($row = mysqli_fetch_row($result)){
				die(json_encode(array('promo'=>$promocode, 'validcode'=>'Valid Code'))); //output json 
			}
			
		}else{
			die(json_encode(array('promo'=>'', 'validcode'=>'Invalid Code'))); //output json 
		}
	}else{
		die(json_encode(array('promo'=>'', 'validcode'=>'Invalid Code'))); //output json 
	}
}
?>