<?php

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

?>