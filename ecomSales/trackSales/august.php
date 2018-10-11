<?php
			//august
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $augustquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 8 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $augustsquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 8 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$augustquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 8 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$augustsquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 8 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$augustquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 8 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$augustsquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 8 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //august
	   $augustresult = mysqli_query($connect, $augustquery) or die(mysqli_error($connect));
	   $augustsresult = mysqli_query($connect, $augustsquery) or die(mysqli_error($connect));
	   echo "<div>August Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $augustresult->fetch_row()) {
            $augustAgentID = $row[0];
            $augustSalesQuantity = $row[1];
            $augustSaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $augustAgentID . "</td>";
            echo "<td>". $augustSalesQuantity. "</td>";
            echo "<td>". $augustSaleDate . "</td>";
			if($row = $augustsresult->fetch_row()) {
		    $augusttotal = $row[0];
			echo "<td>". $augusttotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>