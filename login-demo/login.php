<?php
//session_start();

/* including the next line will automaticly call CAS and return if the Authetication works */
require_once('./inc/CAS/1.3.5/casAuth.php');

if (isset($_SESSION['phpCAS']['user'])){
  //echo $_SESSION['phpCAS']['user'];
  header('location: home.php');
}

?>
