<?php
 require 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db);

 $citationID = $_POST('citationID');
 $attempt = $_POST('attempt');

try{

    $query="SELECT citation FROM Citations WHERE citationID=citation";
    $result=executeQuery($query);
    
    if($result){
        echo 'something happens'.$result;
    }
}else{
    echo 'ERROR'
}


?>