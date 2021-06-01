<?php 
require'db.php';

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
   
    $query = "INSERT INTO `".$db."`.wallet(`user`,`amount`,`orderid`)   
        VALUES('".$user."','".$amount."','".$orderid."')";
    $result = mysqli_query($link,$query) or die('Errant query:  '.$query."<br>MySQL Error: ".mysqli_error($db));
    if ($result == 1)
    {
        $data["message"] = "data saved successfully";
        $data["status"] = "Ok";
    }
    else
    {
        $data["message"] = "data not saved successfully";
        $data["status"] = "error";    
    }
}
else
{
    $data["message"] = "Format not supported";
    $data["status"] = "error";    
}
    header('Content-type: application/json');
    echo json_encode($data);
?>
