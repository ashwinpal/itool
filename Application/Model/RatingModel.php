<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';


class Rating{
    
    private $id;
    private $product_id;
    private $user_id;

}

class RateFunctionalty{
    
     public $dbcon;
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
    public function RateProduct(){
        
        $query="select product_id, product_name, category_id, rating from product_list";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table border="1"> <th>Product Id</th><th>Product Name</th>'
        . '<th>Category Id</th><th>Rate</th>';
         
        foreach($statement as $q){
           echo '<tr>';
           echo '<td>'. $q['product_id'].'</td><td>'. $q['product_name'].'</td>'
               . '<td>'.$q['category_id'].'</td>'
               . '<td>'.$q['rating'].'</td>';
           echo '</tr>';  
         }
        echo '</table>';
    }
}


