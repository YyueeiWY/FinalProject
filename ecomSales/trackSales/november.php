<?php
			//november
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $novemberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 11 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $novembersquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 11 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$novemberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 11 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$novembersquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 11 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$novemberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 11 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$novembersquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 11 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //november
	   $novemberresult = mysqli_query($connect, $novemberquery) or die(mysqli_error($connect));
	   $novembersresult = mysqli_query($connect, $novembersquery) or die(mysqli_error($connect));
	   echo "<div>November Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $novemberresult->fetch_row()) {
            $novemberAgentID = $row[0];
            $novemberSalesQuantity = $row[1];
            $novemberSaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $novemberAgentID . "</td>";
            echo "<td>". $novemberSalesQuantity. "</td>";
            echo "<td>". $novemberSaleDate . "</td>";
			if($row = $novembersresult->fetch_row()) {
		    $novembertotal = $row[0];
			echo "<td>". $novembertotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>