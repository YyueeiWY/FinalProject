<?php
			//july
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $julyquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 7 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $julysquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 7 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$julyquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 7 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$julysquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 7 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$julyquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 7 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$julysquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 7 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //july
	   $julyresult = mysqli_query($connect, $julyquery) or die(mysqli_error($connect));
	   $julysresult = mysqli_query($connect, $julysquery) or die(mysqli_error($connect));
	   echo "<div>July Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $julyresult->fetch_row()) {
            $julyAgentID = $row[0];
            $julySalesQuantity = $row[1];
            $julySaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $julyAgentID . "</td>";
            echo "<td>". $julySalesQuantity. "</td>";
            echo "<td>". $julySaleDate . "</td>";
			if($row = $julysresult->fetch_row()) {
		    $julytotal = $row[0];
			echo "<td>". $julytotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>