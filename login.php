 <?php
require_once("pdo.php");
if(isset($_POST["account"]) && isset($_POST["pw"])){
	$sql = "SELECT Name, Password, Address , User_id FROM users WHERE Email=\"".$_POST['account']."\"";
$stmt = $pdo->query($sql);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset($row['Name'])&& $_POST['pw'] == $row['Password']){
	$_SESSION["account"] = $_POST["account"];
	$_SESSION["success"] = "Logged in.";
	session_start();
	$_SESSION['Name'] = $row['Name'];
	$_SESSION['Address'] = $row['Address'];
  $_SESSION['User_id'] = $row['User_id'];
	header('Location: app.php');
	return;
}else{
	$_SESSION["error"] = "Incorrect password.";
 }
}
?>
<html>
<head></head><body>
</body><p>Login Page</p>
<?php
if(isset($_SESSION['error']))
echo ($_SESSION['error']);
?>
<form method="post">
	<p><label for="account">E-mail</label><input type="text" name="account"/><br/>
	<label for="pw">Password</label><input type="text" name="pw"/>
	</p><input type="submit"/>
	<button><a href="create.php">Create Account</button></form>
</form>
</html>
