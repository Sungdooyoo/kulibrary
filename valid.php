<!DOCTYPE html>
<html>
	<head>
	<style>
/*
	#psswrdMsg, #usrNameMsg{
		position: relative;
		left:  600px;
		width: 100px;
		height:10px;
		
	}
	*/

		</style>
		
		
	</head>
	
	<body>
		
		<form method="post" action="welcome.php" onsubmit="return validate()">
		<b>User Name</b><input required="true" name="username" id="usrnm"/> <div id="usrNameMsg"></div>
		<br>
		<b>Password</b>
		<input type="password" required="true" name="password" id="password"/>
		<div id="psswrdMsg"></div>
		<div id="confirmMsg"></div>
		<br>
		<b>Password Confirm</b>		
		<input type="password" required="true" name="verify" id="confirm"/>
		<br>
		<b> E-mail</b>
		<input name="email"/>
		<br>
		<input type="button" onclick="validate()">
		<input type="submit" />	
		</form>
		
			<script>
			function validate(){
				
						var usrnameVal = false;
						var passwordVal = false;
						
						var password = document.getElementById("password").value;
						var confirm = document.getElementById("confirm").value;
				
						var usrname = document.getElementById("usrnm").value;
						
						if(usrname == "")
						{
							document.getElementById("usrNameMsg").innerHTML = "UsrName Required!"
						}
						
						if(password== "")
						{
							document.getElementById("psswrdMsg").innerHTML = "Password Required!"
						}
						
						if(confirm == "")
						{
							document.getElementById("confirmMsg").innerHTML = "Confirm Required!"
						}
						
						
						if(usrname.match(" "))
							{
								usrnameVal = false;
								document.getElementById("usrNameMsg").innerHTML="Invalid usrname"
							}
							else
							{
								usrnameVal = true;
							}
						
						
						
						if(password == confirm)
						{
							passwordVal= true;
						}
						else
						{
							document.getElementById("password").value="";
							document.getElementById("confirm").value="";
							
							document.getElementById("psswrdMsg").innerHTML="Confirm the Password!"
						}
						
						if(usrnameVal && passwordVal)
						{
							return true;
						}
						else
						{
							return false;
						}
					
		
			}
			
			
		</script>
		
		
		
	</body>
	
	
</html>