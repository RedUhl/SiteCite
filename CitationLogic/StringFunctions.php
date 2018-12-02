<?php


function printCitationArray($array)
{
	foreach ($array as $row)
	{
		if (is_array($row))
		{
			printCitationArray($row);
		}
		else
		{
			$parse = explode('<i>', $row);
			$parse = implode('~i~', $parse);
			$parse = explode('</i>', $parse);
			$parse = implode('~/i~', $parse);
			
			echo '|' . $parse;
		}
	}
}


function printMatrix($matrix)
{
	foreach ($matrix as $row)
	{
		echo '| ';
		foreach ($row as $column)
			echo $column . ' | ';
		echo '<br>';
	}
	echo '<br>';
}


// Convert citation array into citation string
function concatCitation($array)
{
	$result = '';
	foreach ($array as $row)
	{
		if (is_array($row))
			$concat = concatCitation($row);
		else
			$concat = $row;
		$result = $result . $concat;
	}
	
	return $result;
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


// Given a string, Returns an associative array that contains:
// 'Raw': The string without any italics tags
// 'Italics': Every substring that is italicized
// 'NonItalics': Every substring that is not italicized
// 'Unknown': Every substring that MIGHT be italicized (if some unknown previous string has an open <i> tag)
function getItalics($string)
{
	$result = array('Raw'=>'', 'Italics'=>array(), 'NonItalics'=>array(), 'Unknown'=>array());
	
	$parse1 = splitBefore($string, '<i>');
	foreach ($parse1 as $item1)
	{
		$parse2 = splitBefore($item1, '</i>');
		foreach ($parse2 as $item2)
		{
			if (substr($item2, 0, 3) == '<i>')
			{
				$result['Raw'] = $result['Raw'] . substr($item2, 3);
				$result['Italics'][sizeof($result['Italics'])] = substr($item2, 3);
			}
			else if (substr($item2, 0, 4) == '</i>')
			{
				$result['Raw'] = $result['Raw'] . substr($item2, 4);
				$result['NonItalics'][sizeof($result['NonItalics'])] = substr($item2, 4);
			}
			else
			{
				$result['Raw'] = $result['Raw'] . $item2;
				$result['Unknown'][sizeof($result['Unknown'])] = $item2;
			}
		}
	}
	
	return $result;
}


?>