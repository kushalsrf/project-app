<?php 
require ' db.php';
if ($_SERVER["REQUEST_METHOD"] === 'GET')
{
    

     if(isset($_GET['user'])){
        $user = mysqli_real_escape_string($link,$_GET['user']);
    }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide user'));
        exit;
   }
    if(isset($_GET['amount'])){
        $amount = mysqli_real_escape_string($link,$_GET['amount']);
     }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide amount'));
        exit;
     }
     if(isset($_GET['orderid'])){
        $orderid = mysqli_real_escape_string($link,$_GET['orderid']);
        }else{
            echo json_encode(array('status'=>'fail', 'message'=>'Please provide orderid'));
            exit;
     }
     
     if(isset($_GET['status'])){
        
        $status = mysqli_real_escape_string($link,$_GET['status']);
        }else{
            echo json_encode(array('status'=>'fail', 'message'=>'Please provide status'));
            exit;
     }
   
    if($status==1||$status==2){
        
        $query = "INSERT INTO `".$ex."`.wallet(`user`,`amount`,`orderid`,`status`)   
        VALUES('".$user."','".$amount."','".$orderid."','".$status."')";
        $result = mysqli_query($link,$query) or die('Errant query:  '.$query."<br>MySQL Error: ".mysqli_error($ex));


        
        if ($result == 1)
        {
        $data["message"] = "data saved successfully";
        $data["status"] = "success";
        }
        else
        {
        $data["message"] = "data not saved successfully";
        $data["status"] = "fail";    
        }
    }
    else {
        echo json_encode(array('status'=>'fail', 'message'=>'status can either be 1 or 2'));
         }
}
else
{
    $data["message"] = "Format not supported";
    $data["status"] = "fail";    
}
    header('Content-type: application/json');
    echo json_encode($data);
?>