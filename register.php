<?php
require_once('db.php');

if(isset($_GET['phone'])) {
	$phone = mysqli_real_escape_string($link,$_GET['phone']);
} else {
	echo json_encode(array('status'=>'fail', 'message'=>'Please provide phone'));
	exit;
}

if(isset($_GET['invitedBy'])) {
	$invitedBy = mysqli_real_escape_string($link,$_GET['invitedBy']);
} else {
	$invitedBy = "";
	
	}


$query  = "  INSERT  INTO `".$db."`.`users` 
					  	  SET 	  phone         = '".$phone."',
                                  invitedBy = '".$invitedBy."'					  ";
					  
$result   = mysqli_query($link,$query) or die('Errant query:  '.$query."<br>MySQL Error: ".mysqli_error($db));
		
		
	if($result>0) {
		$json = array("status" => 'success', "message" => "Congratulations You have successfully registered");
	}
	else {
		$json = array("status" => 'fail', "message" => "OOPS, Please Try Again");
	}
	header('Content-type: application/json');
	echo json_encode($json);

?>		