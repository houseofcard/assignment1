<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>

<?php
// Start the session
session_start();
// set session variables
$id =  $_SESSION["id"];
$selected_size = $_POST['size'];
$_SESSION["size"] = $selected_size;
?>

<title>Quantity</title>
</head>
<body>
<?php
// Connect page to the database
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';
$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
?>

<p>This is the page where you, the customer, chooses the quantity of your chosen window.</p>

<?php
//Details of the customer order so far
$q = $pdo->query("SELECT * FROM typeavailable WHERE product_id = $id AND id = $selected_size");

while($row = $q->fetch()){
	$quantity = $row["stock"];
	echo "You have selected ".$row["name"];
	echo"<br>";
	echo " The cost is $" .$row["price"];
	echo " per window.";
	echo"<br>";
	echo " How many windows do you want? ";
	echo"<br>";
	echo " Note: You cannot order more than the Stock Available in the table above ";
	echo $quantity;
	echo "<p></p>";
}
?>

<form action ="order.php" method='post'>
<select name='quantity'>

<?php
for ($x = 1; $x <=$quantity; $x++){
	echo "<option selected>{$x}</option>";
}
?>
</select>
<input type="submit" name="submit" value="Quantity Selected"/>

</form>


<br>

</body>
</html>
