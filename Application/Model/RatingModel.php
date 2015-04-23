<?php
include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';


class Rating{
    
    private $id;
    private $product_id;
    private $user_id;

    public function getId(){
        return $this->id;        
    }
    
    public function  setId($value){
        $this->id=$value;
    }
    public function getProduct_Id(){
        return $this->product_id;        
    }
    
    public function  setProduct_Id($value){
        $this->product_id=$value;
    }
    public function getUser_Id(){
        return $this->user_id;        
    }
    
    public function  setUser_Id($value){
        $this->user_id=$value;
    }
}

class RateFunctionalty{
    
     public $dbcon;
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
    public function RateProduct(){
        
        $query="select product_id, product_name, category_id, avg_rating from product_list";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table border="1"> <th>Product Id</th><th>Product Name</th>'
        . '<th>Category Id</th><th>Rate This Product</th>';
         
        foreach($statement as $q){
           echo '<tr>';
           echo '<td>'. $q['product_id'].'</td><td>'. $q['product_name'].'</td>'
               . '<td>'.$q['category_id'].'</td>'             
               . '<td><a href=rating.php?id='.$q['product_id'].'>Rate This Product</a></td>';
           echo '</tr>';  
         }
        echo '</table>';
    }
}


