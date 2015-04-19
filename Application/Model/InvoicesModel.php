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
    public function getinvoiceNumber()
    {
        return $this->invoiceNumber;
    }
    public function setinvoiceNumber($value) 
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
    
    public function DisplayInvoices(){
        
        $query="select invoice_number, product_id, quantity, invoice_date, selling_price, user_id from product_invoice";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table border="1"> <th>Product Id</th><th>Quantity</th><th>Invoice Date</th><th>Selling Price</th><th>User Id</th><th>Detail</th><th>Update</th><th>Delete</th>';
         foreach ($statement as $q){
                
                echo '<tr>';
                echo '<td>'. $q['product_id'].'</td><td>'. $q['quantity'].'</td><td>'. $q['invoice_date'].'</td><td>'. $q['selling_price'].'</td><td>'. $q['user_id'].'</td>'
                        . '<td><a href=detail.php?id='.$q['invoice_number'].'>View</a></td>'
                        .'<td><a href=updateInvoices.php?id='.$q['invoice_number'].'>Update</a></td>'
                        . '<td><a href=deleteInvoices.php?id='.$q['invoice_number'].'>Delete</a></td>' ;
                echo '</tr>';                
            }
            echo '</table>';
    }
 
    public function DetailInvoices(){
          $query="select invoice_number, product_id, quantity, invoice_date, selling_price, user_id from product_invoice";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table border="1"> <th>Product Id</th><th>Quantity</th><th>Invoice Date</th><th>Selling Price</th><th>User Id</th>';
         foreach ($statement as $q){
                
                echo '<tr>';
                echo '<td>'. $q['product_id'].'</td><td>'. $q['quantity'].'</td><td>'. $q['invoice_date'].'</td><td>'. $q['selling_price'].'</td><td>'. $q['user_id'].'</td>' ;
                echo '</tr>';                
            }
            echo '</table>';
    }
    
    public function DisplayById($id){
        $sql="select * from product_invoice where invoice_number = :id";
        
        $statement = $this->dbcon->prepare($sql);
        
        $statement->bindValue(':id', $id);

        $success = $statement->execute();
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $row;
        
        }


    public function DeleteValues($id){
        
        $sql="Delete from product_invoice where invoice_number = :id ";
        
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':id', $id);
        
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
    
    public function UpdateValues($in,$pr,$qn,$idt,$sp){
        
       $sql="Update product_invoice set product_id = :product_id, quantity = :quantity, invoice_date = :invoice_date, selling_price = :selling_price where invoice_number = :invoice_number";
        
       
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':invoice_number', $in);
        $statement->bindValue(':product_id', $pr);
        $statement->bindValue(':quantity', $qn);
        $statement->bindValue(':invoice_date', $idt);
        $statement->bindValue(':selling_price', $sp);
        
        
        $success = $statement->execute();

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
    
    }
