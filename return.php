<!DOCTYPE html>
<html>
	<head>
		
		<SCRIPT LANGUAGE="JavaScript" SRC="http://www.searchnc.com/cgi-bin/atlas"></SCRIPT>  <!-- refer to  http://www.searchnc.com/atlas.html --> 
		<script>
			<?php $bkname = $_GET['bkname']; ?>
			var bkname = <?php echo "'".$bkname."'";?> 
			
			function setUsrName(){
				var usrname = document.getElementById("usrname").value;
				localStorage.usrname = usrname;
				
				if(bkname=='')
				{
					alert("비정상적 접근입니다")
					return false
				}
				else
				{
					return true;
				}
				
				
			}
		</script>
	</head>
	
	<body onload="init()"> 
		<form action="update.php" method="get" onsubmit="return setUsrName()" id="frm">
			<p>대출자</p>
			<input id="usrname" name="usrname" />
			<br>
			<input type="hidden" name="bkname" value= <?php echo "'".$bkname."'";?>/>
			<input type="submit" value="대출/반납" id="submit"/> 
			
			
		</form>
		<?php
		echo time();
		
		?>
		
		
		<script>
			// 
		
			
			function init(){
				 document.getElementById('usrname').value = localStorage.usrname;
				 if (navigator.geolocation)
				    {
				     navigator.geolocation.getCurrentPosition(valid);
				    
				    }
  					
 		 
			/*
			if(myip_address() == '182.215.90.159')
						 {
							 document.getElementById('inpt').disabled=true; 
						 }*/
			
			}
			
			function valid(position)
			  {
			  var lat = position.coords.latitude; 
			  var lon = position.coords.longitude;
			  
			  if(lat>37.5453 && lat<37.5454 && lon>=126.96570 && lon<=126.9659 )
			    {	
			    	
			    }
			    else{
			    	document.getElementById('usrname').disabled=true; 
			     document.getElementById('submit').disabled=true; 
			     alert("대출과 반납은 당연히 도서관 안에서 해야겠죠? ^^")
			    }
			  
			
			  
			  }
		</script>
	</body>
</html>