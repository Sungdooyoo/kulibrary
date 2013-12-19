<?php

$conn = mysql_connect("localhost", "root", "1qlalfqjsgh");

mysql_query('SET NAMES utf8');
mysql_select_db("library");
if (!$conn) {
    echo "Unable to connect to DB: " . mysql_error();
    exit;
}
 
if (!mysql_select_db("library")) {
    echo "Unable to select mydbname: " . mysql_error();
    exit;
}

$get_burrowed = "SELECT * FROM `book` WHERE leftdays < 0"; 
$burrowed=mysql_query($get_burrowed);

while ($row = mysql_fetch_assoc($burrowed)) {
 

echo $row['burrower'];
echo " ";
echo "<e-mail>".$row['email']."</e-mail>";
echo " ";
echo $row['phoneNumber'];
echo " ";
echo $row['leftdays']."일 연체";

echo "<br>";
}



?>