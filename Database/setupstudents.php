<?php //setupstudents.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
	function setupstudents()
	{
		$query = "CREATE TABLE Students (
		studentID INTERGER NOT NULL UNIQUE,
		name VARCHAR(100) NOT NULL,
		courseID MEDIUMINT NOT NULL,
		completedcitations MEDIUMINT NOT NULL,
		capitalizationscore SMALLINT NOT NULL,
		orderingscore SMALLINT NOT NULL,
		punctuationscore SMALLINT NOT NULL,
		formatingscore SMALLINT NOT NULL
		)";

		$result = $conn->query($query);
		if (!$result) {
		$conn->close();
		die($conn->error);  // Need better error handling
		}

	}

?>
