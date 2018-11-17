<?php
	session_start();
	require_once("connection_file.php");

    if (isAjax()) {
    
    	$data = array();
    	$username = cleanInput($_POST['userid']);
    	
    	if (checkVar($username)) {
    	
    		$getUsers = "SELECT *
    					 FROM login
    					 WHERE username = '$username'";
    					 
    		if (!hasData($getUsers)) {
    		  $data['result'] = "<div class='message success'>Great! You found a username not in use</div>";
    		  $data['inuse'] = "notinuse";
    		} else {
    		  $data['result'] = "<div class='message warning'>That username is already in use.</div>";
    		  $data['inuse'] = "inuse";
    		}
    		
    		echo json_encode($data);
    			
    	}
    	
    }

?>