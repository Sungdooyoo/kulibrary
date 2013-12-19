<!DOCTYPE html> 
<html> 
    <head> 
    <title>건국철도 기증도서 목록</title> 
        <!-- 모바일 디바이스를 위한 설정 -->
  
  
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	    <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <!-- jQuery mobile에서 사용하는 css, javascript. 아래 3개의 리소스를 로드해야 함 -->
 
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <!--<script src="ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>--> 
    
    <style>
    	.list{
    		
    		display: none;
    	}
    	
    </style>
    <script>
    	function ChronolShow(frm){
    		
    	    		document.getElementById(frm.value).style.display = 'block';
    			
    			
    	}
    	function hideWA(){
    		
    	
			/*
			var field= myform.west_ancient;
								for(i = 0; i < field.length; i++)
								{
									if(field[i].checked == true)
									{
										field[i].click();	
									}								
														  }
			*/
			
			var field = document.getElementsByClassName('west_ancient')
			for(i=0; i<field.length; i++)
			{
				if(field[i].checked==true)
				{
					field[i].click();
				}
			}		
    		document.getElementById('west_ancient').style.display="none";
    		
    	}
    	function hideMid(){
    		var field= document.getElementsByClassName('west_middle')
    		for(i = 0; i < field.length; i++)
    		{
    			
				if(field[i].checked == true)
				{
					field[i].click();	
				}								
				
    		}
    		document.getElementById('west_middle').style.display="none";
    		
    	}
    	function valid(){
    		phone = document.getElementById('donorPhoneNumber');
    		phone = phone.value;
    		phone = phone.replace('-','');
    		return true;
    		
    	}
    </script>
    </head>
    <body >
	
	<div data-role="page" id="mainpage">
		<div data-role="header">
        	
        	<h1>기증 도서 분야</h1>
        	
    	</div><!-- /header -->
        <!-- 컨텐츠가 표시되는 영역을 지정 -->
    	<div data-role="content"> 
    		
			 

<fieldset class="ui-grid-a">
    <div class="ui-block-a">
    	<select name="Chronology" onchange="ChronolShow(this)">
			  <optgroup label="서양">
			  	<option>시대별</option>
            <option value="west_ancient">서양 고대</option>
            <option value="west_middle">서양 중세</option>
            <option value="west_modern">서양 근대</option>
            <option value="west_present">서양 현대</option>
        </optgroup>
        <optgroup label="동양">
            <option value="east_sunjin">동양 선진</option>
            <option value="east_handang">동양 한당</option>
            <option value="east_songmyeong">동양 송명</option>
            <option value="east_guitar">동양 기타</option>
        </optgroup>
			</select> 
    
    </div>
    <div class="ui-block-b">
    	  <select name="Field">
    	  	<option>분과별</option>
        <option value="ontology">존재론/형이상학</option>
        <option value="epistemology">인식론</option>
        <option value="ethics">가치론/윤리학</option>
        <option value="logic">논리학/수학</option>
        <option value="science">과학</option>
        <option value="aethics">미학</option>
        <option value="history">역사</option>
        <option value="sociology">정치/경제/사회</option>
        <option value="education">교육</option>
        <option value="philosophy_history">철학사</option>
        <option value="101">개론서</option>
    </select>
    	
    	
    </div>
</fieldset>
<br>
<form method="post" action="donated.php" data-ajax="false" name="myform" onsubmit="return valid()">
    		<div id="west_ancient" class="list">
    			<div class="ui-grid-a">
	<div class="ui-block-a"><h3>서양 고대</h3> </div>
	<div class="ui-block-b"><a href="#" data-role="button" data-icon="delete" data-iconpos="notext" data-theme="c" style=" position: absolute; right:50px" onclick='hideWA()'></a></div>
</div><!-- /grid-a -->
		<fieldset data-role="controlgroup">
    				
    				
    				
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
						$west_ancient_sql = "SELECT * FROM `donationlist` WHERE `Category` = '서양 고대' AND `IsDonated`= 'NO'";
						$west_ancient_sql_result = mysql_query($west_ancient_sql);
						if (!$west_ancient_sql_result) {
						echo "Could not successfully run query ($west_ancient_sql_result) from DB: " . mysql_error();
						exit;
						}
						if (mysql_num_rows($west_ancient_sql_result) == 0) {
						echo "No rows found, nothing to print so am exiting";
						exit;
						}
						// While a row of data exists, put that row in $row as an associative array
						// Note: If you're expecting just one row, no need to use a loop
						// Note: If you put extract($row); inside the following loop, you'll
						// then create $userid, $fullname, and $userstatus
						
						while ($row = mysql_fetch_assoc($west_ancient_sql_result)) {
												
						echo "<input name= '{$row['bookName']}' id='{$row['bookName']}' type='checkbox' class='west_ancient' > \n";
						echo "<label for = '{$row['bookName']}'> {$row['bookName']} </label> \n";
						
							
						
						}
						
						mysql_free_result($result);
?>
   </fieldset>
    			
    		</div>
    		<div id="west_middle" class="list">
    				<div class="ui-grid-a">
	<div class="ui-block-a"><h3>서양 중세</h3> </div>
	<div class="ui-block-b"><a href="#" data-role="button" data-icon="delete" data-iconpos="notext" data-theme="c" style=" position: absolute; right:50px" onclick='hideMid()'></a></div>
</div><!-- /grid-a -->
    			<fieldset data-role="controlgroup">
    			
    				<?php
    				
						$west_middle_sql = "SELECT * FROM `donationlist` WHERE `Category` = '서양 중세'";
						$west_middle_sql_result = mysql_query($west_middle_sql);
						if (!$west_middle_sql_result) {
						echo "Could not successfully run query ($west_middle_sql_result) from DB: " . mysql_error();
						exit;
						}
						if (mysql_num_rows($west_middle_sql_result) == 0) {
						echo "No rows found, nothing to print so am exiting";
						exit;
						}
						// While a row of data exists, put that row in $row as an associative array
						// Note: If you're expecting just one row, no need to use a loop
						// Note: If you put extract($row); inside the following loop, you'll
						// then create $userid, $fullname, and $userstatus
						
						while ($row = mysql_fetch_assoc($west_middle_sql_result)) {
												
						echo "<input name= '{$row['bookName']}' id='{$row['bookName']}' type='checkbox' class='west_middle'> \n";
						echo "<label for = '{$row['bookName']}'> {$row['bookName']}:  {$row['Author']}</label> \n";
						
							
						
						}
						
						
?>
   </fieldset>
    			
    		</div>
    		
    		<div data-role="fieldcontain">
    			<label for="Donor">증여자 성명:     </label> 
    			<input type="text" name="Donor" id="donor" value="" placeholder="" required="true"/>
    		</div>	
    		<div data-role="fieldcontain">
         	<label for="DonorEmail">이메일:    </label>
    			<input type="email" name="DonorEmail" id="donorEmail"  required="true"/>
    		</div>
    		<div data-role="fieldcontain">
         <label for="DonorPhoneNumber">핸드폰 번호:     </label>		
	    		<input type="number" name="DonorPhoneNumber" id="donorPhoneNumber" required="true" placeholder=" '-' 을 빼고 번호만 넣어주세요">
    		</div>
    		<input type="submit" />
    			
    			</form>
	    		
    		
    	
    </div>
	</div><!--content-->
	</div><!-- /page -->
	</body>
	</html>