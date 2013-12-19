<?php
    //retrieve our data from POST
    $username = $_POST['username'];
    $password = $_POST['password1'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];
     
  

    $conn = mysql_connect('localhost', 'root', '1qlalfqjsgh');
    mysql_select_db('library', $conn);
     
    //sanitize username
    $username = mysql_real_escape_string($username);
     
    $query = "INSERT INTO users ( username, password, email )
    VALUES ( '$username', '$password', '$email', );";
    mysql_query($query);
     
    mysql_close();
     
   
   

    
?>