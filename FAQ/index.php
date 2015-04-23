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
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $(".click").click(function(){
    $(".expand").slideToggle();
  });
//$(document).ready(function(){
//$("ol ul").hide();
//     
//       $("ol").click(function(){
//        $(" ul li").hide();
//        $(this).find("ul li").toggle();
//        
        
//    });
////    
//    $("li").mouseover(function(){
//        $(this).css("background", "lightblue");
//    });
//    
//    $("li").mouseout(function(){
//        $(this).css("background", "white");
//    });
    
});
</script>
    </head>
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

