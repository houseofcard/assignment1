<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
<head><title>Stained Glass Windows</title>
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
<h1>Stained Glass Windows</h1>

<p>We offer the following stained glass windows:</p>

<table border="1">
<tr><th>Window Code</th><th>Window Name</th></tr>

<?php
$q = $pdo->query("SELECT * FROM stainedwindows");

while($row = $q->fetch()){
  echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td></tr>\n";
}

?>
</table>

<p>Select Stained Glass Window</p>

<form action="#" method="post">
<select name="windows">
<?php
$q = $pdo->query("SELECT * FROM stainedwindows");
    
    while($row = $q->fetch()){
        echo "<option value = ".$row["id"].">".$row["name"]."</option>\n";
    }
    ?>
</select>
<input type="submit" name="submit" value="Get Selected Value"/>
</form>
<?php
    if(isset($_POST['submit'])){
        $selected_val = $_POST['windows'];  // Storing Selected Value In Variable
        echo "You have selected :" .$selected_val;  // Displaying Selected Value
    }
    ?>
<br>

<?php
    if ($selected_val == '1'){
	      echo "<a href='astrological.php'>Astrological</a>";
    }
    if ($selected_val == '2'){
        echo "<a href='coloured_tree.php'>Coloured Tree</a>";
    }
    if ($selected_val == '3'){
        echo "<a href='http://127.0.0.1:8081/pages/gothic.php'>Gothic</a>";
    }
    if ($selected_val == '4'){
        echo "<a href='red_plant.php'>Red Plant</a>";
    }
    if ($selected_val == '5'){
        echo "<a href='religious.php'>Religious</a>";
    }
    ?></body>
</html>

