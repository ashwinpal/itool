<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/AdminFaqController.php';

    LayoutClass::includeHeader();
?>  

<?php
if($_SESSION['role']==2||$_SESSION['role']=="2")
        {LayoutClass::includeAdminNav();}
        elseif($_SESSION['role']==1||$_SESSION['role']=="1")
            {
        LayoutClass::includeHomeNav();
        }
?>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
 
       $(document).ready(function(){
       $(".ans").hide();
     
       $(".que").click(function(){
       $(".ans").hide();
       $(this).find(".ans").toggle();       
    });  
        $(".que").mouseover(function(){
        $(this).css("background", "#82CAFF");
    });
    $(".ans").mouseover(function(){
        $(this).css("background", "#B6B6B4");
    });
    
        $(".que").mouseout(function(){
        $(this).css("background", "white");
         });
    
});
</script>
    </head>
    <body>
        <h1>FREQUENTLY ASKED QUESTIONS</h1>
        <hr/>
        
<?php
      $modelAction = new faqFunctionality();
      $view =$modelAction->DisplayPublic();
//echo "<ol>";
        foreach ($view as $q => $a)
        { ?>
        <div class="que"><b> <?php   echo $a['questions'] ;?> </b>
            <div class="ans">  <?php   echo $a['answers'] ;?> </div></div><br/>
            <?php
        }
?> 
 
    </body>
</html>


<?php
    LayoutClass::includeFooter();

