<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include('config/sitenu_db.php');
include('objects/product.php');

$username = $_GET['username'];
$password = $_GET['password'];

$database = new Database();
$db = $database->getConnection();

if(isset($username) && isset($password)){
   
    if ($username == "sitenu") {
       
            if ($password == "weareawesome") {

                $product = new Product($db);
                $stmt = $product->read();
                $num = $stmt->rowCount();  

                if($num > 0) { 
                    $products_arr = array();
                    $products_arr["status"] = "success";
                    $products_arr["data"] = array();
                
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        $product_item=array(
                            "product_name" => $product_name,
                            "price" => $price,
                            "quantity" => $quantity
                        );           
                        array_push($products_arr["data"], $product_item);
                    }  
                    http_response_code(200);
                    echo json_encode($products_arr);  
                } 
            } else {
                $password_arr = array();
                $password_arr["status"] = "error";
                $password_arr["data"] = "Password is incorrect";

                echo json_encode($password_arr);  
            }

	} else {
        $user_arr=array();
        $user_arr["status"]="error";
        $user_arr["data"]="Username is incorrect";

        echo json_encode($user_arr);
    }
    
} else {
    http_response_code(404);

    echo json_encode(
        array("status" => "error")
    );
}

?>