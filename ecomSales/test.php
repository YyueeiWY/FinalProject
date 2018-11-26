<?php
   session_start();

   include 'connection_file.php';

	echo $date = date("Y-m-d H:i:s", STRTOTIME(date('h:i:sa'))); 
	echo '<br>';
	echo $expiredate = date("Y-m-d H:i:s", strtotime("+4 day", STRTOTIME(date('h:i:sa'))));
   
?>