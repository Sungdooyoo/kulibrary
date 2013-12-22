<?php
$conn = mysql_connect("localhost", "root", "1qlalfqjsgh");
						mysql_query('SET NAMES utf8');
						if (!$conn) {
						echo "Unable to connect to DB: " . mysql_error();
						exit;
						}
						if (!mysql_select_db("library")) {
						echo "Unable to select mydbname: " . mysql_error();
						exit;
						}
						
$Donor = $_POST['Donor'];
$DonorEmail = $_POST['DonorEmail'];
$Culture_Id = $_POST['culture_id'];

$sql= "INSERT INTO `library`.`culture_land_donation` (
`Donor` ,
`DonorEmail` ,
`Culture_Id` ,
`id`
)
VALUES (
'$Donor', '$DonorEmail', '$Culture_Id', NULL
);";
					
mysql_query($sql);
					
					



$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 50000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    move_uploaded_file($_FILES["file"]["tmp_name"],
         "/var/www/library/upload/" . $_FILES["file"]["name"]);

	
   
    }
  }
else
  {
  echo "올바르지 않은 형식입니다. 홈페이지로 다시 이동합니다";
  echo $_FILES["file"]["type"];
  
  }
?> 
<html>
	<script>
	
	</script>
	<h1>감사합니다!!</h1>
	<p>멋진 철학과 도서관으로 보답하겠습니다!!</p>
</html>