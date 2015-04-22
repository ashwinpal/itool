<?php

include $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

class Report
{
private $report_id;
private $product_id;

public function getReportId()
    {
        return $this->report_id;
    }
    public function setReportId($value) 
    {
        $this->report_id = $value;
    }
public function getProductId()
    {
        return $this->product_id;
    }
    public function setProductId($value) 
    {
        $this->product_id = $value;
    }    
}


class reportFunctionality
    {
    
    public $dbcon;
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
    public function DisplayReport(){
        
        $query="select report_id,product_id from report";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table border="1"><th>Product Id</th><th>View<th>Delete</th>';
         foreach ($statement as $q){
            
                echo '<tr>';
                echo '<td>'. $q['product_id'].'</td>'
                        .'<td><a href=view.php?id='.$q['id'].'>View</a></td>'
//                        . '<td><a href=update.php?id='.$q['id'].'>Update</a></td>'
                        . '<td><a href=delete.php?id='.$q['id'].'>Delete</a></td>';
                echo '</tr>';                
            }
            echo '</table>';
        }
    
    public function getReport()
    {
    
      // $q = intval($_GET['q']);
        
        $query="SELECT * FROM product_list WHERE id = product_id";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
        return $statement;
    }
    
}

    
 