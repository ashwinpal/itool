<?php

include $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

class invoices
{
private $userId;
private $invoiceDate;
private $invoiceNumber;
private $productId;
private $quantity;
private $sellingPrice;

    public function getuserId()
    {
        return $this->userId;
    }
    public function setuserId($value) 
    {
        $this->userId = $value;
    }
    public function getinvoiceDate()
    {
        return $this->invoiceDate;
    }
    public function setinvoiceDate($value) 
    {
        $this->invoiceDate = $value;
    }
    public function getinvoiceNum()
    {
        return $this->invoiceNumber;
    }
    public function setinvoiceNum($value) 
    {
        $this->invoiceNumber = $value;
    }
    public function getproductId()
    {
        return $this->productId;
    }
    public function setproductId($value) 
    {
        $this->productId = $value;
    }
    public function getQuanitity()
    {
        return $this->quantity;
    }
    public function setQuantity($value) 
    {
        $this->quantity = $value;
    }
    public function getsellingPrice()
    {
        return $this->sellingPrice;
    }
    public function setsellingPrice($value) 
    {
        $this->sellingPrice = $value;
    }
}


class invoicesFunctionality
    {
    
    public $dbcon;
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
    public function insertValues($model)
    {
        $sql = "insert into product_invoice(product_id, quantity, invoice_date, selling_price, user_id)"
                ."values(:product_id, :quantity,:invoice_date, :selling_price, :user_id)";
        
        $statement = $this->dbcon->prepare($sql);
        
        $statement->bindValue(':product_id', $model->getproductId());
        $statement->bindValue(':quantity', $model->getQuanitity());
        $statement->bindValue(':invoice_date', $model->getinvoiceDate());
        $statement->bindValue(':selling_price', $model->getsellingPrice());
        $statement->bindValue(':user_id', $model->getuserId());

        
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
    
    public function DeleteValues($model){
        
        $sql="Delete from product_invoices where product_id = :product_id ";
        
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':product_id', $model->getproductId());
        
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
    
    public function UpdateValues($value){
        
        $sql="Update product_invoices set quantity = 1 where product_id = :prodct_id";
        
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':product_id', "20");
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

// public function deleteValues($model)
//    {
// 
//        $sql="Delete product_invoice where productId = :productId";
//        
//        $statement = $this->dbcon->prepare($sql);
//
//        $statement->bindValue(':productId', $model->getproductId());
//        
//        $success = $statement->execute();
//
//        $statement->closeCursor();
//
//        if($success)
//        {
//            return 1;
//
//        }
//        else
//        {
//            return 0;
//        }        
//    }
    
    }
