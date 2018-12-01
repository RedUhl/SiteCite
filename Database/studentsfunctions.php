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


function InsertCourses($sID, $name, $cID, $ccitations, $cscore, $oscore, $pscore, $fscore)
{
	require_once 'login.php';
	$connection = new mysqli($hn, $un, $pw, $db);

	$query = "INSERT INTO Courses(studentID,name,courseID,completedcitations,capitalizationscore,orderingscore,punctuationscore,formatingscore)" 
	. "VALUES('$sID','$name','$cID','$ccitations','$cscore','$oscore','$pscore','$fscore');
	
	$result = $connection->query($query);
	if(!$result) die($connection->error);
}

function getStudentscore($sID)
{

}

function getStudentname($sID)
{

}

function setAssignmentnumber($sID, $assignnum)
{

}

function setStudentscore($sID, $score, $scorenum)
{

}

function getAssignmentnumber($sID)
{

}

function deleteStudent($sID)
{

}

function getStudentclass($sID)
{

}

function getClassscores($cID)
{

}

?>