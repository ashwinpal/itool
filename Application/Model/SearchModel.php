<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/ReportModel.php';

class search{
    
    private $id;
    private $keyword;
    private $count;

    public function getId()
    {
        return $this->id;
    }
    public function setId($value)
    {
         $this->id = $value;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }
    public function setKeyword($value)
    {
        $this->keyword = $value;
    }

    public function getCount()
    {
        return $this->count;
    }
    public function setCount($value)
    {
        $this->count = $value;
    }

}



class SearchFunctionality{
    
    
    public $dbcon;
    
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }


    public function InsertKeyword($model){
        
        $sql="Insert into search(keyword, count)"
                . " values(:keyword,:count)";
        
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':keyword', $model->getKeyword());
        $statement->bindValue(':count', $model->getCount());        
        $success = $statement->execute();

        //$row_count=$statement->rowCount();
        $statement->closeCursor();

        //$jobID = $this->dbcon->lastInsertId();

        if($success)
        {
            return 1;

        }
        else
        {
            return 0;
        }        
    }

    
    public function DeleteKeyword($model){
        
        $sql="Delete from search where keyword = :keyword";
        
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':keyword', $model->getKeyword());
        
        $success = $statement->execute();

        //$row_count=$statement->rowCount();
        $statement->closeCursor();

        //$jobID = $this->dbcon->lastInsertId();

        if($success)
        {
            return 1;

        }
        else
        {
            return 0;
        }        
    }
    
    public function UpdateKeyword($word){
        
        $sql="Update search set count = 1 where keyword = :keyword";
        
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':keyword', "qwe");
       // $statement->bindValue(':count', ($model->getCount()+1));
        
        $success = $statement->execute();

        //$row_count=$statement->rowCount();
        $statement->closeCursor();

        //$jobID = $this->dbcon->lastInsertId();

        if($success)
        {
            return 1;

        }
        else
        {
            return 0;
        }        
    }
    
    public function GetProductId($word){
        
        $sql="select product_id from product_list where product_name = :word";
        
        $statement = $this->dbcon->prepare($sql);
        
        $statement->bindValue(':word', $word);

        $statement->execute();
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        if($row){
            
            return $row['product_id'];
        }
        else{
            return null;
        }
        //var_dump($row);
        
    }
    
    public function SearchImportProd($id){
        
      //  $searchList = array();
        
        $sql="select * from import_product where product_id = :id order by order_number desc LIMIT 1";
        
        $statement = $this->dbcon->prepare($sql);
        
        $statement->bindValue(':id', $id);

        $statement->execute();
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $row['order_number'];

        
    }
    
    public function SearchInvoicesProd($id){
        
      //  $searchList = array();
        
        $sql="select * from product_invoice where product_id = :id order by invoice_number desc LIMIT 1";
        
        $statement = $this->dbcon->prepare($sql);
        
        $statement->bindValue(':id', $id);

        $statement->execute();
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $row['invoice_number'];

        
    }
    
    
            
}
    
    
