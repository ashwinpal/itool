<?php
ob_start();

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

    include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminFaqController.php';
   LayoutClass::includeHeader();
?>   

        <?php
            LayoutClass::includeHomeNav();
        ?>

<?php
    
    $id=0;

    if(isset($_GET['id'])){
        $id = $_GET['id'];   
    }
    
     $iobj = new faqFunctionality();
     
     $details = $iobj->DisplayById($id);
     
     
    if(isset($_POST['submit'])){
        
        //$controllerObject->update($in,$_POST['product_id'],$_POST['quantity'],$_POST['invoice_date'],$_POST['selling_price']);
        
        $model = new faqFunctionality();
        
        $result = $model->UpdateValues($id,$_POST['questions'],$_POST['answers']);
        
        GeneralClass::redirect('/project/itool/AdminFaq/Index.php?r='.$result,false);
        
    }
?>

<html>
    <head></head>
    <body>
        <div id="product_heading">
             <h1>Frequently Asked Questions</h1>
        </div>
        <hr/>
        
<div id="update_faq">
            <h3>Update FAQs</h3>
            <form action="update.php?id=<?=$id?>" method="post">
                <label>Question:</label> <textarea type="text" name="questions" id="questions"><?=$details['questions']?></textarea> <br/>
                <label>Answer:</label> <textarea name="answers" id="answers"><?=$details['answers']?></textarea> <br/>
                <input type="submit" name="submit" value="Update" />
            </form>    
</div>
        </br>
        <a class="page-links" href="index.php"  ><< Back to List</a>
</body>
</html>


<?php
    LayoutClass::includeFooter();
