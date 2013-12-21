<!DOCTYPE html>
<html>
	


	<body>
		<form method="post">
		<textarea name="text" id="txt"><?php 
		if($_POST['text'])
		{
			$input = $_POST['text'];
			$output = str_rot13($input);
			echo $output;
		}
		
		?>
		
		</textarea>
		

		
		
		
			
		
		<input type="submit" />
		</form>
		
		
	</body>
	
</html>