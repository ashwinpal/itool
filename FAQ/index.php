<?php
    ob_start();

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/IncludeClass.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Class/ValidationLibrary.php';

include_once $_SERVER["DOCUMENT_ROOT"].'/project/itool/Application/Controller/ReprotController.php';

    LayoutClass::includeHeader();
?>  

<?php
   LayoutClass::includeHomeNav();
?>
<html>
    <body>
        <h1>FREQUENTLY ASKED QUESTIONS</h1>
        <hr/>
        
<?php
      $modelAction = new faqFunctionality();
      $view =$modelAction->DisplayPublic();
echo "<ol>";
        foreach ($view as $q => $a)
        { ?>
         <li> <?php   echo $a['questions'] ;?> </li>
             <ul> <li> <?php   echo $a['answers'] ;?> </li></ul>
            <?php
        }echo "</ol>";
?> 
 
    </body>
</html>


<?php
    LayoutClass::includeFooter();

