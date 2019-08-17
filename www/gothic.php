<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Gothic</title>
<style>
th { text-align: left; }

table, th, td {
border: 2px solid grey;
    border-collapse: collapse;
}

th, td {
padding: 0.2em;
}
</style>
<?php
    $db_host   = '192.168.2.12';
    $db_name   = 'fvision';
    $db_user   = 'webuser';
    $db_passwd = 'insecure_db_pw';
    
    $pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
    
    $pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
    ?>
</head>

<body>

<p>This the order page for the Gothic Stained Glass Window<p>

<?php
echo "<img src='images/gothic.jpg'>";
?>


<table border="1">
<tr><th>Window code</th><th>Window Size code</th><th>Size Name</th><th>Price</th></tr>

<?php

$q = $pdo->query("SELECT * FROM typeavailable");

while($row = $q->fetch()){
	if($row["product_id"]==3){	
		echo "<tr><td>".$row["product_id"]."</td><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["price"]."</td></tr>\n";
	}
}

?>
</table>

<br>

<p>Select Size</p>

<form action="#" method="post">
<select name="size">
<?php
$q = $pdo->query("SELECT * FROM typeavailable");

while($row = $q->fetch()){
	if($row["product_id"]==3){	
		 echo "<option value = ".$row["id"].">".$row["name"]."</option>\n";
	}
}

?>
</select>
<input type="submit" name="submit" value="Get Selected Value"/>
</form>
<?php
if(isset($_POST['submit'])){
$selected_size = $_POST['size'];  // Storing Selected Value In Variable
$selected_price = $_POST['price'];  // Storing Selected Value In Variable
echo "You have selected :" .$selected_size;  // Displaying Selected Value
echo"<br>";

}
?>
<br>

</body>
</html>
