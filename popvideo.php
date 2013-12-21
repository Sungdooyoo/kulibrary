 <html>
      <head>
       <script src="http://popcornjs.org/code/dist/popcorn-complete.js"></script>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
       <style>
       	#slider{
       		
       		width: 600px;
       	} 
        
        #canvas{
        	width:300px;
        	height:200px;
        	position:absolute;
        	left:650px;
        	top:10px;
        }
        #oForm{
        	position:absolute;
        	left:660px;
        	top:15px;
        	width:300px;	
        	display:none;
        	
        	
        	z-index: 3;
        }
       	
       	#question{
       		
       		width:300px;
       		
       	}
       	
       	#ourvideo{
       	
       		
       		
       	} 
       	
       	#php{
       		position:absolute;
       		top:300px;
       	} 
       	
       	#start{
       		       	}
       </style>
       
       <script>
       var correct = false;
         document.addEventListener( "DOMContentLoaded", function() {
 
	   /*array of bolleans*/
       quizAnss = new Array();
       /*array of strings*/
       quizzes = new Array();
       stoppoints = new Array(); 
		<?php
		 
		$stps= $_POST['arrays'];   
		for($i  = 0; $i < $stps; $i++)
		{
		$j = $i + 1;
		$pnt = "stp"."$j";
		$pnt = $_POST[$pnt];

				echo "stoppoints.push('$pnt')";
				echo "\n";
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
	   var popcorn = Popcorn( "#ourvideo" );
	   var video = document.getElementById("ourvideo");
	   var slider = document.getElementById("slider");
	   var start = document.getElementById("start");
	   var pause = document.getElementById("pause");
	   
 		   
 		   video.addEventListener("timeupdate", reportProgress, false);
 		  
 		   video.addEventListener('loadedmetadata', function() {
			    slider.step = (500/(popcorn.duration()));
			   
			});
 		
			  function reportProgress(){
						   var time = Math.round(video.currentTime); 
						   	
						   
						   var duration = parseInt(video.duration);
						   var position = (500*time)/duration;
						   slider.value =position; 
																										}
		   


  var stps=  <?php echo $_POST['arrays'];	?>;
     
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
        	
        	if(quizAnss[";
      echo $i;
	  
	  echo "]){
        	
        		popcorn.play();
        		
        	}
        	else{
        		popcorn.pause();
        		
        		var fm = document.getElementById('oForm');
       			var c=document.getElementById('canvas');
        		
        		fm.style.display = 'block';
        		
        		
        		c.style.display = 'block'; 
        		
				var ctx=c.getContext('2d');
				
				
				ctx.fillStyle='white';
				ctx.fillRect(0,0,300,200); 
				document.getElementById('question').innerHTML = quizzes[$i];
        		
        	}
        })";
		echo "\n";
  }
  
  ?>
  
   var video = document.getElementById("ourvideo");
    function reportProgress(){
                   var time = Math.round(video.currentTime); 
                   var duration = parseInt(video.duration);
                   var position = (500*time)/duration;
                   var mins = Math.floor(time/60);
				   var secs = time % 60;
				   var tock = (mins < 10 ? "0" : "" ) + mins + ":" + (secs < 10 ? "0" : "" ) + secs;
				   document.getElementById('time').innerHTML=tock;
                   slider.value =position; 
                         
                                                                                       }
            }, false );
            
   
           function sldrRePos(sld){
          	video = document.getElementById("ourvideo");
          	var time = Math.round(video.currentTime);
          	 
	    	 var mins = Math.floor(time/60);
				   var secs = time % 60;
				   var tock = (mins < 10 ? "0" : "" ) + mins + ":" + (secs < 10 ? "0" : "" ) + secs;
				   document.getElementById('time').innerHTML=tock;
	    	video.currentTime=video.duration*sld.value/500;
	    	<?php 
	    	$stps= $_POST['arrays'];
	    	for ($i=0; $i < $stps; $i++) {
					
				if($i==0){
			echo "if(quizAnss[$i]==false && video.currentTime>stoppoints[$i])";
			echo "\n";
			echo "{";
			echo "\n";
			echo "video.currentTime = stoppoints[$i];";
			echo "\n";
			echo "sld.value = stoppoints[$i];";
			echo "\n";
			echo "}";
			echo "\n";
					
				}
else {
	echo "else if(quizAnss[$i]==false && video.currentTime>stoppoints[$i])";
			echo "\n";
			echo "{";
			echo "\n";
			echo "video.currentTime = stoppoints[$i];";
			echo "\n";
			echo "sld.value = stoppoints[$i];";
			echo "\n";
			echo "}";
			echo "\n";
}
			
			
						}
	    	
	    	?>
	    	
	    	
	    	
          }
          
          function playPause(){

			 var popcorn = Popcorn("#ourvideo");
			 if(popcorn.paused())
			 {
			 popcorn.play();	
			 }
			 else
			 {
			 	popcorn.pause();
			 }

         
          }
      
       
       var phase = 0;
       function calcul(frm){
       	popcorn = Popcorn("#ourvideo");
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
													
													alert("Congratulation");
													correct = true;
													var fm = document.getElementById("oForm");
												    var c=document.getElementById("canvas");
													c.style.display = "none"; 
													
													
													frm.style.display = "none";
																				
													quizAnss[phase]= true;
													
													popcorn.play();
													
												phase++;
												}
												else{
													alert("Try Again!");
									
									}
									
				frm.name.value="";
       	
       }   
          
       </script>
     </head>
     <body>
      
       <video  width="600" id="ourvideo" autoplay="true">
         <source src="<?php echo $_POST['videosrc'] ?>">
         
       </video>
       <div id="youtube" style="width:600px;height:400px;display: none"></div>
       <br>
       <input type="button" id="start" value="start/pause" onclick="playPause()" />
       <div id="time">
       	
       </div>
       <br>
       <input type="range" min="1" max="500" value="1" id="slider" onchange="sldrRePos(this)">
       <form id="oForm" name="oForm" onsubmit="return false" class="frm">
			<div id="question" class="frm">
				
			</div>
			
			<br>
			<input name="name" id="ql" class="frm"/>
			<input type="button" onclick='calcul(this.form)' class="frm";>
			
		</form>
     	<canvas id="canvas" class="frm" style='	 display:none; border:1px solid #000000;'>
  		</canvas>
  		
  		
  		
     </body>
   </html>