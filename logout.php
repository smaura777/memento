<?php
ob_start();
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/settings/dev.inc.php";
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/utilities.php";
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/inputManager.php";
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/PasswordHash.php";
require_once  "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/autoLoad.php";

session_start_wrap();

/**
 * Logout
 *
 *
 */  
 
 
 logout();
 header("location: http://localhost:8888/memento/");
   
ob_end_flush();

?>