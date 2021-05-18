<?php
$mysqli = new mysqli("localhost:3307", "root@", "", "ex");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
?>