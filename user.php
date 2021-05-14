<?php

require 'conn.php';
$userjsondata = file_get_contents('user.json');
$data = json_decode($userjsondata, true);
 
// Escape user inputs for security
$sno = $data['sno'];
$user = $data['user'];
$invitedBy = $data['invitedBy'];
$isActive = $data['isActive'];
$registeredOn = $data['registeredOn'];

 
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