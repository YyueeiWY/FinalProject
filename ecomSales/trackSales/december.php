<?php
			//december
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $decemberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 12 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $decembersquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 12 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$decemberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 12 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$decembersquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 12 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$decemberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 12 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$decembersquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 12 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //december
	   $decemberresult = mysqli_query($connect, $decemberquery) or die(mysqli_error($connect));
	   $decembersresult = mysqli_query($connect, $decembersquery) or die(mysqli_error($connect));
	   echo "<div>December Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $decemberresult->fetch_row()) {
            $decemberAgentID = $row[0];
            $decemberSalesQuantity = $row[1];
            $decemberSaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $decemberAgentID . "</td>";
            echo "<td>". $decemberSalesQuantity. "</td>";
            echo "<td>". $decemberSaleDate . "</td>";
			if($row = $decembersresult->fetch_row()) {
		    $decembertotal = $row[0];
			echo "<td>". $decembertotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>