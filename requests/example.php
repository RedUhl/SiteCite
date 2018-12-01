<?php
session_start();

$punctuations = array("'", ",", ".", "(", ")",":",";", "-", "/");
// Cap, Format, Order, Punc
$probability = array(.25, .25, .25, .25);
// [5] is checksum
$error_array = array(0, 0, 0, 0, 0);

function devOpenDb($hostname,$uid,$pwd,$database){
  $link = mysql_connect($hostname,$uid,$pwd);
  if($link && mysql_select_db($database)){
    //echo "Database Connected with Development Link ";
    return($link);
  } else {
    echo "No connection ";
    return(FALSE);
  }
}

$dblink = devOpenDb("localhost","wbf49","ab1234","wbf49");

function executeQuery($link,$sql){
  $result = mysql_query($sql,$link);
  if($result == false) echo "<br /><br />Error:".mysql_error()."<br /> , Line:".__LINE__."<br /> $sql <br />";
  while($row = mysql_fetch_assoc($result)){
    $keys=array_keys($row);
    foreach($keys as $key){
      echo $row[$key];
    }
  }
}

if (isset($_POST['return']) && $_POST['return'] == "return") {
  $random_cite = rand(0,15);
  $sql = " SELECT citation FROM Citations WHERE citationID=".$random_cite;
  executeQuery($dblink, $sql);
}

if (isset($_POST['debug']) && $_POST['debug'] == "debug") {
  $debuginfo = devOpenDb("localhost","wbf49","ab1234","wbf49");
  echo $debuginfo;
}

?>