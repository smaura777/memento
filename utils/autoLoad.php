<?php

function __autoload($clas_name){
  require_once   "".$_SERVER['DOCUMENT_ROOT']."/memento/classes/". $clas_name . ".php";
}



?>