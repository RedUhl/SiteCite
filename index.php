<?php
include_once('./inc/CAS/1.3.5/casAuth.php');

echo "<pre>";
print_r($_SESSION);
echo "</pre>";


echo "Hello</br>";
if(!isset($_SESSION['phpCAS']['user'])) echo "CAS not Set!";
echo "NetId:".$_SESSION['phpCAS']['user']."</br>";
?>
