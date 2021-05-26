
<?php 
require 'conn.php';
if ($_SERVER["REQUEST_METHOD"] === 'GET')
{
    

     if(isset($_GET['user'])){
        $user = mysqli_real_escape_string($conn,$_GET['user']);
    }else{
          echo "user not set in GET Method";
   }
    if(isset($_GET['amount'])){
        $amount = mysqli_real_escape_string($conn,$_GET['amount']);
     }else{
        echo  "amount not set in GET Method";
     }
     if(isset($_GET['orderid'])){
        $orderid = mysqli_real_escape_string($conn,$_GET['orderid']);
        }else{
     echo   "orderid not set in GET Method";
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