<?php
require_once("pdo.php");

session_start();
if( isset($_POST['name']) && isset($_POST['email'])
		&& isset($_POST['password']) && isset($_POST['address'])){
	if(strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1
			|| strlen($_POST['address']) < 1){
		$_SESSION['error'] = 'Missing data';
		header("Location: add.php");
		return;
	}

	if(strpos($_POST['email'],'@') === false) {
		$_SESSION['error'] = 'Bad data';
		header("Location:add.php");
		return;
	}
	$sql = "INSERT INTO users (name, email, password, address)
		VALUES (:name, :email, :password, :address)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array(
		':name' => $_POST['name'],
		':email' => $_POST['email'],
		':password' => $_POST['password'],
		':address' => $_POST['address']));
	$_SESSION['success'] = 'Record Added';
	header('Location: app.php');
	return;
}

if(isset($_SESSION['error'])){
	echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
	unset($_SESSION['error']);
}
?>
<p>Create A New Account</p>
<form method="post">
<p>Name: <input type="text" name="name"></p>
<p>Email: <input type="text" name="email"></p>
<p>Password: <input type="text" name="password"></p>
<p>Address: <input type="text" name="address"></p>
<p><input type="submit" value="Create Account"/>
<button><a href="login.php">Cancel</button></p>
</form>
