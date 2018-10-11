<?php
session_start();
require_once("connection_file.php");

if(isset($_POST["add"])) {
			
		$total_items = count($_SESSION["cart_item"]); //count total items
		die(json_encode(array('items'=>$total_items))); //output json 
}

?>