<?php

/*
Splits a citation into a set associative array of its different elements
*/


require_once 'StringFunctions.php';


// Separates a string of an author's last name into an array
function parseLast($last, $style)
{
	$result = array('FKey'=>'', 'Name'=>'', 'BKey'=>'');
	
	// "& Last, "
	if ($style === 3)
	{
		$parse = splitAfter($last, '& ');
		$result['FKey'] = $parse[0];
		$last = $parse[1];
	}
	
	$parse = splitBefore($last, ',');
	$result['Name'] = $parse[0];
	$result['BKey'] = $parse[1];
	
	return $result;
}


// Separates a string of an author's first and middle initials into two arrays
// NOTE: Style 2 expects a comma in:
// ['Middle']['BKey'] if middle exists; or ['First']['BKey'] otherwise
// 'FKey' is a placeholder for now
function parseFM($fm, $style)
{
	$result = array('First'=>'', 'Middle'=>'');
	$parse = splitAfter($fm, '. ');
	
	$parseF = splitBefore($parse[0], '.');
	$result['First'] = array('FKey'=>'', 'Name'=>$parseF[0], 'BKey'=>$parseF[1]);
	
	// If there is a middle initial
	if ($parse[1] !== '')
	{
		$parseM = splitBefore($parse[1], '.');
		$result['Middle'] = array('FKey'=>'', 'Name'=>$parseM[0], 'BKey'=>$parseM[1]);
	}
	
	return $result;
}


// Parses a list of authors into individual authors, then parses each authors' names
function parseAuthorList($authors)
{
	// Split "Authors" into an array of each individual author
	$parse = splitAfter($authors, ', ');
	$result = array();
	for ($i = 0; $i < (sizeof($parse) / 2); $i++)
	{
		// Single author
		if (sizeof($parse) <= 2)
			$style = 1;
		
		// Multiple authors
		else
		{
			// Last author
			if (($i + 1) >= (sizeof($parse) / 2))
				$style = 3;
			// Not last author
			else
				$style = 2;
		}

		$parseFM = parseFM($parse[($i*2)+1], $style);
		
		$result[$i] = array('Last'=>parseLast($parse[$i*2], $style),
							'First'=>$parseFM['First'],
							'Middle'=>$parseFM['Middle']);
	}

	return $result;
}


// Parses a year or issue into its separate elements
function parseNumber($number)
{
	$result = array('Open'=>'', 'Number'=>'', 'Close'=>'');
	
	$parse1 = splitAfter($number, '(');
	if (sizeof($parse1) > 1)
	{
		$result['Open'] = $parse1[0];
		$number = $parse1[1];
	}
	else
		$number = $parse1[0];
		
	$parse2 = splitBefore($number, ')');
	$result['Number'] = $parse2[0];
	if (sizeof($parse2) > 1)
		$result['Close'] = $parse2[1];
	
	return $result;
}


// Parses an article title into its separate elements
// 'FKey' is a placeholder, for now
function parseTitle($title)
{
	$parse = splitBefore($title, '.');
	$result = array('FKey'=>'', 'Text'=>$parse[0], 'BKey'=>'');
	if (sizeof($parse) > 1)
		$result['BKey'] = $parse[1];
	
	return $result;
}


// Parses journal name and volume
// Assumes that the italic tags are there, for now
function parseItalics($name_to_volume)
{
	$result = array('Name'=>array('FKey'=>'', 'Text'=>'', 'BKey'=>''),
					'Volume'=>array('FKey'=>'', 'Number'=>'', 'BKey'=>''));
	
	// Will probably be useful later
	$italics = getItalics($name_to_volume);
	
	// Separate name and volume
	$parse = splitAfter($name_to_volume, ', ');
	$name = $parse[0];
	if (sizeof($parse) > 1)
		$volume = $parse[1];
	else
		$volume = '';
	
	// Split tags off of volume (assumed that tags are present, for now)
	$parse = splitBefore($volume, '</i>');
	$result['Volume']['Number'] = $parse[0];
	if (sizeof($parse) > 1)
		$result['Volume']['BKey'] = $parse[1];
	
	// Split comma off of name
	$parse = splitBefore($name, ',');
	$text = $parse[0];
	if (sizeof($parse) > 1)
		$result['Name']['BKey'] = $parse[1];
	
	// Split tags off of name (assumed that tags are present, for now)
	$parse = splitAfter($text, '<i>');
	if (sizeof($parse) > 1)
	{
		$result['Name']['FKey'] = $parse[0];
		$text = $parse[1];
	}
	else
		$text = $parse[0];
	
	// Split space off of beginning of name
	if (substr($text, 0, 1) === ' ')
	{
		$text = substr($text, 1);
		$result['Name']['FKey'] = $result['Name']['FKey'] . ' ';
	}
	$result['Name']['Text'] = $text;

	return $result;
}


