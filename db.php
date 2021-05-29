<?php


	//$db 	  = "restituo";
	//$db_user = "root";
	//$db_pwd  = "root";
	
//$link = mysql_connect('localhost',$db_user,$db_pwd) or die('Cannot connect to the DB');
//mysql_select_db($db,$link) or die('Cannot select the DB');

$user = 'root@';
$password = '';
$db = 'ex';
$host = 'localhost';
$port = 8000;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);



?>