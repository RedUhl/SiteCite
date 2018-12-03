<?php
 require 'login.php';
 $conn = new mysqli($hn, $un, $pw, $db);

 $citationID = $_POST('citationID');
 $attempt = $_POST('attempt');

try{

    $query="SELECT citation FROM Citations WHERE citation='$attempt'";
    $result=executeQuery($query);
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck == 0){
        echo 'incorrect'.$result;
    }
}else{
    echo 'correct'
}


?>