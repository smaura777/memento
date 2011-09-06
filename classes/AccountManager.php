<?php



class AccountManager {
  private $_connection;
  public $lastErrorString = "No errors";
 
 function __construct(){
     $this->_connection = DatabaseConnection::Connect();
     if ($this->_connection->error){
       die("Connect error" . $this->_connection->error);
     }
     else {
      // echo "Connection established";
     }
  }
  
  function create($name,$pass,$fname=NULL,$lname=NULL){
    if ($this->userExist($name)){
      $this->lastErrorString = "Username taken already - pick another one"; 
      return false;
    }

    $hasher = new PasswordHash(8, FALSE);
    $hash = $hasher->HashPassword($pass);
    if (($fname != null) && ($lname != null)){
       $this->_connection->query("INSERT INTO accounts (uid,user,pass,created_on,last_modified,status,fname,lname) values(UUID(),'".$name."','".$hash."',".time().",".time().",'active','".$fname."','".$lname."' )");
    }
    else {
      $this->_connection->query("INSERT INTO accounts (uid,user,pass,created_on,last_modified,status) values(UUID(),'".$name."','".$hash."',".time().",".time().",'active')");
    }
    
    if ($this->_connection->error){
      return false;
    }
    else {
      return true;
    }

  }
  
  
  function authenticate($name,$pass){
     $hasher = new PasswordHash(8, FALSE);
     $result = $this->_connection->query("SELECT uid,pass,user from accounts WHERE user = '".$name."' ");  
      
     if ($result == null){
       $this->lastErrorString = __CLASS__. " : ".__LINE__ . " : Invalid query " . $this->_connection->error . ''; 
       return null;
     }
     
     if ($result->num_rows <= 0){
       $this->lastErrorString = __CLASS__. " : ".__LINE__ . " : invalid Username or Password "; 
       return null;
     }
    
     $row = $result->fetch_object();
     if (!$hasher->CheckPassword($pass,$row->pass)){
       $this->lastErrorString = __CLASS__. " : ".__LINE__ . " : invalid Username or Password "; 
       return false;
     }
     
     $user_object = new User();
     $user_object->name = $row->user;
     $user_object->id = $row->uid;
     return $user_object;
  }
  
  function read($id){
   //return  account object 
  }
  
  function update($id,$update_array){
  
  }
  
  function delete(){
    // disable accounts
  }
  
  
  function userExist($name){
    $result = $this->_connection->query("SELECT * from accounts WHERE user ='".$name."'");
    if ($result != null){
      if ($result->num_rows > 0){
        return true;
      }
    }
    return false;
  }
  
}  

?>
