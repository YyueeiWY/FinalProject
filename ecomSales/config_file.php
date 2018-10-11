<?php
$connection = mysqli_connect("", "root", "", "company");
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
	  
?>