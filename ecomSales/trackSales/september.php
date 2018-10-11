<?php
			//september
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $septemberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 9 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $septembersquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 9 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$septemberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 9 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$septembersquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 9 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$septemberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 9 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$septembersquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 9 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //september
	   $septemberresult = mysqli_query($connect, $septemberquery) or die(mysqli_error($connect));
	   $septembersresult = mysqli_query($connect, $septembersquery) or die(mysqli_error($connect));
	   echo "<div>September Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $septemberresult->fetch_row()) {
            $septemberAgentID = $row[0];
            $septemberSalesQuantity = $row[1];
            $septemberSaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $septemberAgentID . "</td>";
            echo "<td>". $septemberSalesQuantity. "</td>";
            echo "<td>". $septemberSaleDate . "</td>";
			if($row = $septembersresult->fetch_row()) {
		    $septembertotal = $row[0];
			echo "<td>". $septembertotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>