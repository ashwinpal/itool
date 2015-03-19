<?php

include $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

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
        
        $sql="Delete search where keyword = :keyword)";
        
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
//    function display()
//    {
//        $this->dbConnect();
//        
//        $sql="select firstname,lastname,email,qualification from jobapplicant";
//        
//         $q = $this->dbcon->query($sql);
//         $q->setFetchMode(PDO::FETCH_ASSOC);
//        
//         
//         echo'<table><tr><th>FirstName</th><th>LastName</th><th>Email</th><th>Qualification</th></tr>';
//         
//         foreach ($q as $r)
//         {
//             echo "<tr>";
//             echo "<td>".$r['firstname']."</td><td>".$r['lastname']."</td><td>".$r['email']."</td><td>".$r['qualification']."</td><td>";
//             echo '</tr>';
//             
//         }
//        
//         echo'</table>';
//    }
        
}
    
    
