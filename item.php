<?php
require_once("pdo.php");
session_start();

if(!isset($_SESSION['Select'])){
	header("Location: app.php");
	return;
}
$sql="SELECT Product_name, Unit_price, Image FROM product WHERE Product_id=".$_SESSION['Select'];
$stmt = $pdo->query($sql);
if(!($row = $stmt->fetch(PDO::FETCH_ASSOC))){
	header("Location: app.php");
	return;
}
echo("$".$row['Unit_price']." per ".$row['Product_name']);
echo("<p><img src=".$row['Image']."height=\"80\" width=\"80\"/></p>");
?>
<html>
<form method = "post">
<label for="quantity">How Many Would You Like to Buy?</label>
<select name = "quantity" id="numBuy">
	<option value = "1">1</option>
	<option value = "2">2</option>
	<option value = "3">3</option>
	<option value = "4">4</option>
	<option value = "5">5</option>
</select>
<input type="submit" name="purch" value="Add to Cart">
</form>

<?php
if(isset($_POST['purch'])){
	$insrt = "INSERT INTO groceryorder(Product_id, Quantity, User_id) VALUES";
	$insrt.="(\"".$_SESSION['Select']."\",\"".$_POST['quantity']."\",\"".$_SESSION['User_id']."\")";
	if($pdo->query($insrt)){
		echo($_POST['quantity']." ".$row['Product_name']."s have been added to your cart.");
		//unset($_SESSION['Select']);
		//unset($_POST['purch']);
	}else
		echo('error has occurred. try again.');
}
//unset($_SESSION['Select']);
?>
<p>
<form method="post">
<button name="cont" value="true"><a href="app.php"/>Continue Shopping?</button>
<button><a href="checkout.php"/>Go to Checkout</button>
</form>
</p>
</html>
