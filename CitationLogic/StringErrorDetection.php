<?php

require_once 'StringFunctions.php';

// Converts errors to instructions or instructions to errors
function flipErrors($matrix)
{
	for ($i = 0; $i < sizeof($matrix); $i++)
	{
		if ($matrix[$i]['Type'] === "Del")
			$matrix[$i]['Type'] = "Ins";
		else if ($matrix[$i]['Type'] === "Ins")
			$matrix[$i]['Type'] = "Del";
	}
	return $matrix;
}


// Returns the matrix created by using the "min edit distance" DP algorithm on two given char arrays
function findEditDistanceMatrix($initial, $final)
{	
	$m = sizeof($initial);
	$n = sizeof($final);
	
	$matrix = array();
	for ($i = 0; $i <= $m; $i++)
		$matrix[$i] = array($i);
	for ($j = 0; $j <= $n; $j++)
		$matrix[0][$j] = $j;
	
	for ($j = 1; $j <= $n; $j++)
	{
		for ($i = 1; $i <= $m; $i++)
		{
			if ($initial[$i - 1] === $final[$j - 1])
				$matrix[$i][$j] = $matrix[$i - 1][$j - 1];
			else
				$matrix[$i][$j] = min(	$matrix[$i - 1][  $j  ] + 1,
										$matrix[  $i  ][$j - 1] + 1,
										$matrix[$i - 1][$j - 1] + 1);
		}
	}

	return $matrix;
}


/*
Returns a 2D array of errors that are in an "incorrect" string, with a given "correct" string
Error Types:
	Insertion:		When the "incorrect" string has an incorrect character inserted somewhere
	Deletion:		When the "incorrect" string has a chacacter deleted somewhere
	Substitution:	Combination of "insertion" and "deletion" at the same index
Errors are given as arrays that contain information about them:
	['Type']: The type of error ("Ins"/"Del"/"Sub")
	['Index']: The index of the error (within the "incorrect" string)
	['Incorrect']: The character that is there incorrectly (from the "incorrect" string; '' for Deletion)
	['Correct']: The character that is supposed to be within that index (from the "correct" string; '' for Insertion)
*/
function findStringErrors($incorrect, $correct)
{
	if (strcmp($incorrect, $correct) == 0)
		return 0;
	
	$initial = str_split($incorrect);
	$final   = str_split($correct);
	
	$matrix = findEditDistanceMatrix($initial, $final);
	
	$errors = array();
	$m = sizeof($initial);
	$n = sizeof($final);
	$i = 0;

	while (($m > 0) or ($n > 0))
	{
		$current = $matrix[$m][$n];
		$up = INF;
		$left = INF;
		$upleft = INF;
		
		if ($m > 0)
			$up = $matrix[$m - 1][$n];
		if ($n > 0)
			$left = $matrix[$m][$n - 1];
		if (($m > 0) and ($n > 0))
			$upleft = $matrix[$m - 1][$n - 1];
		
		$min = min($up, $left, $upleft);
		
		// Either a substitution error or no error
		if ($upleft === $min)
		{
			// Substitution error
			if ($upleft < $current)
			{
				$errors[$i] = array("Type"=>"Sub",
									"Index"=>$m,
									"Incorrect"=>$initial[$m - 1],
									"Correct"=>$final[$n - 1]);
				$i++;
			}
			$m--;
			$n--;
		}
		
		// There is an error in this cell
		else
		{
			// Deletion error (prioritized when there is a tie)
			if ($left <= $up)
			{
				$errors[$i] = array("Type"=>"Del",
									"Index"=>$m,
									"Incorrect"=>'',
									"Correct"=>$final[$n - 1]);
				$n--;
			}
			// Insertion error
			else if ($up < $left)
			{
				$errors[$i] = array("Type"=>"Ins",
									"Index"=>$m - 1,
									"Incorrect"=>$initial[$m - 1],
									"Correct"=>'');
				
				if ($n < sizeof($final))
					$errors[$i]['Correct'] = $final[$n];
				
				$m--;
			}
			$i++;
		}
	}
	
	$errors = array_reverse($errors);
	
	return $errors;
}


function ed_test($incorrect, $correct)
{
	echo $incorrect . " -> " . $correct . "<br><br>";
	
	$matrix = findEditDistanceMatrix(str_split($incorrect), str_split($correct));
	$errors = findStringErrors($incorrect, $correct);
	$instructs = flipErrors($errors);
	
	print_matrix($matrix);
	print_matrix($errors);
	print_matrix($instructs);
	echo "<br>";
}

ed_test("sitting", "kitten");
ed_test("sunday", "saturday");



?>