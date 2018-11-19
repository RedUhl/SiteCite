<?php
session_start();
/* Locking this down to my IP */
if("130.18.61.45" != $_SERVER['REMOTE_ADDR'])  header('location: https://apaciterite.cep.msstate.edu');
echo "Development Access " . $_SERVER['REMOTE_ADDR']. " </br>";

/* including the next line will automaticly call CAS and return if the Authetication works */
require_once('./inc/CAS/1.3.5/casAuth.php');
  echo "<pre>";
  print_r($_SESSION);
  echo "</pre>";


  echo "Hello</br>";
  if(!isset($_SESSION['phpCAS']['user'])) echo "CAS not Set!";
  echo "NetId:".$_SESSION['phpCAS']['user']."</br>";

  echo "</br></br></br>";
  /* Database Connection
   * https://www.w3schools.com/php/func_mysqli_connect.asp
   */
   /*** System Enviroment settings ***/
  include_once("../env/init.php");
  $dblink = mysqli_connect("localhost","user_rw",$mysqlAccessPW['user_rw'],"webdb");


  // Check connection
  if ($dblink->connect_error){
    echo "Failed to connect to MySQL: " . $dblink->connect_error;
  }else{
    echo "Good Database Connection</br>";
  }
  // prepare and bind
  $sql = " INSERT INTO cas_logins SET ";
  $sql.= " netId = ?, ";
  $sql.= " ipAddress = ?";

  $stmt = $dblink->prepare($sql);
  if(false == $stmt){
    echo "Bad SQL Statement: ".$sql."</br>" ;
    echo mysqli_stmt_error($stmt);
  }
  $stmt->bind_param("ss", $_SESSION['phpCAS']['user'], $_SERVER['REMOTE_ADDR']);
  $result=$stmt->execute();
  if(false == $result){
    echo "SQL Error: ".$sql."</br>" ;
    echo mysqli_stmt_error($stmt);
  }
  $stmt->close();

  echo "loaded";
?>
