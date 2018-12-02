<?php

/*
Determines the string index of each element in a citation associative array
*/


require_once 'CitationParser.php';
require_once 'StringFunctions.php';


function parseCitationIndexes($citation)
{
	$index = 0;
	$result = array();
	
	$authors = array();
	for ($i = 0; $i < sizeof($citation['Authors']); $i++)
	{
		$last = array();
		$last['FKey'] = $index;
		$index += strlen($citation['Authors'][$i]['Last']['FKey']);
		$last['Name'] = $index;
		$index += strlen($citation['Authors'][$i]['Last']['Name']);
		$last['BKey'] = $index;
		$index += strlen($citation['Authors'][$i]['Last']['BKey']);
		
		$first = array();
		$first['FKey'] = $index;
		$index += strlen($citation['Authors'][$i]['First']['FKey']);
		$first['Name'] = $index;
		$index += strlen($citation['Authors'][$i]['First']['Name']);
		$first['BKey'] = $index;
		$index += strlen($citation['Authors'][$i]['First']['BKey']);
		
		$middle = array();
		$middle['FKey'] = $index;
		$index += strlen($citation['Authors'][$i]['Middle']['FKey']);
		$middle['Name'] = $index;
		$index += strlen($citation['Authors'][$i]['Middle']['Name']);
		$middle['BKey'] = $index;
		$index += strlen($citation['Authors'][$i]['Middle']['BKey']);

		$authors[$i] = array('Last'=>$last, 'First'=>$first, 'Middle'=>$middle);
	}
	$result['Authors'] = $authors;
	
	$year = array();
	$year['Open'] = $index;
	$index += strlen($citation['Year']['Open']);
	$year['Number'] = $index;
	$index += strlen($citation['Year']['Number']);
	$year['Close'] = $index;
	$index += strlen($citation['Year']['Close']);
	$result['Year'] = $year;
	
	$title = array();
	$title['FKey'] = $index;
	$index += strlen($citation['Title']['FKey']);
	$title['Text'] = $index;
	$index += strlen($citation['Title']['Text']);
	$title['BKey'] = $index;
	$index += strlen($citation['Title']['BKey']);
	$result['Title'] = $title;
	
	$result['Journal'] = array();
	
	$name = array();
	$name['FKey'] = $index;
	$index += strlen($citation['Journal']['Name']['FKey']);
	$name['Text'] = $index;
	$index += strlen($citation['Journal']['Name']['Text']);
	$name['BKey'] = $index;
	$index += strlen($citation['Journal']['Name']['BKey']);
	$result['Journal']['Name'] = $name;
	
	$volume = array();
	$volume['FKey'] = $index;
	$index += strlen($citation['Journal']['Volume']['FKey']);
	$volume['Number'] = $index;
	$index += strlen($citation['Journal']['Volume']['Number']);
	$volume['BKey'] = $index;
	$index += strlen($citation['Journal']['Volume']['BKey']);
	$result['Journal']['Volume'] = $volume;
	
	$issue = array();
	$issue['Open'] = $index;
	$index += strlen($citation['Journal']['Issue']['Open']);
	$issue['Number'] = $index;
	$index += strlen($citation['Journal']['Issue']['Number']);
	$issue['Close'] = $index;
	$index += strlen($citation['Journal']['Issue']['Close']);
	$result['Journal']['Issue'] = $issue;
	
	$pages = array();
	$pages['FKey'] = $index;
	$index += strlen($citation['Journal']['Pages']['FKey']);
	$pages['First'] = $index;
	$index += strlen($citation['Journal']['Pages']['First']);
	$pages['MKey'] = $index;
	$index += strlen($citation['Journal']['Pages']['MKey']);
	$pages['Last'] = $index;
	$index += strlen($citation['Journal']['Pages']['Last']);
	$pages['BKey'] = $index;
	$index += strlen($citation['Journal']['Pages']['BKey']);
	$result['Journal']['Pages'] = $pages;
	
	
	$doi = array();
	$doi['FKey'] = $index;
	$index += strlen($citation['DOI']['FKey']);
	$doi['Number'] = $index;
	$index += strlen($citation['DOI']['Number']);
	$result['DOI'] = $doi;
	
	return $result;
}


?>