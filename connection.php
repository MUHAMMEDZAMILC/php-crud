<?php
  $conn=new mysqli('localhost','root','','user');
  if($conn->connect_error ){
     die("Connection failed".$con->connect_error);
  }
  
?>