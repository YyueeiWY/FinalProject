<?php
session_start();
require_once("connection_file.php");
  
if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = runQuery("SELECT product.id, product.name, product.code, product.categories, product.image, product.price, stock.stock 
								FROM product INNER JOIN stock ON product.code = stock.code 
								WHERE product.code='" . $_POST["code"] . "'");
			/*
			$userid = $_SESSION['LoginID'];
			$product_id = $_POST['id'];
			$quantity = $_POST["quantity"];
			$addquery = "INSERT INTO `productorder`(`id`, `orderid`, `productid`, `quantity`) VALUES (NULL, '$userid', '$product_id', '$quantity')";
			if (mysqli_query($conn, $addquery)) {} else {}
			*/
			
			//array from table product
			$itemArray = array($productByCode[0]["code"]=>array('id'=>$productByCode[0]["id"], 'name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'image'=>$productByCode[0]["image"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'stock'=>$productByCode[0]["stock"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else 		
				$_SESSION["cart_item"] = $itemArray;
			}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			/*
			$userid = $_SESSION['LoginID'];
			$product_id = $_POST['id'];
			$delquery = "DELETE FROM `productorder` WHERE orderid = '$userid' AND productid = '$product_id'";
			if (mysqli_query($conn, $delquery)) {} else {}
			*/
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		/*
		$userid = $_SESSION['LoginID'];
		$empquery = "DELETE FROM `productorder` WHERE orderid = '$userid'";
		if (mysqli_query($conn, $empquery)) {} else {}
		*/
			
		unset($_SESSION["cart_item"]);
	break;		
}
}
?>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
		
    foreach ($_SESSION["cart_item"] as $item){
		?>
			<div class="row cart-tr">
				<div class="cart-img col-md-3"><img src='<?php echo $item["image"]; ?>' width="150px" height="150px"></div>
			<div class="col-md-2"><strong><?php echo $item["name"]; ?></strong></div>
			<div class="col-md-2"><?php echo $item["code"]; ?></div>
			<div class="col-md-2" style="text-align: center;"><?php echo $item["quantity"]; ?></div>
			<div class="col-md-2"><?php echo "RM".$item["price"]*$item["quantity"]; ?></div>
			<div class="cancel"><a onClick="cartAction('remove', '<?php echo $item["id"]; ?>', '<?php echo $item["code"]; ?>', '<?php $item["stock"]; ?>')" class="btnRemoveAction cart-action"><i class="fa fa-close" style="font-size:24px"></i></a></div>
			</div><hr>
			<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}

}else{
	echo '<div class="empty_cart">Your Cart is empty</div>'; //we have empty cart
}
?>