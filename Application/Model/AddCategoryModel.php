<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

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
    
    public function InsertCategory($newCatg){
        
        $query="insert into category (category_name) "
                . "values (:category_name)";
        
        $statement = $this->dbcon->prepare($query);

        $statement->bindValue(':category_name', $newCatg->getCategory_Name());
               
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
    
    public function DisplayCat()
    {
      $query="select category_id, category_name from category";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return($statement);
          
    }

    public function DisplayCategory(){
        
        $query="select category_id, category_name from category";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table border="1"> <th>Id</th><th>Name</th><th>Update</th><th>Delete</th>';
         foreach ($statement as $q){
            
                echo '<tr>';
                echo '<td>'. $q['category_id'].'</td><td>'. $q['category_name'].'</td>'
                        . '<td><a href=update.php?id='.$q['category_id'].'>Update</a></td>'
                        . '<td><a href=delete.php?id='.$q['category_id'].'>Delete</a></td>';
                echo '</tr>';                
            }
            echo '</table>';
    }
    
    public function DeleteCategory($id){
        
        $query="Delete from category where category_id = :category_id";
        
        
        
        $statement = $this->dbcon->prepare($query);

        $statement->bindValue(':category_id', $id);
                       
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

        public function UpdateCategory($Cname){
     
        $query =("update category set category_name=:category_name "."where category_id=:category_id");
        
        $statement = $this->dbcon->prepare($query);     
        
        $statement->bindValue(":category_id", $Cname->getCategory_Id());
        $statement->bindValue(":category_name", $Cname->getCategory_Name());

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