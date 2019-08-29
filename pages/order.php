<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
<?php
session_start();
// set session variables
$id =  $_SESSION["id"];
$size = $_SESSION["size"];
$selected_quantity = $_POST['quantity'];
?>

<title>Order</title>
<link rel="stylesheet" href="style_pages.css">
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

<h1>Stained Glass Windows</h1>

<h2>Order</h2>

<p>This is the page which shows the adjusted database, reflecting the reduction in stock available after the customer order.</p>

<h3>Adjusted Database</h3>

<?php
// retrieve stock in database before order
$v = $pdo->query("SELECT stock FROM typeavailable WHERE product_id = $id AND id = $size");
while($row = $v->fetch()){
	$stock = $row["stock"];

}
// calculate new stock balance
$new_stock = $stock - $selected_quantity;
// update database with new stock
$t=$pdo->query("UPDATE typeavailable SET stock = $new_stock WHERE product_id = $id AND id = $size");
?>
<!-- Show new stock balance in Available Size table-->
<table border="1">
<tr><th>Window code</th><th>Window Size code</th><th>Size Name</th><th>Price</th><th>Stock Available</th></tr>

<?php
$q = $pdo->query("SELECT * FROM typeavailable");
while($row = $q->fetch()){
	if($row["product_id"]==$id){	
		echo "<tr><td>".$row["product_id"]."</td><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["price"]."</td><td>".$row["stock"]."</td></tr>\n";
	}
}
?>
</table>
<br>

</body>
</html>
