<?php
			//june
		if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $junequery = "SELECT AgentID, saleQuantity, saleDate FROM `sales` WHERE month(saleDate) = 6 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $junesquery = "SELECT sum(SaleQuantity) FROM sales WHERE month(saleDate) = 6 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					$junequery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_1` WHERE month(saleDate) = 6 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					$junesquery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE month(saleDate) = 6 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
						$junequery = "SELECT AgentID, saleQuantity, saleDate FROM `sales_2` WHERE month(saleDate) = 6 AND year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
						$junesquery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE month(saleDate) = 6 AND year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //june
	   $juneresult = mysqli_query($connect, $junequery) or die(mysqli_error($connect));
	   $junesresult = mysqli_query($connect, $junesquery) or die(mysqli_error($connect));
	   echo "<div>June Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $juneresult->fetch_row()) {
            $juneAgentID = $row[0];
            $juneSalesQuantity = $row[1];
            $juneSaleDate = $row[2];
			
		    echo "<tr>";
            echo "<td>". $juneAgentID . "</td>";
            echo "<td>". $juneSalesQuantity. "</td>";
            echo "<td>". $juneSaleDate . "</td>";
			if($row = $junesresult->fetch_row()) {
		    $junetotal = $row[0];
			echo "<td>". $junetotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
?>