<!-- <?php

require 'conn.php';
$userjsondata = file_get_contents('user.json');
$data = json_decode($userjsondata, true);
 
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
$mysqli->close(); -->