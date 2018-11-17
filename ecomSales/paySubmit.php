<?php
   session_start();

   include 'connection_file.php';
   
		if(empty($_SESSION["cart_item"])){
			phpAlert('Cart Empty');
			header('Location: order.php');
		}
   
if(isset($_GET['fname'])){
	  $fname = $_GET['fname'];
	  $lname = $_GET['lname'];
	  $address = $_GET['address'];
	  $state = $_GET['state'];
	  $city = $_GET['city'];
	  $postcode = $_GET['postcode'];
	  $contact = $_GET['contact'];
	  $email = $_GET['email'];
	  $promocode = $_GET['promocode'];
	 
	 if(isset($_SESSION['LoginID'])){
		$userid = $_SESSION['LoginID'];
	 }else{
		 $userid = 'Guest';
	 }
		$date = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa')));
	
	//Get promo code
	if($promocode == '' || $promocode == null){
		if(isset($_SESSION["cart_item"])){
			$item_total = 0;
			foreach ($_SESSION["cart_item"] as $item){
				$item_total += ($item["price"]*$item["quantity"]);
			}
			$tax = ($item_total/100)*6;
			$lastprice = ($item_total+$tax);
		}
	}else{
		$promosql = "SELECT * FROM `promocode` WHERE code = '$promocode' AND used = 'valid'";
		$result = mysqli_query($conn, $promosql);
		if (mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_row($result)){
				$afterpromo = $row[2];
				if(isset($_SESSION["cart_item"])){
					$item_total = 0;
					foreach ($_SESSION["cart_item"] as $item){
						$item_total += ($item["price"]*$item["quantity"]);
					}
					$tax = ($item_total/100)*6;
					$promo = ($item_total/100)*$afterpromo;
					$lastprice = ($item_total+$tax)-$promo;
				}
			}
		}else{
			phpAlert("Code Invalid");
		}
	}
	//Get promo code //
		
		$paysql = "INSERT INTO `payment`(`id`, `payid`, `method`, `date`, `total`, `code`) 
		VALUES (null, '$userid', 'Debit Card', '$date', '$lastprice', '$promocode')";
		
		//Get payment id
		if (mysqli_query($conn, $paysql)) {
			$payid = mysqli_insert_id($conn);
			
			//set promo to invalid
			$setsql = "UPDATE `promocode` SET `used`= 'invalid' WHERE code = '$promocode';";
			mysqli_query($conn, $setsql);
			//set promo to invalid
			
		}else{
			phpAlert('Error');
			header('Location: index.php');
		}
		//Get payment id//
	 
	 //insert product order
	foreach ($_SESSION["cart_item"] as $item){
		
		$productid = $item['id'];
		$quantity = $item['quantity'];
		$productcode = $item['code'];
			
			$sql = "INSERT INTO `productorder`(`id`, `payid`, `productid`, `quantity`, `date`, `delivery`, `address`, `city`, `state`, `postcode`, `contact`, `email`) 
			VALUES (null, '$payid', '$productid', '$quantity', '$date', 'progress', '$address', '$city', '$state', '$postcode', '$contact', '$email')";
			
			if (mysqli_query($conn, $sql)) {
				
				$updatesql = "UPDATE `stock` SET `stock`= stock-'$quantity' WHERE stock.code = '$productcode'";
				
				if (mysqli_query($conn, $updatesql)) {
					
					phpAlert('Purchase Success');
					unset($_SESSION["cart_item"]);
					header('Location: index.php');
				} else {
					phpAlert('Error');
					header('Location: index.php');
				}
				
			} else {
				phpAlert('Error');
				header('Location: index.php');
			}
	}
	
}else{
	phpAlert('empty name');
	header('Location: index.php');
	$fname = '';
	$lname = '';
	$address = '';
	$state = '';
	$city = '';
	$postcode = '';
	$contact = '';
	$email = '';
}
?>