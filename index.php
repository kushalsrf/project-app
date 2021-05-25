<?php
header("Content-Type:application/json");
if (isset($_GET['user']) && $_GET['user']!="") {
	// include('C:\Users\kushal saraf\Desktop\test restapi\db.php');
	$con = mysqli_connect("localhost:3307","root@","","ex");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
	$user = $_GET['user'];
	$result = mysqli_query(
	$con,
	"SELECT * FROM `users` WHERE user=$user");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$invitedBy = $row['invitedBy'];
	$isActive = $row['isActive'];
	$registeredOn = $row['registeredOn'];
	response($user, $invitedBy, $isActive,$registeredOn);
	mysqli_close($con);
	}else{
		response(NULL, NULL, 200,"No Record Found");
		}
}else{
	response(NULL, NULL, 400,"Invalid Request");
	}

function response($user,$invitedBy,$isActive,$registeredOn){
	$response['user'] = $user;
	$response['invitedBy'] = $invitedBy;
	$response['isActive'] = $isActive;
	$response['registeredOn'] = $registeredOn;
	
	$json_response = json_encode($response);
	echo $json_response;
}
?>