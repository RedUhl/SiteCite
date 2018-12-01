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


function InsertCourses($cID, $iID, $ccode, $cname)
{
	require_once 'login.php';
	$connection = new mysqli($hn, $un, $pw, $db);

	$query = "INSERT INTO Courses(courseID, instructorID, coursecode, coursename)" 
	. "VALUES('$cID','$iID','$ccdode','$cname');
	
	$result = $connection->query($query);
	if(!$result) die($connection->error);
}

function getCoursecode($cID)
{
	$query="SELECT coursecode FROM Courses WHERE courseID='$cID'";
	$result=executeQuery($query);
	return $result;
}

function getAssignmentnumber($cID)
{
	$query="SELECT assignment FROM Courses WHERE courseID='$cID'";
	$result=executeQuery($query);
	return $result;
}

function setAssignmentnumber($cID, $assignnum)
{
	$query= "UPDATE Courses SET assignment = '$assignnum' WHERE product_id = '$cID'";
	$result=executeQuery($query);
}

function deleteCourse($cID)
{
	$query="DELETE FROM Courses WHERE courseID = '$cID'";
	$result=executeQuery($query);
}

?>