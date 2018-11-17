<?php
session_start();
require_once("connection_file.php");

if(isset($_POST["remove"])) {
			
		if(isset($_SESSION["cart_item"])){
			$total_items = count($_SESSION["cart_item"]); //count total items
		}else{
			$total_items = '0';
		}
		die(json_encode(array('items'=>$total_items))); //output json 
}
if(isset($_POST["empty"])) {
			
		if(isset($_SESSION["cart_item"])){
			$total_items = count($_SESSION["cart_item"]); //count total items
		}else{
			$total_items = '0';
		}
		die(json_encode(array('items'=>$total_items))); //output json 
}

if(isset($_POST["summary"])){
	echo '
				<div class="row">
                    <div class="col-md-6">
                        <label>Product total:</label>
                    </div>
                    <div class="col-md-6">
                        <p id="producttotal">';
							
							if(isset($_SESSION["cart_item"])){
								$item_total = 0;
									
								foreach ($_SESSION["cart_item"] as $item){
									$item_total += ($item["price"]*$item["quantity"]);
								}
								echo $item_total;
							} 
	echo '				</p>
                    </div>
				</div>

				<div class="row">
                    <div class="col-md-6">
                        <label>Delivery:</label>
                    </div>
                    <div class="col-md-6">
                        <p id="delivery">Free</p>
                    </div>
				</div>
				
				<div class="row p-b-30">
                    <div class="col-md-6">
                        <label>GST:</label>
                    </div>
                    <div class="col-md-6">
                        <p id="gst">6%</p>
                    </div>
				</div>
				
				<div class="row">
                    <div class="col-md-6">
                        <label>Total Amount:</label>
                    </div>
                    <div class="col-md-6">
                        <p id="producttotaltax">';
							
							if(isset($_SESSION["cart_item"])){
								$item_total = 0;
									
								foreach ($_SESSION["cart_item"] as $item){
									$item_total += ($item["price"]*$item["quantity"]);
								}
								$tax = ($item_total/100)*6;
								echo ($item_total+$tax);
							}
	echo '				</p>
                    </div>
				</div>
	';
}
?>