// Parses "pages" entry into separate elements
function parsePages($pages)
{
	$result = array('FKey'=>'', 'First'=>'', 'MKey'=>'', 'Last'=>'', 'BKey'=>'');
	
	// Cut the period off of the end
	$parse = splitBefore($pages, '.');
	if (sizeof($parse) > 1)
		$result['BKey'] = $parse[1];
	
	// Try to divide by hyphen; if there is no hyphen, then 'MKey' and 'Last' are intended to be ''
	$parse = splitBefore($parse[0], '-');
	$result['First'] = $parse[0];
	if (sizeof($parse) > 1)
	{
		$parse = splitAfter($parse[1], '-');
		$result['MKey'] = $parse[0];
		$result['Last'] = $parse[1];
	}

	return $result;
}


// Parses a DOI into its separate elements
function parseDOI($doi)
{
	$parse = splitAfter($doi, 'doi:');
	return array('FKey'=>$parse[0], 'Number'=>$parse[1]);
}


// Parses a citation into its separate elements, then returns them as a complex associative array
// Needs to be upgraded to do error handling when given citations that don't follow the format (and are therefore incorrect)
// This will require integration with the String Error Detector and the Citation Index Parser
function parseCitation($citation)
{
	$result = array('Authors'=>'', 'Year'=>'', 'Title'=>'', 'Journal'=>'',  'DOI'=>'');

	// Splits "Citation" into: "Authors-Pages", "DOI"
	$parse = splitBefore($citation, 'doi:');
	$authors_to_pages = $parse[0];
	if (sizeof($parse) > 1)
		$result['DOI'] = parseDOI($parse[1]);
	
	// Splits "Authors-Pages" into: "Authors", "Year-Volume", "Issue-Pages"
	$parse = splitBefore($authors_to_pages, '(');
	$result['Authors'] = parseAuthorList($parse[0]);
	if (sizeof($parse) > 1)
		$year_to_volume = $parse[1];
	else
		$year_to_volume = '';
	if (sizeof($parse) > 2)
		$issue_to_pages = $parse[2];
	else
		$issue_to_pages = '';
	
	// Splits "Year-Volume" into "Year-Title", "JournalName-Volume"
	$parse = splitAfter($year_to_volume, '.');
	if (sizeof($parse) > 1)
		$year_to_title = $parse[0] . $parse[1];
	else
		$year_to_title = $parse[0];
	if (sizeof($parse) > 2)
		$name_to_volume = $parse[2];
	else
		$name_to_volume = '';
	
	// Splits "Year-Title" into "Year", "Title"
	$parse = splitAfter($year_to_title, '. ');
	$result['Year'] = parseNumber($parse[0]);
	if (sizeof($parse) > 1)
		$result['Title'] = parseTitle($parse[1]);
	else
		$result['Title'] = '';
	
	// Splits "JournalName-Volume" into "Name", "Volume"
	$result['Journal'] = parseItalics($name_to_volume);
	
	// Splits "Issue-Pages" into "Issue", "Pages"
	$parse = splitAfter($issue_to_pages, ', ');
	$result['Journal']['Issue'] = parseNumber($parse[0]);
	if (sizeof($parse) > 1)
		$result['Journal']['Pages'] = parsePages($parse[1]);
	else
		$result['Journal']['Pages'] = '';

	return $result;
}


?>