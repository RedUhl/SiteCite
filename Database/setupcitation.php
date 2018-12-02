<?php //setupcitation.php (with changes)
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once 'login.php';
  $connection = new mysqli($hn, $un, $pw, $db);
	function setupcitations()
	{
		$query = "CREATE TABLE Citations (
		citationID INTEGER NOT NULL AUTO_INCREMENT,
		citation varchar(500) NOT NULL,
		reportcount SHORTINT NOT NULL
		)";

		$result = $conn->query($query);
		if (!$result) {
		$conn->close();
		die($conn->error);  // Need better error handling
		}

	}

?>
