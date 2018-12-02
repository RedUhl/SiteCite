<?php


require_once 'StringFunctions.php';


// Single Author
function getDummyCitation1()
{
	$string = 'Deegan, E. F. (2000). Beyond the red pen: Clarifying our role in the response process. <i>The English Journal, 90</i>(1), 94-101. doi:10.2307/821738';

	$citation = array();

	// Authors
	$lname3 = array('FKey'=>'', 'Name'=>'Deegan', 'BKey'=>', ');
	$fname3 = array('FKey'=>'', 'Name'=>'E', 'BKey'=>'. ');
	$mname3 = array('FKey'=>'', 'Name'=>'F', 'BKey'=>'. ');
	//$author = array('Last'=>$lname3, 'First'=>$fname3, 'Middle'=>$mname3, 'Style'=>1);
	$author = array('Last'=>$lname3, 'First'=>$fname3, 'Middle'=>$mname3);

	$citation['Authors'] = array($author);


	// Year
	$citation['Year'] = array('Open'=>'(', 'Number'=>'2000', 'Close'=>').');


	// Article Title
	$citation['Title'] = array('FKey'=>' ', 'Text'=>'Beyond the red pen: Clarifying our role in the response process', 'BKey'=>'.');


	// Journal
	$jname = array('FKey'=>' <i>', 'Text'=>'The English Journal', 'BKey'=>', ');
	$volume = array('FKey'=>'', 'Number'=>'90', 'BKey'=>'</i>');
	$issue = array('Open'=>'(', 'Number'=>'1', 'Close'=>'), ');
	$pages = array('FKey'=>'', 'First'=>'94', 'MKey'=>'-', 'Last'=>'101', 'BKey'=>'. ');
	$citation['Journal'] = array('Name'=>$jname, 'Volume'=>$volume, 'Issue'=>$issue, 'Pages'=>$pages);

	// DOI
	$citation['DOI'] = array('FKey'=>'doi:', 'Number'=>'10.2307/821738');
	
	return $citation;
}


// Multiple Authors
function getDummyCitation2()
{
	$string = 'Bardine, B. A., Bardine, M. S., & Deegan, E. F. (2000). Beyond the red pen: Clarifying our role in the response process. <i>The English Journal, 90</i>(1), 94-101. doi:10.2307/821738';

	$citation = array();

	// Authors
	$lname1 = array('FKey'=>'', 'Name'=>'Bardine', 'BKey'=>', ');
	$fname1 = array('FKey'=>'', 'Name'=>'B',  'BKey'=>'. ');
	$mname1 = array('FKey'=>'', 'Name'=>'A',  'BKey'=>'., ');
	//$author1 = array('Last'=>$lname1, 'First'=>$fname1, 'Middle'=>$mname1, 'Style'=>2);
	$author1 = array('Last'=>$lname1, 'First'=>$fname1, 'Middle'=>$mname1);
	

	$lname2 = array('FKey'=>'', 'Name'=>'Bardine', 'BKey'=>', ');
	$fname2 = array('FKey'=>'', 'Name'=>'M', 'BKey'=>'. ');
	$mname2 = array('FKey'=>'', 'Name'=>'S', 'BKey'=>'., ');
	//$author2 = array('Last'=>$lname2, 'First'=>$fname2, 'Middle'=>$mname2, 'Style'=>2);
	$author2 = array('Last'=>$lname2, 'First'=>$fname2, 'Middle'=>$mname2);

	$lname3 = array('FKey'=>'& ', 'Name'=>'Deegan', 'BKey'=>', ');
	$fname3 = array('FKey'=>'', 'Name'=>'E', 'BKey'=>'. ');
	$mname3 = array('FKey'=>'', 'Name'=>'F', 'BKey'=>'. ');
	//$author3 = array('Last'=>$lname3, 'First'=>$fname3, 'Middle'=>$mname3, 'Style'=>3);
	$author3 = array('Last'=>$lname3, 'First'=>$fname3, 'Middle'=>$mname3);

	$citation['Authors'] = array($author1, $author2, $author3);


	// Year
	$citation['Year'] = array('Open'=>'(', 'Number'=>'2000', 'Close'=>').');


	// Article Title
	$citation['Title'] = array('FKey'=>' ', 'Text'=>'Beyond the red pen: Clarifying our role in the response process', 'BKey'=>'.');


	// Journal
	$jname = array('FKey'=>' <i>', 'Text'=>'The English Journal', 'BKey'=>', ');
	$volume = array('FKey'=>'', 'Number'=>'90', 'BKey'=>'</i>');
	$issue = array('Open'=>'(', 'Number'=>'1', 'Close'=>'), ');
	$pages = array('FKey'=>'', 'First'=>'94', 'MKey'=>'-', 'Last'=>'101', 'BKey'=>'. ');
	$citation['Journal'] = array('Name'=>$jname, 'Volume'=>$volume, 'Issue'=>$issue, 'Pages'=>$pages);

	// DOI
	$citation['DOI'] = array('FKey'=>'doi:', 'Number'=>'10.2307/821738');
	
	return $citation;
}


?>