<?php
			//february
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $februaryquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 2 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $februarysquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 2 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					  $februaryquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 2 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					  $februarysquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 2 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
							$februaryquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 2 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
							$februarysquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 2 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //february
	   $februaryresult = mysqli_query($connect, $februaryquery) or die(mysqli_error($connect));
	   $februarysresult = mysqli_query($connect, $februarysquery) or die(mysqli_error($connect));
	   echo "<div>February Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $februaryresult->fetch_row()) {
            $februaryAgentID = $row[0];
            $februarySalesQuantity = $row[1];
            $februarySaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $februaryAgentID . "</td>";
            echo "<td>". $februarySalesQuantity. "</td>";
            echo "<td>". $februarySaleDate . "</td>";
			if($row = $februarysresult->fetch_row()) {
		    $februarytotal = $row[0];
			echo "<td>". $februarytotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>