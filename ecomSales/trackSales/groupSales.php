<?php 

	if (isset($_SESSION['LoginID'])){
	   $connect = get_mysqli();
		if (mysqli_connect_errno())
        echo "Oops! Connection Error - " . $connect->connect_error;
	 
	   $groupAquery = "SELECT * FROM sales_1";
	   $groupASumquery = "SELECT sum(SaleQuantity) FROM sales_1";
	   $groupAresult = mysqli_query($connect, $groupAquery) or die(mysqli_error($connect));
	   $groupASumresult = mysqli_query($connect, $groupASumquery) or die(mysqli_error($connect));
	   echo "<div>Group Agent Sales</div>";
	   echo "<hr>";
         echo "<table border=1 id=myTable>";
		 echo "<tr>";
		 echo "<th colspan='5'>Sup-Agent Sales</th>";
		 echo "</tr>";
         echo "<tr>";
         echo "<th>Sales ID</th> <th id='agent_row'>Agent ID</th> <th>Quantity</th> <th id='date_row'> Date Sales</th> <th>Total Quantity</th>";
         echo "</tr>";
			while($row = $groupAresult->fetch_row()) {
            $agentSalesID = $row[0];
			$agentAgentID = $row[1];
            $agentSalesQuantity = $row[2];
            $agentSaleDate = $row[3];

		    echo "<tr>";
			 echo "<td>". $agentSalesID . "</td>";
            echo "<td>". $agentAgentID . "</td>";
            echo "<td>". $agentSalesQuantity. "</td>";
            echo "<td>". $agentSaleDate . "</td>";
			if($row = $groupASumresult->fetch_row()) {
		    $agenttotal = $row[0];
			echo "<td>". $agenttotal . "</td>";
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