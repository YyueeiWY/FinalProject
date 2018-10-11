<?php
	
   //connect table and display tables
   if (isset($_SESSION['LoginID'])){
	   //get values from search
	   $radio = $_GET['radio'];
	   $AgentID = $_GET['id'];
	   $connect = get_mysqli();
      if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;

	  //Search agent ID with query
	  if ($AgentID){
		if($radio == 'login'){
			//display boss's sales table
	  $query = "SELECT * FROM sales WHERE AgentID = '$AgentID' ORDER BY saleDate";
	  $squery = "SELECT sum(SaleQuantity) FROM sales WHERE AgentID='$AgentID'";
	  $uquery = "SELECT name FROM login WHERE AgentID='$AgentID'";
	  $uresult = mysqli_query($connect, $uquery) or die(mysqli_error($connect));
		if($row = $uresult->fetch_row()){
			$agentName = $row[0];
		}
	  //how many agents have
	  $cquery = "SELECT AgentID,name FROM agent";
	  $cresult = mysqli_query($connect, $cquery) or die(mysqli_error($connect));
	  echo "<br><br>";
	   echo "<div>Agent</div>";
	   echo "<hr>";
	  		echo "<table border=1 id=myTable>";
			echo "<tr>";
			echo "<th colspan='2'>Agent you have</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Agent ID</th> <th>Agent Name</th>";
			echo "</tr>";
			while($row = $cresult->fetch_row()){
            $agentAgentID = $row[0];
            $agentAgentName = $row[1];
			echo "<tr>";
			echo "<td>". $agentAgentID . "</td>";
			echo "<td>". $agentAgentName . "</td>";
			}
			echo "</tr>";
			echo "</table>";
			
	  //how many sup agents have
	  $scquery = "SELECT * FROM supagent";
	  $scresult = mysqli_query($connect, $scquery) or die(mysqli_error($connect));
	  echo "<br><br>";
	   echo "<div>sup-Agent</div>";
	   echo "<hr>";
	  		echo "<table border=1 id=myTable>";
			echo "<tr>";
			echo "<th colspan='4'>sup-Agent you have</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Agent ID</th> <th>Agent Name</th> <th>Under ID</th> <th>Under Name</th>";
			echo "</tr>";
			while($row = $scresult->fetch_row()){
            $supAgentID = $row[0];
            $supAgentName = $row[1];
			$supAgentUnderID = $row[2];
			$supAgentUnderName = $row[3];
			echo "<tr>";
			echo "<td>". $supAgentID . "</td>";
			echo "<td>". $supAgentName . "</td>";
			echo "<td>". $supAgentUnderID . "</td>";
			echo "<td>". $supAgentUnderName . "</td>";
			}
			echo "</tr>";
			echo "</table>";
			echo "<br><br>";
			
 		}else if($radio == 'agent'){
			//display agent's tables
	  $query = "SELECT * FROM sales_1 WHERE AgentID = '$AgentID' ORDER BY saleDate";
	  $squery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE AgentID='$AgentID'";
	  $uquery = "SELECT underID,underName,name FROM agent WHERE AgentID='$AgentID'";
	  $uresult = mysqli_query($connect, $uquery) or die(mysqli_error($connect));
		if($row = $uresult->fetch_row()){
            $underID = $row[0];
            $underName = $row[1];
			$agentName = $row[2];
			echo "<br><br>";
	   echo "<div>Under</div>";
	   echo "<hr>";
			echo "<table border=1 id=myTable>";
			echo "<tr>";
			echo "<th colspan='2'>Boss Agent under</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Agent ID</th> <th>Agent Name</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>". $underID . "</td>";
			echo "<td>". $underName . "</td>";
			echo "</tr>";
			echo "</table>";
			echo "<br><br>";
		}
		
		//how many sup-agents have
	  $cquery = "SELECT AgentID,name FROM supagent WHERE underID='$AgentID'";
	  $cresult = mysqli_query($connect, $cquery) or die(mysqli_error($connect));
	   echo "<div>Agent</div>";
	   echo "<hr>";
	  		echo "<table border=1 id=myTable>";
			echo "<tr>";
			echo "<th colspan='2'>Agent you have</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Agent ID</th> <th>Agent Name</th>";
			echo "</tr>";
			while($row = $cresult->fetch_row()){
            $supAgentID = $row[0];
            $supAgentName = $row[1];
			echo "<tr>";
			echo "<td>". $supAgentID . "</td>";
			echo "<td>". $supAgentName . "</td>";
			}
			echo "</tr>";
			echo "</table>";
			echo "<br><br>";
			
 		}else if($radio == 'supagent'){
			//sup agent tables
	  $query = "SELECT * FROM sales_2 WHERE AgentID = '$AgentID' ORDER BY saleDate";
	  $squery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE AgentID='$AgentID'";	
	  $uquery = "SELECT underID,underName,name FROM supagent WHERE AgentID='$AgentID'";
	  $uresult = mysqli_query($connect, $uquery) or die(mysqli_error($connect));
		if($row = $uresult->fetch_row()){
            $underID = $row[0];
            $underName = $row[1];
			$agentName = $row[2];
			echo "<br><br>";
	   echo "<div>Under</div>";
	   echo "<hr>";
			echo "<table border=1 id=myTable>";
			echo "<tr>";
			echo "<th colspan='2'>Boss Agent under</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<th>Agent ID</th> <th>Agent Name</th>";
			echo "</tr>";
			echo "<td>". $underID . "</td>";
			echo "<td>". $underName . "</td>";
			echo "</table>";
			echo "<br><br>";
		}

		}
	  }
	   
	   /*
	   //table
	   $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	   $sresult = mysqli_query($connect, $squery) or die(mysqli_error($connect));
	   echo "<div>Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $result->fetch_row()) {
            $AgentID = $row[1];
            $SalesQuantity = $row[2];
            $SaleDate = $row[3];
			
		    echo "<tr>";
            echo "<td>". $AgentID . "</td>";
            echo "<td>". $SalesQuantity. "</td>";
            echo "<td>". $SaleDate . "</td>";
			if($row = $sresult->fetch_row()) {
		    $total = $row[0];
			echo "<td>". $total . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 echo "<br><br>";
		 
	   //agent table
	   $groupAquery = "SELECT * FROM sales_1";
	   $groupASumquery = "SELECT sum(SaleQuantity) FROM sales_1";
	   $groupAresult = mysqli_query($connect, $groupAquery) or die(mysqli_error($connect));
	   $groupASumresult = mysqli_query($connect, $groupASumquery) or die(mysqli_error($connect));
	   echo "<div>Group Agent Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='5'>Sup-Agent Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th>Sales ID</th> <th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $groupAresult->fetch_row()) {
            $agentSalesID = $row[0];
			$agentAgentID = $row[1];
            $agentSalesQuantity = $row[2];
            $agentSaleDate = $row[3];

		    echo "<tr>";
			 echo "<td>". $agentSalesID . "</td>";
            echo "<td>". $agentAgentID . "</td>";
            echo "<td>". $agentSalesQuantity. "</td>";
            echo "<td>". $agentSaleDate . "</td>";
			if($row = $groupASumresult->fetch_row()) {
		    $agenttotal = $row[0];
			echo "<td>". $agenttotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 echo "<br><br>";
		 
		 
	   //sup-agent table
	   $groupSupquery = "SELECT * FROM sales_2";
	   $groupSupSumquery = "SELECT sum(SaleQuantity) FROM sales_2";
	   $groupSupresult = mysqli_query($connect, $groupSupquery) or die(mysqli_error($connect));
	   $groupSupSumresult = mysqli_query($connect, $groupSupSumquery) or die(mysqli_error($connect));
	   echo "<div>Group Sup-Agent Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='5'>Sup-Agent Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th>Sales ID</th> <th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $groupSupresult->fetch_row()) {
            $supSalesID = $row[0];
			$supAgentID = $row[1];
            $supSalesQuantity = $row[2];
            $supSaleDate = $row[3];

		    echo "<tr>";
			 echo "<td>". $supSalesID . "</td>";
            echo "<td>". $supAgentID . "</td>";
            echo "<td>". $supSalesQuantity. "</td>";
            echo "<td>". $supSaleDate . "</td>";
			if($row = $groupSupSumresult->fetch_row()) {
		    $suptotal = $row[0];
			echo "<td>". $suptotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 echo "<br><br>";
		 */
		 
		 
		 

      mysqli_close($connect);
		 
   }else{
	   return false;
   }
?>