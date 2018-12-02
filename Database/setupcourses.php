<?php //setupcourses.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
	function setupcourses()
	{
		$query = "CREATE TABLE Courses (
		courseID INTEGER NOT NULL AUTO_INCREMENT,
		instructorID VARCHAR(7) NOT NULL,
		coursecode VARCHAR(25) NOT NULL UNIQUE,
		coursename VARCHAR(100) NOT NULL,
		assignment SMALLINT
		)";

		$result = $conn->query($query);
		if (!$result) {
		$conn->close();
		die($conn->error);  // Need better error handling
		}

	}

?>
