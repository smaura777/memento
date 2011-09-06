<?php
ob_start();
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/settings/dev.inc.php";
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/utilities.php";
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/inputManager.php";
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/PasswordHash.php";
require_once  "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/autoLoad.php";

session_start_wrap();

/**
 * LogMeIn
 *
 *
 */  
 $user_label ='username';
 $password_label = 'password';
 $fname_label = 'fname';
 $lname_label = 'lname';
 
 $r_val = processRegistrationRequest($user_label,$password_label,$fname_label,$lname_label);
 
 if ($r_val ==''){
   header("location: http://localhost:8888/memento/");
 }
 else {
   echo "<i>".$r_val."</i>";
 }
 
 /*********************************************************/
 
 
    
ob_end_flush();
?>