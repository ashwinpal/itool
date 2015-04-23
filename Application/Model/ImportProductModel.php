<?php
include_once  $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

class importProduct
{
    private $batchNumber;
    private $delivered;
    private $expiryDate;
    private $orderNumber;
    private $productId;
    private $quantity;
    private $receivedDate;
    private $userId;
    
    public function getbatchNumber()
    {
        return $this->batchNumber;
    }
    public function setbatchNumber($value)
    {
        $this->batchNumber = $value;
    }
    public function getDelivered()
    {
        return $this->delivered;
    }
    public function getexpiryDate()
    {
        return $this->expiryDate;
    }
    public function setexpiryDate($value)
    {
        $this->expiryDate = $value;
    }
    public function getorderNumber()
    {
        return $this->orderNumber;
    }
    public  function setorderNumber($value)
    {
        $this->orderNumber = $value;
    }
    public  function getproductId()
    {
        return $this->productId;
    }
    public function setproductId($value)
    {
        $this->productId = $value;
    }
    public function getRecQuantity()
    {
        return $this->quantity;
    }
    public function setRecQuantity($value)
    {
        $this->quantity = $value;
    }
    public function getQuantity()
    {
        return $this->quantity;
    }
    public function setQuantity($value)
    {
        $this->quantity = $value;
    }
    public function getreceivedDate()
    {
        return $this->receivedDate;
    }
    public function setreceivedDate($value)
    {
        $this->receivedDate = $value;
    }
    public function getuserId()
    {
        return $this->userId;
    }
    public  function setuserId($value)
    {
        $this->userId = $value;
    }
}
class ImportFunctionality{
    
    public $dbcon;
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
     public function  DeleteOrder($id){
        
        $sql="Delete from import_product where order_number = :id ";
        
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

    public function InsertOrder($model)
                {
        
       $sql = "insert into import_product (product_id,quantity) values (:prod_id,:qty)";
        
        $statement = $this->dbcon->prepare($sql);
        
        //var_dump($model);
        
        $statement->bindValue(':prod_id', $model->getproductId());
        $statement->bindValue(':qty', $model->getQuantity());
        
        $success = $statement->execute();
        
       // var_dump($success);
        
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
    public function DisplayOrderList()
    {
        $query="select order_number from import_product";
        $statement = $this->dbcon->query($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return($statement);
    }
          

          public function DisplayTrack()
    {
        $query="select order_number, product_name,quantity,recieved_date from import_product as ip LEFT JOIN product_list as pl ON ip.product_id=pl.product_id ";
        $statement = $this->dbcon->query($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return($statement);
    }
    
     public function DisplayOrderTrack($cid)
    {
         $query="select order_number, product_name,quantity,recieved_date from import_product as ip LEFT JOIN product_list as pl ON ip.product_id=pl.product_id where ip.order_number=".$cid;
        $statement = $this->dbcon->query($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        //var_dump($statement);
         return($statement);
    }
    public function DisplayProd($cid)
    {
        $query="select product_name from product_list where category_id=".$cid;
        $statement = $this->dbcon->query($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        return($statement);
    }
    
    public function DisplayPublic(){
        

        $query="select order_number, product_name,category_id,quantity from import_product as ip LEFT JOIN product_list as pl ON ip.product_id=pl.product_id";
        $statement = $this->dbcon->query($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
            
          echo '<table class="table table-striped"> <th>Order Number</th><th>Category ID</th><th>Product Name</th><th>Quantity</th>';
              foreach($statement as $q)
                {
                  if($q['quantity']!=0)
                  {
                echo '<tr>';
                echo '<td>'. $q['order_number'].'</td><td>'. $q['category_id'].'</td><td>'.$q['product_name'].'</td><td>'. $q['quantity'].'</td>'
                        ;
                echo '</tr>';   
                        
                  }
             
            }
            echo '</table>';
    }
    

    public function DisplayOrders(){
        

        $query="select order_number, product_name,category_id,quantity from import_product as ip LEFT JOIN product_list as pl ON ip.product_id=pl.product_id";
        $statement = $this->dbcon->query($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
            
          echo '<table class="table table-striped"> <th>Order Number</th><th>Category ID</th><th>Product Name</th><th>Quantity</th><th>Action</th>';
              foreach($statement as $q)
                {
                  if($q['quantity']!=0)
                  {
                echo '<tr>';
                echo '<td>'. $q['order_number'].'</td><td>'. $q['category_id'].'</td><td>'.$q['product_name'].'</td><td>'. $q['quantity'].'</td>'
                        . '<td><a href=recieved_orders.php?id='.$q['order_number'].'&qty='.$q['quantity'].'>Received</a> &nbsp;/<a href=confirm.php?id='.$q['order_number'].'>Cancel Order</a></td>';
                echo '</tr>';   
                        
                  }
             
            }
            echo '</table>';
    }
    
    public function recieved_orders($Cname){
     
        $query =("update import_product set quantity=:quantity,recieved_qty=:recquantity, recieved_date=:recieved_date,expiry_date=:expiry_date "."where order_number=:order_number");
        
        $statement = $this->dbcon->prepare($query);     
        //var_dump($Cname);
        $statement->bindValue(":order_number", $Cname->getorderNumber());
        $statement->bindValue(":recquantity", $Cname->getRecQuantity());
        $statement->bindValue(":quantity", $Cname->getQuantity());
        //$statement->bindValue(":quantity");
        $statement->bindValue(":recieved_date", $Cname->getreceivedDate());
        $statement->bindValue(":expiry_date", $Cname->getexpiryDate());


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

?>

