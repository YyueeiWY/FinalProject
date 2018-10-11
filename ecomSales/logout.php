<?php
   session_start();
   unset($_SESSION["LoginID"]);
   unset($_SESSION["Password"]);
   
   echo 'You have cleaned session';
   header('Refresh: 2; URL = index.php');
?>