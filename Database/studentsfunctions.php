<?php
function executeQuery($query)
{
    $returnValue = array();

    require 'login.php';
    $conn = new mysqli($hn, $un, $pw, $db);
    if ($conn->connect_error)
        die($conn->connect_error);  // Need better error handling

    $result = $conn->query($query);
    if (!$result) {
        $conn->close();
        die($conn->error);  // Need better error handling
    }
        
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $returnValue[] = $row;
    }
        
    $result->close();
    $conn->close();
        
    return $returnValue;
}


function redirect($loc) {
	header("Location: {$loc}");
}
//checks if logged in on each page
function logged_in(){
	//if session set, return true
	if (isset($_SESSION['username'])) {
		return true;
	} else {
		//if no session, check for cookie
		if (isset($_COOKIE['username'])) {
			$_SESSION['username'] = $_COOKIE['username'];
			return true;
		} else {
			return false;
		}
	} 
}

function count_field_val($pdo, $tbl, $fld, $val) {
	try {
		 $sql="SELECT {$fld} FROM {$tbl} WHERE {$fld}=:value";
		 $stmnt=$pdo->prepare($sql);
		 $stmnt->execute([':value'=>$val]);
		 return $stmnt->rowCount();
	} catch(PDOException $e) {
		 return $e->getMessage();
	}
}

function return_field_data($pdo, $tbl, $fld, $val) {
	try {
		 $sql="SELECT * FROM {$tbl} WHERE {$fld}=:value";
		 $stmnt=$pdo->prepare($sql);
		 $stmnt->execute([':value'=>$val]);
		 return $stmnt->fetch();
	} catch(PDOException $e) {
		 return $e->getMessage();
	}
}

function set_msg($msg, $level='danger') {
	if (($level!='primary') && ($level!='success') && ($level!='info') && ($level!='warning')) {
		$level='danger';
	}
	if (empty($msg)) {
		unset($_SESSION['message']);
	} else {
		$_SESSION['message']="<h4 class='bg-{$level} text-center'>{$msg}</h4>";
	}
}

function InsertCourses($sID, $name, $cID, $ccitations, $cscore, $oscore, $pscore, $fscore)
{
	require_once 'login.php';
	$connection = new mysqli($hn, $un, $pw, $db);

	$query = "INSERT INTO Students(studentID,name,courseID,completedcitations,capitalizationscore,orderingscore,punctuationscore,formatingscore), VALUES('$sID','$name','$cID','$ccitations','$cscore','$oscore','$pscore','$fscore')";
	$result = $connection->query($query);
	if(!$result) die($connection->error);
}

function getStudentscore($sID)
{
	$query="SELECT capitalizationscore,orderingscore,punctuationscore,formatingscore FROM Students WHERE studentID='$sID'";
	$result=executeQuery($query);
	return $result;

}

function getStudentname($sID)
{
	$query="SELECT name FROM Students WHERE studentID='$sID'";
	$result=executeQuery($query);
	return $result;

}

function setAssignmentnumber($sID, $assignnum)
{
	$query= "UPDATE Student SET completedcitations = '$assignnum' WHERE product_id = '$sID'";
	$result=executeQuery($query);
}

function setStudentscore($sID, $score, $scorenum)
{
	$query= "UPDATE Student SET '$score' = '$scorenum' WHERE product_id = '$sID'";
	$result=executeQuery($query);
}

function incrementAssignmentnumber($sID)
{
	$query="SELECT completedcitations FROM Students WHERE studentID='$sID'";
	$result=executeQuery($query);
	$assignmentnumber=result[0];
	$assignmentnumber=assignmentnumber+1;
	$query= "UPDATE Student SET completedcitations = '$assignmentnumber' WHERE product_id = '$sID'";
	$result=excuteQuery($query);
	return $result;
}

function deleteStudent($sID)
{
	$query="DELETE FROM Students WHERE studentID = '$sID'";
	$result=executeQuery($query);
}

function getStudentclass($sID)
{
	$query="SELECT courseID FROM Students WHERE studentID='$sID'";
	$result=executeQuery($query);
	return $result;
}

function getClassscores($cID)
{
	$query="SELECT capitalizationscore,orderingscore,punctuationscore,formatingscore FROM Students WHERE courseID='$cID'";
	$result=executeQuery($query);
	return $result;
}

function getAuthToken($sID)
{
	$query="SELECT token FROM Students WHERE studentID='$sID'";
	$result=executeQuery($query);
	return $result;

}

?>