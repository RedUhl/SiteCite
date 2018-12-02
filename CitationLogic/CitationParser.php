<?php


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
// 'Middle' 'BKey' if middle exists; 'First' 'BKey' otherwise
// 'FKey' might be useless
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


// Parses a list of authors into individual authors, then returns them as an associative array
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


// Parses a year or issue into its separate elements, then returns them as an associative array
function parseNumber($number)
{
	$parse1 = splitAfter($number, '(');
	$parse2 = splitBefore($parse1[1], ')');
	return array('Open'=>$parse1[0], 'Number'=>$parse2[0], 'Close'=>$parse2[1]);
}


// Parses an article title into its separate elements, then returns them as an associative array
// FKey might be unnecessary
function parseTitle($title)
{
	$parse = splitBefore($title, '.');
	return array('FKey'=>'', 'Text'=>$parse[0], 'BKey'=>$parse[1]);
}


// |<i> Journal Name, Volume</i>|
// Parses journal name and volume
function parseItalics($name_to_volume)
{
	$result = array('Name'=>array('FKey'=>'', 'Text'=>'', 'BKey'=>''),
					'Volume'=>array('FKey'=>'', 'Number'=>'', 'BKey'=>''));
	
	// Will probably be useful later
	$italics = getItalics($name_to_volume);
	
	// Separate name and volume
	$parse = splitAfter($name_to_volume, ', ');
	$name = $parse[0];
	$volume = $parse[1];
	
	// Split volume into its elements
	$parse = splitBefore($volume, '</i>');
	$result['Volume']['BKey'] = $parse[1];
	$result['Volume']['Number'] = $parse[0];
	
	// Split comma off name
	$parse = splitBefore($name, ',');
	$text = $parse[0];
	$result['Name']['BKey'] = $parse[1];
	
	// Split tags of name
	$parse = splitAfter($text, '<i>');
	$result['Name']['FKey'] = $parse[0];
	$text = $parse[1];
	
	// Split space of beginning of name
	if (substr($text, 0, 1) === ' ')
	{
		$text = substr($text, 1);
		$result['Name']['FKey'] = $result['Name']['FKey'] . ' ';
	}
	$result['Name']['Text'] = $text;

	return $result;
}


// Parses pages into separate elements, then returns them as an associative array
function parsePages($pages)
{
	$result = array('FKey'=>'', 'First'=>'', 'MKey'=>'', 'Last'=>'', 'BKey'=>'');
	
	$parse = splitBefore($pages, '.');
	$result['BKey'] = $parse[1];
	
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


// Parses a DOI into its separate elements, then returns them as an associative array
function parseDOI($doi)
{
	$parse = splitAfter($doi, 'doi:');
	return array('FKey'=>$parse[0], 'Number'=>$parse[1]);
}


// Parses a citation into its separate elements, then returns them as an array
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
	$year_to_volume = $parse[1];
	$issue_to_pages = $parse[2];
	
	// Splits "Year-Volume" into "Year-Title", "JournalName-Volume"
	$parse = splitAfter($year_to_volume, '.');
	$year_to_title = $parse[0] . $parse[1];
	$name_to_volume = $parse[2];
	
	// Splits "Year-Title" into "Year", "Title"
	$parse = splitAfter($year_to_title, '. ');
	$result['Year'] = parseNumber($parse[0]);
	$result['Title'] = parseTitle($parse[1]);
	
	// Splits "JournalName-Volume" into "Name", "Volume"
	$result['Journal'] = parseItalics($name_to_volume);
	
	// Splits "Issue-Pages" into "Issue", "Pages"
	$parse = splitAfter($issue_to_pages, ', ');
	$result['Journal']['Issue'] = parseNumber($parse[0]);
	$result['Journal']['Pages'] = parsePages($parse[1]);

	return $result;
}


?>