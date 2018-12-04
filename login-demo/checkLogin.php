<?php 
session_start();

require_once("authFunc.php");
ensureLoggedIn();

echo $_SESSION['phpCAS']['user'];

?>