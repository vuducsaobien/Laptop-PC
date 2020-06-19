<?php 
$userEmail = $_POST["email"];
$password = $_POST["password"];
$result = ($userEmail == "admin@gmail.com" && $password == "123") ? "ĐN thành công" : "ĐN thất bại";
 echo $result;
 ?>