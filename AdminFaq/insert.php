<?php
ob_start();

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminFaqController.php';
    LayoutClass::includeHeader();
    
    GeneralClass::checkAdmin($_SESSION['role']);
    
?>   

        <?php
            LayoutClass::includeAdminNav();
        ?>
<!--//checking if submit button is clicked then form values are called from controller.
//insert method is called-->


<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Support FAQ</h1>
        </div>
        <hr/>    
        
        <?php
         if(onsubmitCheck('submit'))
           {
             
          if($_POST['Question']==""|| $_POST['Answer']=="")
        {
          echo "<strong>*All fields are required</strong>";
        }
    
        else{
            $controllerObject->formValues();
            $controllerObject->insert(); 
        } 
    }
?>
        <div id="add_product">
            <h3>Add Frequently Asked Questions</h3>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<!--                <label>Question:</label>  <input type="text" name="Question" id="Question" /><br/>
                <label>Answer:</label> <input type="text" name="Answer" id="Answer" /> <br/>-->
                
                <label>Question:</label> <textarea id="Question" name="Question"></textarea>
                 <br/>
                <label>Answer:</label> <textarea  name="Answer" id="Answer"></textarea> 
                 <br>
                 <input type="submit" name="submit" id="submit" value="Submit" />
            </form>
        </div>
        
        <a class="page-links" href="index.php"  ><< Back to List</a>
    </body>
</html>

 <?php
            
        
 
            if($_SERVER['QUERY_STRING'] !==""){
            
            echo '<div id = "result">';
            
            if($_SERVER['QUERY_STRING']==1)
            { echo "Values have been added."; }
            else
                if($_SERVER['QUERY_STRING']==0)
            { echo "Error in inserting values."; }
            
            }
            
            echo '<div>'
        ?>

<?php
    LayoutClass::includeFooter();


