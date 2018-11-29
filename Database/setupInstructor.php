<?php //setupInstructor.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
	function setupInstructor()
	{
		$query = "CREATE TABLE Instructors (
		instructorID INTERGER NOT NULL UNIQUE,
		instructorname varchar(100) NOT NULL
		)";
		
		$result = $conn->query($query);
		if (!$result) {
		$conn->close();
		die($conn->error);  // Need better error handling
		}

	}

?>
