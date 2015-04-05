
<?php

include 'Application/Class/GeneralClass.php';
$_SESSION["uid"] = "USR012";
GeneralClass::redirect('Application/Controller/HomeController.php?action=Index', false);

