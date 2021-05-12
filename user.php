<?php

$mysqli = new mysqli("localhost:3307", "root@", "", "ex");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$sno = $mysqli->real_escape_string($_REQUEST['sno']);
$user = $mysqli->real_escape_string($_REQUEST['user']);
$invitedBy = $mysqli->real_escape_string($_REQUEST['invitedBy']);
$isActive = $mysqli->real_escape_string($_REQUEST['isActive']);
$registeredOn = $mysqli->real_escape_string($_REQUEST['registeredOn']);

 
// Attempt insert query execution
$sql = "INSERT INTO users(sno,user,invitedBy,isActive,registeredOn)
 VALUES ('$sno',  '$user', '$invitedBy', '$isActive', '$registeredOn')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>