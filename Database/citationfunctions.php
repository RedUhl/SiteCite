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


function InsertCitations($citation, $reportcount)
{
	require_once 'login.php';
	$connection = new mysqli($hn, $un, $pw, $db);

	$query = "INSERT INTO Citations(citation, reportcount)" 
	. "VALUES('$citation','$reportcount')";
	
	$result = $connection->query($query);
	if(!$result) die($connection->error);
}

function getCitation($cID)
{
	$query="SELECT citation FROM Citations WHERE citationID='$cID'";
	$result=executeQuery($query);
	return $result;
}

function getReportcount($cID)
{
	$query="SELECT reportcount FROM Citations WHERE citationID='$cID'";
	$result=executeQuery($query);
	return $result;
}

function setReportcount($cID,$reportnum)
{
	$query= "UPDATE Citations SET reportcount = '$reportnum' WHERE product_id = '$cID'";
	$result=executeQuery($query);

}

function deleteCitation($cID)
{
	$query="DELETE FROM Citations WHERE citationID = '$cID'";
	$result=executeQuery($query);

}

function countCitations()
{
	$returnValue = array();
        
    $query = "SELECT MAX(citationID) FROM Citations;";
    $result=executeQuery($query);
    return $result;
}

?>
