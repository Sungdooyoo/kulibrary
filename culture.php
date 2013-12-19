<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>건국대 철학과</title>

    <!-- Bootstrap core CSS -->
     <link href="/dist/css/bootstrap.min.css" rel="stylesheet">
     <style>
		@font-face
		{
		font-family: DaumFont;
		src: url(/fonts/Daum_Regular.ttf);
		}
		
		h
		{
		font-family:DaumFont;
		}
		p{
			color: rgb(42, 100, 150);
		}
	</style> 
	<script>
		function able()
		{
			sub = document.getElementById('sub');
			sub.disabled = false;
		}
	</script>
  </head>

  <body>

    <div class="container">
      
 
<form action="culture_accept.php" class="form-signin" id='frm' method="post"
enctype="multipart/form-data" >
<h3>문화상품권 전송</h3>
<input type="text" class="form-control" name="Donor" placeholder="기부자 이름" required autofocus>
<input type="text" class="form-control" name="DonorEmail" placeholder="이메일 주소 (옵션)">
<input name="culture_id" class="form-control" placeholder="문화상품권 일렬번호 (사진찍기가 어려우신 경우)" onchange="able()">
<input type="file" name="file" id="file"  class="form-control" onchange="able()"><br>
 

<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" disabled="disabled" id="sub" >전송</button>
</form>
 

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- Latest compiled and minified CSS -->

<!-- Latest compiled and minified JavaScript -->
<script src="/dist/js/bootstrap.min.js"></script>

  </body>
</html>
