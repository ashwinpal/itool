<?php

session_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/RatingModel.php';



if(isset($_GET["rate"])){
    
                $obj = new AccessDB();
                $dbcon = $obj->dbConnect();
    
            $sql="select * from rating_system where product_id=:product_id and user_id=:user_id LIMIT 1";

            $statement = $dbcon->prepare($sql);
            
            $statement->bindValue(':product_id', $_GET["pid"]);
            $statement->bindValue(':user_id', $_SESSION["uid"]);

            $statement->execute();
        
            $statement->fetch(PDO::FETCH_ASSOC);
        
            $count=$statement->rowCount();

            if($count > 0){

                echo 'Sorry you have rated this product already';
               
            }
            else {
                
                $sql1="Insert into rating_system(product_id,user_id,rating) values(:pid,:uid,:rate)";
        
                $statement1 = $dbcon->prepare($sql1);
                
                $statement1->bindValue(':pid', $_GET["pid"]);
                $statement1->bindValue(':uid', $_SESSION["uid"]);
                $statement1->bindValue(':rate',$_GET["rate"]);
                
                
                $success = $statement1->execute();

                //$row_count=$statement->rowCount();
                $statement->closeCursor();

                if($success)
                {
                    echo 'Thanks for rating the product '.$_GET["pid"];

                }
                else
                {
                    echo 'Error in rating the product';
                }
 
                
            }
    }
    
    else
    {
        echo "Sorry! You need to select a value to RATE IT!";
    }

