<?php

function print_matrix($matrix)
{
	$indent = '|';
	$i = 0;
	foreach ($matrix as $row)
	{
		if (is_array($row))
		{
			if ($i != 0)
				echo '<br>';
			print_matrix_recurse($row, $indent . '|');
		}
		else
		{
			if ($i == 0)
				echo $indent;
			echo $row . '|';
			$i++;
		}
	}
	echo '<br>';
}


function print_matrix_recurse($matrix, $indent)
{
	$i = 0;
	foreach ($matrix as $row)
	{
		if (is_array($row))
		{
			if ($i != 0)
				echo '<br>';
			print_matrix_recurse($row, $indent . '|');
		}
		else
		{
			if ($i == 0)
				echo $indent;
			echo $row . '|';
			$i++;
		}
	}
	echo '<br>';
}





function concatCitation($matrix)
{
	$indent = '|';
	$i = 0;
	foreach ($matrix as $row)
	{
		if (is_array($row))
		{
			if ($i != 0)
				echo '<br>';
			print_matrix_recurse($row, $indent . '|');
		}
		else
		{
			if ($i == 0)
				echo $indent;
			echo $row . '|';
			$i++;
		}
	}
	echo '<br>';
}


function concatCitationRecurse($matrix, $indent)
{
	$i = 0;
	foreach ($matrix as $row)
	{
		if (is_array($row))
		{
			if ($i != 0)
				echo '<br>';
			print_matrix_recurse($row, $indent . '|');
		}
		else
		{
			if ($i == 0)
				echo $indent;
			echo $row . '|';
			$i++;
		}
	}
	echo '<br>';
}







function splitBefore($string, $splitter)
{
	if ($splitter === '')
		return str_split($string);
	
	$result = explode($splitter, $string);
	
	for ($i = 1; $i < sizeof($result); $i++)
		$result[$i] = implode($splitter, array('', $result[$i]));
	
	return $result;
}


function splitAfter($string, $splitter)
{
	if ($splitter === '')
		return str_split($string);
	
	$result = explode($splitter, $string);
	
	for ($i = 0; $i < sizeof($result) - 1; $i++)
		$result[$i] = implode($splitter, array($result[$i], ''));
	
	return $result;
}


?>