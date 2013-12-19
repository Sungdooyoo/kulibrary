 <!DOCTYPE html>
 <html>
   <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script src="http://popcornjs.org/code/dist/popcorn-complete.js"></script>
	      
      <style>
		#oVideo {
		position:absolute;
		top:0px;
		left:0px;    
		}
      	
      	#oForm{
      		position:absolute;
      		top:5px;
      		left:5px;
      		display: none;
      		
      		z-index: 3;
      		
      	}
      
      </style>
      <script language="JavaScript">
 
document.addEventListener( "DOMContentLoaded", function() {
 	   
 	   /*array of bolleans*/
       quizAnss = new Array();
       /*array of strings*/
       quizzes = new Array();
       
       <?php
        $stps= $_POST['arrays'];   
        for($i  = 0; $i < $stps; $i++)
		{
			$j = $i + 1;
			$q = "question"."$j";
			
			echo "quizAns"."$j";
			echo "= false";
			echo "\n";
			echo "quizAnss.push(";
			echo "quizAns"."$j".");";
			echo "\n";
			echo $q;
			echo "=";
			echo "'";
			echo $_POST[$q];
			echo"'";
			echo ";";
			echo "\n";
			echo "quizzes.push(";
			echo $q;
			echo ");";
			echo "\n";
			
		}
       
       ?>

	 var vsrc = "<?php echo $_POST['videosrc'] ?>"
	 
	 if(vsrc.indexOf("youtu")<0)
	 {
	 	var popcorn = Popcorn( "#oVideo" );

	 }
	 else
	 {
	 	var popcorn = Popcorn.youtube( "#youtube", "<?php echo $_POST['videosrc'] ?>" );
	 	
	 }
 	 
     
     

            
      <?php
  
  $stps= $_POST['arrays'];
  
  for($i  = 0; $i < $stps; $i++)
  {
  	$j = $i + 1;
	$pnt = "stp"."$j";
	$pnt = $_POST[$pnt];
  	echo "popcorn.cue(";
	echo $pnt;
  	echo ", function(){
        	
        	
        	 
       
                	
        	if(quizAns";
      echo $j;
	  
	  echo "){
        	
        		popcorn.play();
        		popcorn.controls(true);
        	}
        	else{
        		popcorn.pause();
        		popcorn.controls(false);
        		var fm = document.getElementById('oForm');
       			var c=document.getElementById('canvas');
        		
        		fm.style.display = 'block';
        		
        		
        		c.style.display = 'block'; 
        		
				var ctx=c.getContext('2d');
				
				ctx.fillStyle='white';
				ctx.fillRect(0,0,300,180); 
				document.getElementById('question').innerHTML = quizzes[$i];
        		
        	}
        })";
		echo "\n";
  }
  
  ?>
            
 
            
            
 
         }, false );
         
         
    
         
       </script>
       
      
     </head>     
     
   <body>
 
 <video height="300" width="100%" id="oVideo" controls style="position: absolute; left:0px; top: 0px;" autoplay="true">
         <source src="
         
         <?php echo $_POST['videosrc'] ?>
         ">
         
      </video> 
      <div id="youtube" style="width:600px;height:400px;"></div>

     <br>
     <form id="oForm" name="oForm">
			<div id="question">
				
			</div>
			
			<br>
			<input name="name" id="ql" />
			<input type="button" onclick='calcul(this.form)';>
			
		</form>
		
		
		<script>
		
			var phase = 0;
		    
			function calcul(frm){
				
				var usrInput = frm.name.value; 
				var answers = new Array();
				<?php
				
				for ($i=0; $i < $_POST['arrays'] ; $i++) 
				{ 
					$j= $i + 1;
					$an= "var answer";
					$ans= "answer"."$j";
					
					echo $an."$j"."="."'"."$_POST[$ans]"; 
					echo "'";
					echo "\n";
					echo "answers.push("."answer"."$j".")";
					echo "\n";
				}
				
				?> 

				if(phase< <?php echo $_POST["arrays"] ?>)
								{
									var thisAnswer = answers[phase];
								}
								
								if(usrInput == thisAnswer ){
													var popcorn = Popcorn( "#oVideo" );
													alert("Congratulation");
													
													var fm = document.getElementById("oForm");
													   var c=document.getElementById("canvas");
													c.style.display = "none"; 
													
													
													frm.style.display = "none";
																				
													quizAnss[phase]= true;
													popcorn.controls(true);
													popcorn.play();
													
												
												}
												else{
													alert("Try Again!");
									
									}
									phase++;
				
				}
			
		</script>

  	<canvas id="canvas" style='	position:absolute; top: 0px; left: 0px; display:none; border:1px solid #000000;'>
  		</canvas>
  
  <?php
  echo '<pre>'; 
print_r($_POST); 
echo '</pre>';
  ?>

     </body>
  </html>