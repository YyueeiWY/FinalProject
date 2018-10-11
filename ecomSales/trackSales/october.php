<?php
			//october
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $octoberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 10 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $octobersquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 10 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$octoberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 10 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$octobersquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 10 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$octoberquery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 10 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$octobersquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 10 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //october
	   $octoberresult = mysqli_query($connect, $octoberquery) or die(mysqli_error($connect));
	   $octobersresult = mysqli_query($connect, $octobersquery) or die(mysqli_error($connect));
	   echo "<div>October Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $octoberresult->fetch_row()) {
            $octoberAgentID = $row[0];
            $octoberSalesQuantity = $row[1];
            $octoberSaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $octoberAgentID . "</td>";
            echo "<td>". $octoberSalesQuantity. "</td>";
            echo "<td>". $octoberSaleDate . "</td>";
			if($row = $octobersresult->fetch_row()) {
		    $octobertotal = $row[0];
			echo "<td>". $octobertotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>