<?php
			//may
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $mayquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 5 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $maysquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 5 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$mayquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 5 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$maysquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 5 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$mayquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 5 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$maysquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 5 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //may
	   $mayresult = mysqli_query($connect, $mayquery) or die(mysqli_error($connect));
	   $maysresult = mysqli_query($connect, $maysquery) or die(mysqli_error($connect));
	   echo "<div>May Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $mayresult->fetch_row()) {
            $mayAgentID = $row[0];
            $maySalesQuantity = $row[1];
            $maySaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $mayAgentID . "</td>";
            echo "<td>". $maySalesQuantity. "</td>";
            echo "<td>". $maySaleDate . "</td>";
			if($row = $maysresult->fetch_row()) {
		    $maytotal = $row[0];
			echo "<td>". $maytotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>