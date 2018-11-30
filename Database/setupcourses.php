<?php //setupcourses.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
	function setupcourses()
	{
		$query = "CREATE TABLE Courses (
		courseID INTEGER NOT NULL UNIQUE,
		instructorID INTEGER NOT NULL,
		coursecode varchar(25) NOT NULL UNIQUE,
		coursename varchar(100) NOT NULL
		)";

		$result = $conn->query($query);
		if (!$result) {
		$conn->close();
		die($conn->error);  // Need better error handling
		}

	}

?>
