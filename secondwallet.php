
<?php 
require 'conn.php';
if ($_SERVER["REQUEST_METHOD"] === 'GET')
{
    

     if(isset($_GET['user'])){
        $user = mysqli_real_escape_string($conn,$_GET['user']);
    }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide user'));

   }
    if(isset($_GET['amount'])){
        $amount = mysqli_real_escape_string($conn,$_GET['amount']);
     }else{
        echo json_encode(array('status'=>'fail', 'message'=>'Please provide amount'));

     }
     if(isset($_GET['orderid'])){
        $orderid = mysqli_real_escape_string($conn,$_GET['orderid']);
        }else{
            echo json_encode(array('status'=>'fail', 'message'=>'Please provide orderid'));

     }
   
    $query = "INSERT INTO wallet(`user`,`amount`,`orderid`)   VALUES('$user','$amount','$orderid')";
    $result = $conn->query($query);
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
    echo json_encode($data);
?>
