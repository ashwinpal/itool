<?php

include $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/DBAccessClass.php';

class FAQ
{
private $id;
private $questions;
private $answers;

public function getId()
    {
        return $this->id;
    }
    public function setId($value) 
    {
        $this->id = $value;
    }
public function getQuestions()
    {
        return $this->questions;
    }
    public function setQuestions($value) 
    {
        $this->questions = $value;
    }    
public function getAnswers()
    {
        return $this->answers;
    }
    public function setAnswers($value) 
    {
        $this->answers = $value;
    }   
}

class faqFunctionality
    {
    
    public $dbcon;
    
    public function __construct() {
        
        $obj = new AccessDB();
        $this->dbcon = $obj->dbConnect();
    }
    
 public function InsertValues($model)
    {
        $sql = "insert into faq_table(questions, answers)"
                ."values(:questions, :answers)";
        
        $statement = $this->dbcon->prepare($sql);
        
        var_dump($model);
        
        $statement->bindValue(':questions', $model->getQuestions());
        $statement->bindValue(':answers', $model->getAnswers());
        
        $success = $statement->execute();
        
        var_dump($success);
        
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
    
    public function DisplayFaq(){
        
        $query="select id, questions, answers from faq_table";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table border="1"><th>Questions</th><th>Answers</th><th>Update</th><th>Delete</th>';
         foreach ($statement as $q){
            
                echo '<tr>';
                echo '<td>'. $q['questions'].'</td><td>'. $q['answers'].'</td>'
                   . '<td><a href=update.php?id='.$q['id'].'>Update</a></td>'
                       . '<td><a href=delete.php?id='.$q['id'].'>Delete</a></td>';
                echo '</tr>';                
            }
            echo '</table>';
    }
    
    
      public function DisplayPublic(){
        
        $query="select id, questions, answers from faq_table";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
         
        return $statement;
        
    }
    
      
       public function DeleteValues($id){
        
        $sql="Delete from faq_table where id = :id ";
        
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
    
     public function UpdateValues($id, $q, $a){
        
       $sql="Update faq_table set questions = :questions, answers = :answers where id = :id";
        
       
        $statement = $this->dbcon->prepare($sql);

        $statement->bindValue(':id', $id);
        $statement->bindValue(':questions', $q);
        $statement->bindValue(':answers', $a);    
        
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
    
    public function DisplayById($id){
        $sql="select * from faq_table where id = :id";
        
        $statement = $this->dbcon->prepare($sql);
        
        $statement->bindValue(':id', $id);

        $success = $statement->execute();
        
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        
        return $row;        
    }
    
    }