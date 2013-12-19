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
					$DonorPhoneNumber = $_POST['DonorPhoneNumber'];
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

	foreach ($_POST as $key => $value)
	{
		echo $key . ' : ' . $value;
		
		if($value == 'on')
				{
					
					
					$sql= "UPDATE `library`.`donationlist` SET `IsDonated` = 'YES', `DonorName`='$Donor', `DonorEmail`='$DonorEmail', `DonorPhoneNumber`='$DonorPhoneNumber' WHERE `donationlist`.`bookName` ='$key'";
					
					mysql_query($sql);
								
				}
			
	}
    

	
?>