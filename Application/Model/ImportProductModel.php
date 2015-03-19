<?php

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

?>

