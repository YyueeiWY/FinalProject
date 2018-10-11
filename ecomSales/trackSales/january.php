<?php
			//january
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $januaryquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 1 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $januarysquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 1 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$januaryquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 1 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$januarysquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 1 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
							$januaryquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 1 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
							$januarysquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 1 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //january
	   $januaryresult = mysqli_query($connect, $januaryquery) or die(mysqli_error($connect));
	   $januarysresult = mysqli_query($connect, $januarysquery) or die(mysqli_error($connect));
	   echo "<div>January Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $januaryresult->fetch_row()) {
            $januaryAgentID = $row[0];
            $januarySalesQuantity = $row[1];
            $januarySaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $januaryAgentID . "</td>";
            echo "<td>". $januarySalesQuantity. "</td>";
            echo "<td>". $januarySaleDate . "</td>";
			if($row = $januarysresult->fetch_row()) {
		    $januarytotal = $row[0];
			echo "<td>". $januarytotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
			?>