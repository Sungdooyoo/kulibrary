<?php
$answer=$_POST['answer'];
$input = $_POST['input'];

if ($answer == $input) {
	
	$pass= true;
	
} else {
	$pass = false; 
	
}

?> 

 <!DOCTYPE html>
 <html>
   <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <script src="http://popcornjs.org/code/dist/popcorn-complete.js"></script>
    
      
      <style>
		#iframebox {
		    position:relative;
		    top:0%;
		    left:0%;   
		    height: 180px; 
		}
		
		#ourvideo {
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
      	#webpage{
      		position: absolute;
      		top: 5px;
      		left:305px;
      		
      		
      	}
      </style>
       <script>
       quizAns1 = false;
       
      
 
         document.addEventListener( "DOMContentLoaded", function() {
 
  		
       var popcorn = Popcorn( "#ourvideo" );
       var vsrc = 
      
        popcorn.cue(<?php
        echo $_POST['stp']
        ?>
        , function(){
        	if(quizAns1){
        	
        		popcorn.play(3);
        		popcorn.controls(true);
        	}
        	else{
        		popcorn.pause();
        		popcorn.controls(false);
        		var fm = document.getElementById("oForm");
       			var c=document.getElementById("canvas");
        		
        		fm.style.display = "block";
        		
        		
        		c.style.display = "block"; 
        		
				var ctx=c.getContext("2d");
				
				ctx.fillStyle="white";
				ctx.fillRect(0,0,300,180);
        		
        	}
        });    
       
            
 
            
            
 
         }, false );
       </script>
       
      
     </head>     
     
   <body>
 
 <video height="180" width="300" id="ourvideo" controls style="position: absolute; left:0px; top: 0px;">
         

         <source src= <?php 
         if ($_POST['videosrc']) {
         	echo $_POST['videosrc'];
             
         } else {
             echo $_COOKIE['videosrc'];
         }
         
           ?>>
         
       </video>
 
     <br>
     <form id="oForm" name="oForm" >
			<?php
				
				echo $_POST['question'];
				
				?>
			
			<br>
			<input name="name" id="ql" />
			<input type="submit" onsubmit="function calcul()">
			
		</form>
		
		<script>
		
		function calcul()
		{
		alert("asdf")
			
			
		}
			
			
		</script>

  	<canvas id="canvas" style='	position:absolute; top: 0px; left: 0px; display:none; border:1px solid #000000;'>
  		</canvas>
  
  

     </body>
  </html>