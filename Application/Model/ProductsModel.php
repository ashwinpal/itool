<?php
include $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//class srtuc. with get set
//class queries
// all properties must be private

class AddProduct{
    
    //class variables are same as db field names
    private $product_id;
    private $product_name;
    private $product_description;
    private $category_id;
    private $buying_price;
    //private $image;
    
//    function __construct()
//    {
//        $this->product_id=$product_id;
//        $this->product_name=$product_name;
//        $this->product_description=$product_description;
//        $this->category_id=$category_id;
//        $this->buying_price=$buying_price;
//        $this->image=$image;
//    }

    public function getProduct_Id(){
        return $this->product_id;        
    }
    
    public function  setProduct_Id($value){
        $this->product_id=$value;
    }

    public function getProduct_Name(){
        return $this->product_name;
    }
    
    public function  setProduct_Name($value){
        $this->product_name=$value;
    }

    public function getProduct_Decription(){
        return $this->product_description;        
    }

    
    public function  setProduct_Description($value){
        $this->product_description=$value;
    }

    public function getCategory_Id(){
        return $this->category_id;
    }
    
    public function setCategory_Id($value){
        $this->category_id=$value;
    }

    public function getBuying_Price(){
        return $this->buying_price;
    }

    public function setBuying_Price($value){
        $this->buying_price=$value;
    }

//    public function getImage(){
//        return $this->image;
//    }
//    
//    public function setImage($value){
//        $this->image=$value;
//    }  
}

class ProductFunctionalty{
    
     public $dbcon;
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
    public function DisplayProduct(){
        
        $query="select product_id, product_name, product_description, category_id, "
                . "buying_price, avg_rating from product_list";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table class="table table-striped"> <th>Product Id</th><th>Product Name</th><th>Product Description'
        . '</th><th>Category Id</th><th>Price</th><th>Rating</th><th>Update</th><th>Delete</th>';
         
        foreach($statement as $q){
           echo '<tr>';
           echo '<td>'. $q['product_id'].'</td><td>'. $q['product_name'].'</td>'
               . '<td>'.$q['product_description'].'</td>'
               . '<td>'.$q['category_id'].'</td>'
               . '<td>'.$q['buying_price'].'</td><td>'.$q['avg_rating'].'</td>'
               . '<td><a href=update.php?id='.$q['product_id'].'>Update</a></td>'
               . '<td><a href=delete.php?id='.$q['product_id'].'>Delete</a></td>';
           echo '</tr>';  
         }
        echo '</table>';
    }
    
    public function InsertProduct($newProd){

        $query=" insert into product_list (product_id, product_name, product_description, category_id, buying_price) "
                . "values(:product_id, :product_name, :product_description, :category_id, :buying_price)";
       
        $statement = $this->dbcon->prepare($query);
        
        $statement->bindValue(':product_id', $newProd->getProduct_Id());
        $statement->bindValue(':product_name', $newProd->getProduct_Name());
        $statement->bindValue(':product_description', $newProd->getProduct_Decription());
        $statement->bindValue(':category_id', $newProd->getCategory_Id());
        $statement->bindValue(':buying_price', $newProd->getBuying_Price());
//        $statement->bindValue(':image', $newProd->getImage());
                 
        $success = $statement->execute();
                 
        $statement->closeCursor(); 
        
        if($success){
            return 1;
        }
        else {
            return 0;
        }
    }
    
    public function  DeleteProduct($id){
        
        $query="select product_id, product_name from product_list";
        
        $statement = $this->dbcon->prepare($query);

        $statement->bindValue(':product_id', $id);
                       
        $success = $statement->execute();

        $statement->closeCursor();

        if($success)
        {
            return 1;

        }
        else
        {
            return 0;
        }
    }

    public function UpdateProduct($Pname){
            
        $query="update product_list set product_id=:product_id, product_name=:product_name, product_description=:product_description, category_id=:category_id, buying_price=:buying_price where product_id=:product_id ";   
        
        $statement = $this->dbcon->prepare($query);     
        
        $statement->bindValue(":product_id", $Pname->getProduct_Id());
        $statement->bindValue(":product_name", $Pname->getProduct_Name());
        $statement->bindValue(":product_description", $Pname->getProduct_Decription());
        $statement->bindValue(":category_id", $Pname->getCategory_Id());
        $statement->bindValue(":buying_price", $Pname->getBuying_Price());
//        $statement->bindValue(":image", $Pname->getImage());

        $success = $statement->execute();
                
        $statement->closeCursor();
        
        if($success)
        {
            return 1;

        }
        else
        {
            return 0;
        }      
    }
}