<?php
			//april
	   if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $aprilquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 4 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $aprilsquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 4 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$aprilquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 4 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$aprilsquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 4 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$aprilquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 4 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$aprilsquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 4 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //april
	   $aprilresult = mysqli_query($connect, $aprilquery) or die(mysqli_error($connect));
	   $aprilsresult = mysqli_query($connect, $aprilsquery) or die(mysqli_error($connect));
	   echo "<div>April Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $aprilresult->fetch_row()) {
            $aprilAgentID = $row[0];
            $aprilSalesQuantity = $row[1];
            $aprilSaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $aprilAgentID . "</td>";
            echo "<td>". $aprilSalesQuantity. "</td>";
            echo "<td>". $aprilSaleDate . "</td>";
			if($row = $aprilsresult->fetch_row()) {
		    $apriltotal = $row[0];
			echo "<td>". $apriltotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
		 
?>