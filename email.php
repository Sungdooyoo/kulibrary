<?php
 require_once "Mail.php";
 $host = "smtp.gmail.com";
 $username = "fbtjden";
 $password = "1rnrmf#qlalf";
 $from = "fbtjden@gmail.com";

 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
	 
	 
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

$get_burrowed = "SELECT * FROM `book` WHERE leftdays < 0"; 
$burrowed=mysql_query($get_burrowed);

while ($row = mysql_fetch_assoc($burrowed)) {
$to = $row['email'];
	if($row['leftdays']==-1)
	{
		 $book=$row['title'];
		 $subject = "건국대 철학과 도서관입니다. 책이 하루 연체되었네요! ^^";
         $body = "빌려가신 $book 빠른 시일 내에 반납바랍니다 ^^";
 
	}
	elseif($row['leftdays']==-2){
		$book=$row['title'];
		$subject = "건국대 철학과 도서관입니다. 책이 또 연체되었네요! ^^";
		$body = "빠른 시일 $book 내에 반납바랍니다 ^^";
	}
	elseif($row['leftdays']==-3){
		$book=$row['title'];
		$subject = "건국대 철학과 도서관입니다. 벌써 3일 째네요! ^^";
		$body = "$book 어서 반납바랍니다 ^^";
	}
	elseif($row['leftdays']==-4){
		$book=$row['title'];
		$subject = "건국대 철학과 도서관입니다. 공부 많이 하셨나요?";
		$body = "$book 재밌죠? 혼자만 읽지 말고 같이 읽어요 ^^";
	}
	elseif($row['leftdays']==-5){
		$book=$row['title'];
		$subject = "건철 도서관입니다. 5일 째네요";
		$body = "$book 빠른 시일 내에 반납 바랍니다 ^^";
	}
	elseif($row['leftdays']==-6){
		$book=$row['title'];
		$subject = "건철 도서관입니다. 오늘 하루 잘 보내셨나요?";
		$body = "$book 을 반납한다면 더 멋진 내일이 펼쳐질거에요! ^^";
	}
	elseif($row['leftdays']==-7){
		$book=$row['title'];
		$subject = "건철 도서관입니다. ";
		$body = "$book 을 반납한다면 유혈사태를 피할 수 있을 것입니다 ^^";
	}
	elseif($row['leftdays']==-8){
		$book=$row['title'];
		$subject = "건철 도서관입니다. ";
		$body = " $book $book $book <br> 더 이상의 자세한 설명은 생략합니다.";
	}		
	else{
		$book=$row['title'];
		$subject = "건철 도서관이다";
        $body = " $book $book $book <br> 더 이상의 자세한 설명은 생략한다";
	}
	 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
   
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }
echo $row['email'];
echo " ";

}


 
 
 


 
 




?>