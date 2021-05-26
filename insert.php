<?php
// SET HEADER
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, orderidization, X-Requested-With");

// INCLUDING DATABASE AND MAKING OBJECT
class Database{
    
    private $db_host = 'localhost:3307';
    private $db_name = 'ex';
    private $db_username = 'root@';
    private $db_password = '';
    
    
    public function dbConnection(){
        
        try{
            $conn = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name,$this->db_username,$this->db_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e){
            echo "Connection error ".$e->getMessage(); 
            exit;
        }
        
        
    }
}
$db_connection = new Database();
$conn = $db_connection->dbConnection();

// GET DATA FORM REQUEST

$data = json_decode(file_get_contents("C:\Users\kushal saraf\Desktop\test restapi\input.json"));

//CREATE MESSAGE ARRAY AND SET EMPTY
$msg['message'] = '';

// CHECK IF RECEIVED DATA FROM THE REQUEST
if(isset($data->user) && isset($data->amount) && isset($data->orderid)){
    // CHECK DATA VALUE IS EMPTY OR NOT
    if(!empty($data->user) && !empty($data->amount) && !empty($data->orderid) ){
        
        $insert_query = "INSERT INTO `wallet`(user,amount,orderid,) VALUES(:user,:amount,:orderid)";
        
        $insert_stmt = $conn->prepare($insert_query);
        // DATA BINDING
        $insert_stmt->bindValue(':user', htmlspecialchars(strip_tags($data->user)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':amount', htmlspecialchars(strip_tags($data->amount)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':orderid', htmlspecialchars(strip_tags($data->orderid)),PDO::PARAM_STR);
       // $insert_stmt->bindValue(':status', htmlspecialchars(strip_tags($data->status)),PDO::PARAM_STR);
       // $insert_stmt->bindValue(':payment_time', htmlspecialchars(strip_tags($data->payment_time)),PDO::PARAM_STR);
        
        if($insert_stmt->execute()){
            $msg['message'] = 'Data Inserted Successfully';
        }else{
            $msg['message'] = 'Data not Inserted';
        } 
        
    }else{
        $msg['message'] = 'Oops! empty field detected. Please fill all the fields';
    }
}
else{
    $msg['message'] = 'Please fill all the fields | user, amount, orderid';
}
//ECHO DATA IN JSON FORMAT
echo  json_encode($msg);
?>