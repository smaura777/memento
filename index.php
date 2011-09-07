<?php
ob_start();
?>
<!DOCTYPE html>
<head>
  <title>Memento</title>
</head>
<body>

<?php
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/settings/dev.inc.php";
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/utilities.php";
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/inputManager.php";
require_once "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/PasswordHash.php";
require_once  "".$_SERVER['DOCUMENT_ROOT']."/memento/utils/autoLoad.php";
session_start_wrap();



if (isset($_SESSION['isLoggedIn']) && ($_SESSION['isLoggedIn'] == TRUE) ){
  echo "<div><h3>Welcome</h3></div>";
   echo "<div><a href=\"logout.php\">logout</a></div>";  
   echo "<div>Session_id : ".session_id()."</div>"; 
}
else {
  include_once 'login.php';
  echo time()."</br>";
  echo $_SERVER['REMOTE_ADDR']."</br>";
   echo $_SERVER['SERVER_ADDR']."</br>";
    echo $_SERVER['SERVER_ADDR']."</br>";
     echo $_SERVER['HTTP_USER_AGENT']."</br>";
     echo $_SERVER['DOCUMENT_ROOT']."</br>";
     echo dirname(__FILE__)."</br>";
     echo "<div><a href=\"register.php\">Register</a></div>";   
       echo "<div>Session_id : ".session_id()."</div>"; 
}

?>

</body>
</html>

<?php
 ob_end_flush();
?>
