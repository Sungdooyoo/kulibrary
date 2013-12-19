<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	</head>
	<body>
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

$bkname = $_GET['bkname']; 
$usrname = $_GET['usrname'];
$email= $_GET['email'];
$phoneNumber = $_GET['phoneNumber'];

$chck = "SELECT status FROM `book` WHERE title = '$bkname' ";
$chckRslt = mysql_query($chck); 
$row = mysql_fetch_array( $chckRslt );

if($row['status']==1)
{
	$stupdate = "UPDATE  `library`.`book` SET  `status` =  '0' WHERE  `book`.`title` = '$bkname';";
	$brupdate = "UPDATE  `library`.`book` SET  `burrower` =  '' WHERE  `book`.`title` = '$bkname';";
	$ldupdate = "UPDATE  `library`.`book` SET  `leftdays` =  '5' WHERE  `book`.`title` = '$bkname';";
	$emupdate = "UPDATE  `library`.`book` SET  `email` =  '' WHERE  `book`.`title` = '$bkname';";
	$pnupdate = "UPDATE  `library`.`book` SET  `phoneNumber` =  '' WHERE  `book`.`title` = '$bkname';";
	mysql_query($brupdate);
	mysql_query($stupdate);
	mysql_query($ldupdate);
	mysql_query($emupdate);
	mysql_query($pnupdate);
	echo "반납되었습니다";
}
else {
	$stupdate = "UPDATE  `library`.`book` SET  `status` =  '1' WHERE  `book`.`title` = '$bkname';";
	$brupdate = "UPDATE  `library`.`book` SET  `burrower` =  '$usrname' WHERE  `book`.`title` = '$bkname';";
	$emupdate = "UPDATE  `library`.`book` SET  `email` =  '$email' WHERE  `book`.`title` = '$bkname';";
	$pnupdate = "UPDATE  `library`.`book` SET  `phoneNumber` =  '$phoneNumber' WHERE  `book`.`title` = '$bkname';";
	mysql_query($emupdate);
	mysql_query($pnupdate);
	mysql_query($stupdate);
	mysql_query($brupdate);
	echo "대출되었습니다";
}
echo "<br>";

 
?>

	</body>
</html>
