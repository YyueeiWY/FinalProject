			<?php
			//all
	   if (isset($_SESSION['LoginID'])){
			$radio = $_GET['radio'];
			$AgentID = $_GET['id'];
			$connect = get_mysqli();
		if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
			if($radio == 'login'){
			//display boss's sales table
	  $query = "SELECT * FROM sales WHERE year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
	  $squery = "SELECT sum(SaleQuantity) FROM sales WHERE year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}else if($radio == 'agent'){
					  $query = "SELECT * FROM sales_1 WHERE year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
					  $squery = "SELECT sum(SaleQuantity) FROM sales_1 WHERE year(saleDate) = $thisYear AND AgentID='$AgentID'";
			}
				else{
							$query = "SELECT * FROM sales_2 WHERE year(saleDate) = $thisYear AND AgentID = '$AgentID' ORDER BY saleDate";
							$squery = "SELECT sum(SaleQuantity) FROM sales_2 WHERE year(saleDate) = $thisYear AND AgentID='$AgentID'";
				}
				   //table
	   $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
	   $sresult = mysqli_query($connect, $squery) or die(mysqli_error($connect));
	   echo "<div>year Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='4'>Your Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $result->fetch_row()) {
            $AgentID = $row[1];
            $SalesQuantity = $row[2];
            $SaleDate = $row[3];
			
		    echo "<tr>";
            echo "<td>". $AgentID . "</td>";
            echo "<td>". $SalesQuantity. "</td>";
            echo "<td>". $SaleDate . "</td>";
			if($row = $sresult->fetch_row()) {
		    $total = $row[0];
			echo "<td>". $total . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 mysqli_close($connect);
	   }else{
		   return false;
	   }
			?>