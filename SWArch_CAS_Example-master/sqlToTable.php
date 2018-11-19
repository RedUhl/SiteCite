<?php
session_start();
/* Locking this down to my IP */
//if("130.18.61.45" != $_SERVER['REMOTE_ADDR'])  header('location: https://apaciterite.cep.msstate.edu');
//echo "Development Access " . $_SERVER['REMOTE_ADDR']. " </br>";

/* including the next line will automaticly call CAS and return if the Authetication works */
require_once('./inc/CAS/1.3.5/casAuth.php');
// This holds the passwords stored outside of the out of the repo.
include_once("../env/init.php");


function devOpenDb($hostname,$uid,$pwd,$database){
  $link = mysql_connect($hostname,$uid,$pwd);
  if($link && mysql_select_db($database)){
    echo "Database Connected with Development Link</br>";
    return($link);
  } else {
    echo "No connection</br>";
    return(FALSE);
  }
}

   /// sqlToTable
  /**
    * The sqlToTable function takes an sql statement and returns a table if approprate
    * @param dbLink $dbLink :: Database Link
    * @param string $sql :: $sql Statement
    * @param (optiona) string $dataType :: Data Type
    * @param (optiona) array of data :: Data array
    */

function devSqlToTable($link,$sql){
  $result = mysql_query($sql,$link);
  if($result == false) echo "<br /><br />Error:".mysql_error()."<br /> , Line:".__LINE__."<br /> $sql <br />";
  echo "<br />".$sql."<br />Result:".mysql_num_rows($result)." Rows</br>";
  $flagFirstPass=true;
     while($row = mysql_fetch_assoc($result)){
       $keys=array_keys($row);
          if($flagFirstPass){
               echo "<table border=\"2px\"><tr>";
               foreach($keys as $key){
                    echo "<td >";
                    //echo "<span style=\"height: 1000px; -webkit-transform: rotate(+90deg); -moz-transform: rotate(+90deg);\">";
                    echo $key."</td>";
               }
               echo "</tr>";
               $flagFirstPass=false;
          }
          echo "<tr>";
          foreach($keys as $key){
            echo "<td>".$row[$key]."</td>";
          }
          echo "</tr>";
     }
     echo "</table>";


  }

 //This is to open a basic DB Link  While not as secure as mysqli implimentations it provides a quick dev level connection.

  $dblink = devOpenDb("localhost","user_rw",$mysqlAccessPW['user_rw'],"webdb");
  // prepare and bind
  $sql = " SELECT * FROM cas_logins ";
  // This will print your sql statement to the screen so you can see what you actually are getting from the database.

  devSqlToTable($dblink, $sql);



?>
