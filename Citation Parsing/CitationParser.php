<?php

require_once 'StringFunctions.php';

// Done: DOI
// Need: Authors, Year, Article title, Journal (Name, Volume, Issue, Pages)
function printParsedCitation($parse)
{
	// Prints the authors
	echo 'Authors: ';
	foreach ($parse['Authors'] as $author)
		echo $author;
	echo '<br>';
	
	
	// Prints the DOI number
	echo 'DOI: ' . $parse['DOI']['Number'] . '<br>';
}

function parseAuthor($author, $style)
{
	return $author;
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
			$style = 0;
		
		// Multiple authors
		else
		{
			// Last author
			if (($i + 1) >= (sizeof($parse) / 2))
				$style = 2;
			// Not last author
			else
				$style = 1;
		}
	
		$author = array('L'=>$parse[$i*2], 'FM'=>$parse[($i*2)+1]);
		$result[$i] = parseAuthor($author, $style);
	}

	return $result;
}


// Parses a DOI into its separate elements, then returns them as an associative array
function parseDOI($doi)
{
	$parse = splitAfter($doi, 'doi:');
	return array('Key'=>$parse[0], 'Number'=>$parse[1]);
}


// Parses a citation into its separate elements, then returns them as an array
function parseCitation($citation)
{
	//$result = array("Authors"=>"", "Year"=>"", "Title"=>"", "Journal"=>"", "DOI"=>"");
	$result = array('Authors'=>'', 'Remainder'=>'', 'DOI'=>'');

	// Splits "Citation" into: "Authors-Pages", "DOI"
	$parse = splitBefore($citation, 'doi:');
	$authors_to_pages = $parse[0];
	$result['DOI'] = parseDOI($parse[1]);
	
	// Splits "Authors-Pages" into: "Authors", "Year-Volume", "Issue-Pages"
	$parse = splitBefore($authors_to_pages, '(');
	$result['Authors'] = parseAuthorList($parse[0]);
	$year_to_volume = $parse[1];
	$issue_to_pages = $parse[2];
	
	
	
	
	$result['Remainder'] = array($year_to_volume, $issue_to_pages);
	

	return $result;
}


//$citation = "Last, F. M., & Last, F. M. (Year). Article title. Journal Name, Volume(Issue), Pages. doi:DOI";
$citation = "Last, F. M. (Year). Article title. Journal Name, Volume(Issue), Pages. doi:DOI";

$parse = parseCitation($citation);

print_matrix($parse, '');
echo '<br>';
printParsedCitation($parse);


//$parse = parseCitation($citation);

//print_matrix($parse);


?>