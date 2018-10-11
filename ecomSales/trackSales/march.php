<?php
			//march
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $marchquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 3 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $marchsquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 3 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$marchquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 3 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$marchsquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 3 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$marchquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 3 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$marchsquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 3 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //march
	   $marchresult = mysqli_query($connect, $marchquery) or die(mysqli_error($connect));
	   $marchsresult = mysqli_query($connect, $marchsquery) or die(mysqli_error($connect));
	   echo "<div>March Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $marchresult->fetch_row()) {
            $marchAgentID = $row[0];
            $marchSalesQuantity = $row[1];
            $marchSaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $marchAgentID . "</td>";
            echo "<td>". $marchSalesQuantity. "</td>";
            echo "<td>". $marchSaleDate . "</td>";
			if($row = $marchsresult->fetch_row()) {
		    $marchtotal = $row[0];
			echo "<td>". $marchtotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>