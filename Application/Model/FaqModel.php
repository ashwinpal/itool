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
        $sql = "insert into faq_table(id, questions, answers)"
                ."values(:id, :questions, :answers)";
        
        $statement = $this->dbcon->prepare($sql);
        
        $statement->bindValue(':id', $model->getId());
        $statement->bindValue(':questions', $model->getQuestions());
        $statement->bindValue(':answers', $model->getAnswers());
        
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
    
    public function DisplayFaq(){
        
        $query="select id, questions, answers from faq_table";
        
        $statement = $this->dbcon->query($query);
        
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        
         echo '<table border="1"> <th>Id</th><th>Questions</th><th>Answers</th><th>Update</th><th>Delete</th>';
         foreach ($statement as $q){
            
                echo '<tr>';
                echo '<td>'. $q['id'].'</td><td>'. $q['questions'].'</td><td>'. $q['answers'].'</td>'
                   . '<td><a href=update.php?id='.$q['id'].'>Update</a></td>'
                       . '<td><a href=delete.php?id='.$q['id'].'>Delete</a></td>';
                echo '</tr>';                
            }
            echo '</table>';
    }
    
    }