<?php
require_once("pdo.php");
session_start();
$sql = "SELECT Product_id, Quantity FROM groceryorder WHERE User_id=".$_SESSION['User_id'];
$stmt = $pdo->query($sql);
echo '<table border="1">'."\n";
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
  $find = "SELECT Product_name, Image FROM product WHERE Product_id=".$row['Product_id'];
  $find = $pdo->query($find);
  $item = $find->fetch(PDO::FETCH_ASSOC);
	echo "<tr><td>";
	echo($item['Product_name']);
	echo("</td><td>");
	echo("\$".$row['Quantity']);
	echo("</td><td>");
	echo("<img src=".$item['Image']."height=\"80\" width=\"80\"/>");
	echo("</td></tr>");
}
echo("</table>");
?>
<html>
This is your final checkout, shipped to <?php echo($_SESSION['Address'])?>.
</html?
