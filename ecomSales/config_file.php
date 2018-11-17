<?php
$conn = mysqli_connect("", "root", "", "company");
if (!$conn){
    die("Database Connection Failed" . mysqli_error($connection));
}
	  
?>