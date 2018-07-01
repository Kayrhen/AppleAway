<?php
require_once("pdo.php");
session_start();
//if(isset($_SESSION['Select']))
//	unset($_SESSION['Select']);
$sql = "SELECT Product_id, Product_name, Unit_price, Image FROM product";
if(isset($_GET['groups']) == false)
	$_GET['groups']=0;
if($_GET['groups'] != 0){
	$sql = $sql." WHERE FoodGroup=".$_GET['groups'];
}
?>

<html>
<p>Hello,
<?php echo(htmlentities($_SESSION['Name']));?>. Welcome to AppleAway!</p>
<p>
<form method="get" >
<label for="groups">Search Produce</label>
<select name = "groups" id="foodgroups">
	<option value = "0">All</option>
	<option value = "1">Fruit</option>
	<option value = "2">Vegetables</option>
	<option value = "3">Meat</option>
	<option value = "4">Seafood</option>
</select>
<input type="submit" value="Search"/></p>
</form>

<form method="get">
<?php
$stmt = $pdo->query($sql);
echo '<table border="1">'."\n";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	echo "<tr><td>";
	echo($row['Product_name']);
	echo("</td><td>");
	echo("\$".$row['Unit_price']);
	echo("</td><td>");
	echo("<img src=".$row['Image']."height=\"40\" width=\"40\"/>");
	echo("</td><td>");
	echo("<button name=\"Select\" value=\"".$row['Product_id']."\">");
	echo("Add to Cart</button>");
	echo("</a>");
	echo("</td></tr>");
}
echo("</table>");
if(isset($_GET['Select'])){
	$_SESSION['Select'] = $_GET['Select'];
	echo($_SESSION['Select']);
	header("Location: item.php");
	return;
}

?>
<button><a href="checkout.php">Checkout</button>
</form>
</html>
