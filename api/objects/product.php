<?php
class Product {
 
    // database connection and table name
    private $conn;
    private $table_name = "products";
 
    // object properties
    public $product_name;
    public $price;
    public $quantity;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
    
        // select all query
        $query = "SELECT 
                    *
                FROM
                    " . $this->table_name . "";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }

}
?>