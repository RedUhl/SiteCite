<?php


require_once 'CitationParser.php';


function parserTest($citations)
{
	for ($i = 0; $i < sizeof($citations); $i++)
	{
		echo '-----------------------------------------------------------<br>';
		echo 'Citation ';
		echo ($i+1);
		echo ':<br><br><br>';

		$parse = parseCitation($citations[$i]);
		$concat = concatCitation($parse);
		
		if ($concat === $citations[$i])
			$identical = 'Identical';
		else
			$identical = 'Not Identical';
		
		echo 'Initial, Final: ' . $identical . '<br><br>';
		echo $citations[$i] . '<br>';
		echo $concat . '<br><br><br>';

		echo 'Array Map:<br><br>';
		printCitationArray($parse);
		echo '<br><br><br>';
	}
}


$citations = array(
"Last, F. M. (Year). Article title.<i> Journal Name, Volume</i>(Issue), Pages. doi:DOI",
"Last, F. M., & Last, F. M. (Year). Article title. <i>Journal Name, Volume</i>(Issue), Pages. doi:DOI"
);


parserTest($citations);


?>