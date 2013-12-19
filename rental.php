<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	   <meta name="viewport" content="width=device-width, initial-scale=1"> 
		<script>
			<?php $bkname = $_GET['bkname']; 
			
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
			
			$ifrented = "SELECT status FROM `book` WHERE title = '$bkname'";
			$rented=mysql_query($ifrented);
			$row = mysql_fetch_assoc($rented);
			
			 
			$status= $row['status'];


			
			?>
			
			var bkname = <?php echo "'".$bkname."'";?> 
			
			function setUsrName(){
				var usrname = document.getElementById("usrname").value;
				var email = document.getElementById("email").value;
				var phoneNumber =document.getElementById("phoneNumber").value;
				
				
				
				localStorage.usrname = usrname;
				localStorage.email = email;
				localStorage.phoneNumber = phoneNumber;
				
				
			}
			
			function init(){
				if (navigator.geolocation)
				    {
				     navigator.geolocation.getCurrentPosition(valid,showError);
				    
				    }
				    else
				    {
				    	document.getElementById('usrname').disabled=true;
			    	document.getElementById('email').disabled=true; 
			    	document.getElementById('phoneNumber').disabled=true;  
			     document.getElementById('submit').disabled=true; 
			     alert('브라우저에서 위치확인을 가능하게 해 주세요');
				    }
				if(typeof usrname != undefined)
				{
					document.getElementById("usrname").value = localStorage.usrname;
					document.getElementById("email").value = localStorage.email;
					document.getElementById("phoneNumber").value = localStorage.phoneNumber;
					
				}
				
			}
			function showError(error)
				  {
				  switch(error.code) 
				    {
				    case error.PERMISSION_DENIED:
				     alert('위치를 파악할 수 있게 해주세요');
				     document.getElementById('usrname').disabled=true;
				     document.getElementById('email').disabled=true; 
				     document.getElementById('phoneNumber').disabled=true;  
				     document.getElementById('submit').disabled=true; 
					  break;
				    case error.POSITION_UNAVAILABLE:
				      alert("Location information is unavailable.")
				      break;
				    case error.TIMEOUT:
				      alert("The request to get user location timed out.");
				      break;
				    case error.UNKNOWN_ERROR:
				      alert("An unknown error occurred.")
				      break;
				    }
				  }
			function valid(position)
			  {
			  var lat = position.coords.latitude; 
			  var lon = position.coords.longitude;
			  
			  if(lat>37.5417 && lat<37.5420 && lon>=127.0751 && lon<=127.0752 )
			    {	
			    	alert("환영합니다")
			    }
			    else{
			    	document.getElementById('usrname').disabled=true;
			    	document.getElementById('email').disabled=true; 
			    	document.getElementById('phoneNumber').disabled=true;  
			     document.getElementById('submit').disabled=true; 
			     alert(lon)
			    }
			  
			
			  
			  }
		</script>
	
  
    <style>
			input{
				
				margin-left:30px;
				
				
			}
			#submit{
				
				margin:auto;
				width:70%;
				height: 50px;
				-webkit-border-radius: 				1em /*{global-radii-buttons}*/;
				border-radius: 						1em /*{global-radii-buttons}*/;
				-webkit-background-clip: padding;
	background-clip: padding-box;
	border: 1px solid 		#044062 /*{b-bup-border}*/;
	background: 			#396b9e /*{b-bup-background-color}*/;
	font-weight: bold;
	font-size:20px;
	color: 					#fff /*{b-bup-color}*/;
	text-shadow: 0 /*{b-bup-shadow-x}*/ 1px /*{b-bup-shadow-y}*/ 0 /*{b-bup-shadow-radius}*/ #194b7e /*{b-bup-shadow-color}*/;
	background-image: -webkit-gradient(linear, left top, left bottom, from( #5f9cc5 /*{b-bup-background-start}*/), to( #396b9e /*{b-bup-background-end}*/)); /* Saf4+, Chrome */
	background-image: -webkit-linear-gradient( #5f9cc5 /*{b-bup-background-start}*/, #396b9e /*{b-bup-background-end}*/); /* Chrome 10+, Saf5.1+ */
	background-image:    -moz-linear-gradient( #5f9cc5 /*{b-bup-background-start}*/, #396b9e /*{b-bup-background-end}*/); /* FF3.6 */
	
	background-image:         linear-gradient( #5f9cc5 /*{b-bup-background-start}*/, #396b9e /*{b-bup-background-end}*/);
		
			}
			.wrapper {
    text-align: center;
}


	h2{
		margin-left:auto;
		margin-right:auto;
		
	}

		</style>
		
		
	</head>
	<body onload="init()">
		
		<div class="wrapper">
   	<h1> 105호 관리 시스템</h1>
   	</div>
		<form  action="update.php" method="get" onsubmit="setUsrName()" id="frm">
			<h2>이름</h2>
			<input id="usrname" name="usrname" required="true" />
			<br>
			<h2>이메일</h2>
			<input id="email" name="email" type="email" required="true">
			<br>
			<h2>전화 번호</h2>
			<input id="phoneNumber" name="phoneNumber" type="number" required="true">
			<input type="hidden" name="bkname" value= <?php echo "'".$bkname."'";?>/>
			<br>
			<br>
			<br>
			<br>
			<div class="wrapper">
			<input type="submit" id="submit" value= <?php 
			if($status == 0)
			{
				echo "대출";
			}
			else{
				echo "반납";
			}
			
			?>
			
			> 
			</div>
			
		</form>
		<br>
		<div id="result">
			
		</div>
		 
		
	</body>
	
</html>