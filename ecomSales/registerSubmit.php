<?php
   session_start();
	
	include 'connection_file.php';
	
		$uname = $_POST['uname'];  
		$pword = $_POST['pword'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$img = 'default.png';
		$type = 'image/jpeg';
		$phone = $_POST['phone'];
		$date = date('Y-m-d H:i:s');
		$enum = 'user';
		$payid = $_POST['uname']; 
		$notifid = $_POST['uname']; 
		
		$query = "INSERT INTO `login`(`userid`, `username`, `password`, `fname`, `lname`, `email`, `datejoin`, `phone`, `admin`, `name`, `type`, `payid`, `notifid`) 
		VALUES (NULL, '$uname', '$pword', '$fname', '$lname', '$email', '$date', '$phone', '$enum', '$img', '$type', '$payid', '$notifid')";
		
		if (mysqli_query($conn, $query)){
			$last_id = mysqli_insert_id($conn);
			
			$address_query = "INSERT INTO `user_address`(`id`, `username`, `addnum`, `address`, `city`, `state`, `postcode`) 
			VALUES (NULL, '$uname', '1', NULL, NULL, NULL, NULL)";
			
			$address_query_1 = "INSERT INTO `user_address`(`id`, `username`, `addnum`, `address`, `city`, `state`, `postcode`) 
			VALUES (NULL, '$uname', '2', NULL, NULL, NULL, NULL)";
			
			if(mysqli_query($conn, $address_query) && mysqli_query($conn, $address_query_1)){
				header('Location: login.php');
			}else{
				phpAlert("Invalid information");
			}
		}else{
			phpAlert("Invalid information");
		}
	
?>