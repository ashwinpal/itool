<?php

include $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AddCategory{
    private $category_id;
    private $category_name;
    
    public function getCategory_Id(){
        return $this->category_id;
    }
    
    public function setCategory_Id($value){
        $this->category_id=$value;
    }
    
    public function getCategory_Name(){
        return $this->category_name;
    }
    
    public function setCategory_Name($value){
        $this->category_name=$value;
    }
}

class CategoryFunctionality{
    
    public $dbcon;
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
    public function InsertCategory($model){
        
        $query="insert into category (category_name) "
                . "values (:category_name)";
        
        $statement = $this->dbcon->prepare($query);

        $statement->bindValue(':category_name', $model->getCategory_Name());
        
        
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
    
    public function DisplayCategory(){
        
        $query="select category_id, category_name from category";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table border="1"> <th>Id</th><th>Name</th>';
         foreach ($statement as $q){
                
                echo '<tr>';
                echo '<td>'. $q['category_id'].'</td><td>'. $q['category_name'].'</td>';
                echo '</tr>';                
            }
            echo '</table>';
    }
}