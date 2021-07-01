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
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($link,$_GET['id']);
     }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide id'));
        exit;
     }
    if(isset($_GET['order_id'])){
        $order_id = mysqli_real_escape_string($link,$_GET['order_id']);
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
     if(isset($_GET['to_phone'])){
        $to_phone = mysqli_real_escape_string($link,$_GET['to_phone']);
     }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide phone'));
        exit;
     }
     if(isset($_GET['to_email'])){
        $to_email = mysqli_real_escape_string($link,$_GET['to_email']);
     }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide email'));
        exit;
     }
     if(isset($_GET['minutes'])){
        $minutes = mysqli_real_escape_string($link,$_GET['minutes']);
     }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide minutes'));
        exit;
     }
     if(isset($_GET['preference'])){
        $preference = mysqli_real_escape_string($link,$_GET['preference']);
     }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide preference'));
        exit;
     }
     if(isset($_GET['message'])){
        $message = mysqli_real_escape_string($link,$_GET['message']);
     }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide message'));
        exit;
     }
     if(isset($_GET['time_to_start'])){
      $time_to_start = mysqli_real_escape_string($link,$_GET['time_to_start']);
      # date("Y-m-d", strtotime("$time_to_start"));
   }else{
      echo json_encode(array('status'=>'fail', 'message'=>'Please provide time_to_start'));
      exit;
   }
   $timestring=date("Y-m-d", strtotime("$time_to_start"));
    if($status==1||$status==2){
        
        $query = "INSERT INTO orders(`id`,`order_id`,`user`,`to_phone`,`to_email`,`minutes`,`preference`,`message`,`status`,`time_to_start`)   
        VALUES('".$id."','".$order_id."','".$user."','".$to_phone."','".$to_email."','".$minutes."','".$preference."','".$message."','".$status."','".$timestring."')";

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