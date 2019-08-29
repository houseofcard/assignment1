<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head>
<?php
// Start the session
session_start();
// set session variables
$_SESSION["id"] = 3;
$id = $_SESSION["id"]; 
?>
<title>Gothic</title>
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
//Connect page to the database
$db_host   = '192.168.2.12';
$db_name   = 'fvision';
$db_user   = 'webuser';
$db_passwd = 'insecure_db_pw';
$pdo_dsn = "mysql:host=$db_host;dbname=$db_name";
$pdo = new PDO($pdo_dsn, $db_user, $db_passwd);
?>
</head>

<body>

<p>This the order page for the Gothic Stained Glass Window</p>

<?php
echo "<img src='images/gothic.jpg'>";
?>
<!-- Table for Available Sizes Gothic Windows-->
<table border="1">
<tr><th>Window code</th><th>Window Size code</th><th>Size Name</th><th>Price</th><th>Stock Available</th></tr>

<?php
$q = $pdo->query("SELECT * FROM typeavailable");

while($row = $q->fetch()){
  if($row["product_id"]==3){	
    echo "<tr><td>".$row["product_id"]."</td><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["price"]."</td><td>".$row["stock"]."</td></tr>\n";
  }
}
?>
</table>

<br>

<!-- Select Size Options Box-->
<p>Select Size</p>

<form action="quantity.php" method="post">
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

</body>
</html>

