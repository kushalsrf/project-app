<?php 
$conn = mysqli_connect('localhost:3307',"root@","","ex");
if ($_SERVER["REQUEST_METHOD"] === 'POST')
{
    $user = $_REQUEST["user"];
    $amount = $_REQUEST["amount"];
    $orderid = $_REQUEST["orderid"];
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