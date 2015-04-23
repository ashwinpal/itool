<?php

//session_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Model/RatingModel.php';

    LayoutClass::includeHeader(); 
GeneralClass::checkUser($_SESSION['role']);
   LayoutClass::includeAdminNav();
?>

<?php
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

                echo '<label style="color:red; padding:20px;"> Sorry you have rated this product already </label>';
               
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
                    echo '<label style="color:green; padding:20px;">Thanks for rating the product '.$_GET["pid"].'</label>';

                }
                else
                {
                    echo '<label style="color:yellow; padding:20px;">Error in rating the product</label>';
                }               
            }
    }
    
    else
    {
        echo '<label style="color:orange; padding:20px;">Sorry! You need to select a value to RATE IT!</label>';
    }

?>
</div>
<?php
    LayoutClass::includeFooter();
   