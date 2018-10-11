<?php
	    if (mysqli_connect_errno())
         echo "Oops! Connection Error - " . $connect->connect_error;
	 
	   //sup-agent table
	   if (isset($_SESSION['LoginID'])){
		 $connect = get_mysqli();
	   $groupSupquery = "SELECT * FROM sales_2";
	   $groupSupSumquery = "SELECT sum(SaleQuantity) FROM sales_2";
	   $groupSupresult = mysqli_query($connect, $groupSupquery) or die(mysqli_error($connect));
	   $groupSupSumresult = mysqli_query($connect, $groupSupSumquery) or die(mysqli_error($connect));
	   echo "<div>Group Sup-Agent Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='5'>Sup-Agent Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th>Sales ID</th> <th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $groupSupresult->fetch_row()) {
            $supSalesID = $row[0];
			$supAgentID = $row[1];
            $supSalesQuantity = $row[2];
            $supSaleDate = $row[3];

		    echo "<tr>";
			 echo "<td>". $supSalesID . "</td>";
            echo "<td>". $supAgentID . "</td>";
            echo "<td>". $supSalesQuantity. "</td>";
            echo "<td>". $supSaleDate . "</td>";
			if($row = $groupSupSumresult->fetch_row()) {
		    $suptotal = $row[0];
			echo "<td>". $suptotal . "</td>";
			}
			echo "</tr>";
			}
			
         echo "</table>"; 
		 echo "<br><br>";

      mysqli_close($connect);
	   }else{
		   return false;
	   }

?>