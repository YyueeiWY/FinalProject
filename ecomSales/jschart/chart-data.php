<?php
	$conn = mysqli_connect("", "root", "", "company");
	if (!$conn){
		die("Database Connection Failed" . mysqli_error($conn));
	}
	
	//January's sales
	$january = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 1";
	
	if ($result = mysqli_query($conn,$january)){
		while ($row = mysqli_fetch_row($result)){
			$januarytotal = $row[0];
		}
	}
	
	//February's sales
	$february = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 2";
	
	if ($result = mysqli_query($conn,$february)){
		while ($row = mysqli_fetch_row($result)){
			$februarytotal = $row[0];
		}
	}
	
	//March's sales
	$march = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 3";
	
	if ($result = mysqli_query($conn,$march)){
		while ($row = mysqli_fetch_row($result)){
			$marchtotal = $row[0];
		}
	}
	
	//April's sales
	$april = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 4";
	
	if ($result = mysqli_query($conn,$april)){
		while ($row = mysqli_fetch_row($result)){
			$apriltotal = $row[0];
		}
	}
	
	//May's sales
	$may = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 5";
	
	if ($result = mysqli_query($conn,$may)){
		while ($row = mysqli_fetch_row($result)){
			$maytotal = $row[0];
		}
	}
	
	//June's sales
	$june = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 6";
	
	if ($result = mysqli_query($conn,$june)){
		while ($row = mysqli_fetch_row($result)){
			$junetotal = $row[0];
		}
	}
	
	//July's sales
	$july = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 7";
	
	if ($result = mysqli_query($conn,$july)){
		while ($row = mysqli_fetch_row($result)){
			$julytotal = $row[0];
		}
	}
	
	//August's sales
	$august = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 8";
	
	if ($result = mysqli_query($conn,$august)){
		while ($row = mysqli_fetch_row($result)){
			$augusttotal = $row[0];
		}
	}
	
	//September's sales
	$september = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 9";
	
	if ($result = mysqli_query($conn,$september)){
		while ($row = mysqli_fetch_row($result)){
			$septembertotal = $row[0];
		}
	}
	
	//October's sales
	$october = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 10";
	
	if ($result = mysqli_query($conn,$october)){
		while ($row = mysqli_fetch_row($result)){
			$octobertotal = $row[0];
		}
	}
	
	//November's sales
	$november = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 11";
	
	if ($result = mysqli_query($conn,$november)){
		while ($row = mysqli_fetch_row($result)){
			$novembertotal = $row[0];
		}
	}
	
	//December's sales
	$december = "SELECT sum(quantity), date FROM `productorder` WHERE month(date) = 12";
	
	if ($result = mysqli_query($conn,$december)){
		while ($row = mysqli_fetch_row($result)){
			$decembertotal = $row[0];
		}
	}
	
?>
var randomScalingFactor = function(){ return Math.round(Math.random()*10)};
var January = '<?php echo $januarytotal; ?>',
	February = '<?php echo $februarytotal; ?>',
	March = '<?php echo $marchtotal; ?>',
	April = '<?php echo $apriltotal; ?>',
	May = '<?php echo $maytotal; ?>',
	June = '<?php echo $junetotal; ?>',
	July = '<?php echo $julytotal; ?>',
	August = '<?php echo $augusttotal; ?>',
	September = '<?php echo $septembertotal; ?>',
	October = '<?php echo $octobertotal; ?>',
	November = '<?php echo $novembertotal; ?>',
	December = '<?php echo $decembertotal; ?>';
	
	
	
	
	var lineChartData = {
		labels : ["January","February","March","April","May","June","July","August","September","October","November","December"],
		datasets : [
			{
				label: "Product Sales dataset",
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgba(48, 164, 255, 1)",
				pointColor : "rgba(48, 164, 255, 1)",
				pointStrokeColor : "#fff",
				pointHighlightFill : "#fff",
				pointHighlightStroke : "rgba(48, 164, 255, 1)",
				data : [January,February,March,April,May,June,July,August,September,October,November,December]
			}
		]

	}
		
	var barChartData = {
		labels : ["January","February","March","April","May","June","July"],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			},
			{
				fillColor : "rgba(48, 164, 255, 0.2)",
				strokeColor : "rgba(48, 164, 255, 0.8)",
				highlightFill : "rgba(48, 164, 255, 0.75)",
				highlightStroke : "rgba(48, 164, 255, 1)",
				data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
			}
		]

	}

	var pieData = [
			{
				value: 300,
				color:"#30a5ff",
				highlight: "#62b9fb",
				label: "Blue"
			},
			{
				value: 50,
				color: "#ffb53e",
				highlight: "#fac878",
				label: "Orange"
			},
			{
				value: 100,
				color: "#1ebfae",
				highlight: "#3cdfce",
				label: "Teal"
			},
			{
				value: 120,
				color: "#f9243f",
				highlight: "#f6495f",
				label: "Red"
			}

		];
			
	var doughnutData = [
				{
					value: 300,
					color:"#30a5ff",
					highlight: "#62b9fb",
					label: "Blue"
				},
				{
					value: 50,
					color: "#ffb53e",
					highlight: "#fac878",
					label: "Orange"
				},
				{
					value: 100,
					color: "#1ebfae",
					highlight: "#3cdfce",
					label: "Teal"
				},
				{
					value: 120,
					color: "#f9243f",
					highlight: "#f6495f",
					label: "Red"
				}

			];
			
	var radarData = {
	    labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
	    datasets: [
	        {
	            label: "My First dataset",
	            fillColor: "rgba(220,220,220,0.2)",
	            strokeColor: "rgba(220,220,220,1)",
	            pointColor: "rgba(220,220,220,1)",
	            pointStrokeColor: "#fff",
	            pointHighlightFill: "#fff",
	            pointHighlightStroke: "rgba(220,220,220,1)",
	            data: [65, 59, 90, 81, 56, 55, 40]
	        },
	        {
	            label: "My Second dataset",
	            fillColor : "rgba(48, 164, 255, 0.2)",
	            strokeColor : "rgba(48, 164, 255, 0.8)",
	            pointColor : "rgba(48, 164, 255, 1)",
	            pointStrokeColor : "#fff",
	            pointHighlightFill : "#fff",
	            pointHighlightStroke : "rgba(48, 164, 255, 1)",
	            data: [28, 48, 40, 19, 96, 27, 100]
	        }
	    ]
	};
	
	var polarData = [
		    {
		    	value: 300,
		    	color: "#1ebfae",
		    	highlight: "#38cabe",
		    	label: "Teal"
		    },
		    {
		    	value: 140,
		    	color: "#ffb53e",
		    	highlight: "#fac878",
		    	label: "Orange"
		    },
		    {
		    	value: 220,
		    	color:"#30a5ff",
		    	highlight: "#62b9fb",
		    	label: "Blue"
		    },
		    {
		    	value: 250,
		    	color: "#f9243f",
		    	highlight: "#f6495f",
		    	label: "Red"
		    }
		
	];

