<?php
   session_start();
   require('config_file.php');
   include 'connection_file.php';
?>

<?php
	if (isset($_SESSION['LoginID'])){
		 $switch = $_SESSION['switch'];
		 if($switch == "login"){
			 
	$connect = get_mysqli();
	$query = "SELECT * FROM login";
	  
      if ($result = $connect->query($query)) {
	  		echo "<table border=1 id=myTable>";
			echo "<tr>";
			echo "<th colspan='3'>Boss</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Agent ID</th> <th>Password</th> <th>Agent Name</th>";
			echo "</tr>";
		while($row = $result->fetch_row()) {
		  $bossID = $row[0];
		  $password = $row[1];
		  $bossName = $row[2];
			echo "<tr>";
			echo "<td>". $bossID . "</td>";
			echo "<td>". $password . "</td>";
			echo "<td>". $bossName . "</td>";
		}
			echo "</tr>";
			echo "</table>";
			echo "<br><br>";
	  }
	  
	$query_1 = "SELECT * FROM agent";
	  
      if ($result = $connect->query($query_1)) {
	  		echo "<table border=1 id=myTable>";
			echo "<tr>";
			echo "<th colspan='3'>Agent</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Agent ID</th> <th>Password</th> <th>Agent Name</th>";
			echo "</tr>";
		while($row = $result->fetch_row()) {
		  $agentID = $row[0];
		  $agentpassword = $row[1];
		  $agentName = $row[2];
			echo "<tr>";
			echo "<td>". $agentID . "</td>";
			echo "<td>". $agentpassword . "</td>";
			echo "<td>". $agentName . "</td>";
		}
			echo "</tr>";
			echo "</table>";
			echo "<br><br>";
	  }
	  
	  	$query_2 = "SELECT * FROM supagent";
	  
      if ($result = $connect->query($query_2)) {
	  		echo "<table border=1 id=myTable>";
			echo "<tr>";
			echo "<th colspan='2'>Sup-Agent</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>Agent ID</td> <td>Agent Name</td>";
			echo "</tr>";
		while($row = $result->fetch_row()) {
		  $supagentID = $row[0];
		  $supagentName = $row[1];
			echo "<tr>";
			echo "<td>". $supagentID . "</td>";
			echo "<td>". $supagentName . "</td>";
		}
			echo "</tr>";
			echo "</table>";
			echo "<br><br>";
	  }
	  
	  
	}else{
			 phpAlert("Only Admin can Access");
			 header('Location: index.php');
		 }
	}else{
	   phpAlert("Please Login before using the System.");
	   header('Location: login.php');
   }
?>