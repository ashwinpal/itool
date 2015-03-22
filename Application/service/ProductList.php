<?php

include $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

class Service{

	public function display()
	    {
	        
	        $obj = new AccessDB();

                $con = $obj->dbConnect();

                $sql="select product_name from product_list";

                $q = $con->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	        
                $list = array();
                
                foreach ($q as $val) {
                    
                    array_push($list,$val['product_name']);
                    
                }
                
                echo json_encode($list);
	    }
	    
}

$obj = new Service();

$obj->display();