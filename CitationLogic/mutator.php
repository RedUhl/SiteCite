<?php
function mutator($citation)
{
	$explosion=explode(".",$citation);
	//print_r($explosion);
	$length=count($explosion);
	$scores=array();
	$capindex=-1;
	$orderindex=-1;
	$formatindex=-1;
	$punctindex=".";
	
	require './../Database/login.php';

	$dblink = devOpenDb($hn,$db,$pw,$un);
	//$dblink = devOpenDb("localhost","user_rw",'groupC3',"$mysqlAccessPW['user_rw']");
	
	$sql="SELECT capitalizationscore,orderingscore,punctuationscore,formatingscore FROM Students WHERE studentID='$_SESSION['phpCAS']['user']'";
	$result = mysql_query($sql,$dblink);
	
	if($result == false) echo "<br /><br />Error:".mysql_error()."<br /> , Line:".__LINE__."<br /> $sql <br />";
	while($row = mysql_fetch_assoc($result)){
    	$keys=array_keys($row);
    	foreach($keys as $key){
      	array_push($scores,$row[$key]);
    	}
  	}
	
	

	//$scores=getStudentscore(4);
	//$scores=array(100,100,100,100);
	//print_r($scores);
	$percentiles=array(rand(0, 100),rand(0,100),rand(0,100),rand(0,100));
	//print_r($percentiles);
	

	if($scores[0]<=$percentiles[0])
	{
		$explosion = messCapit($explosion);
		$capindex = array_pop($explosion);
	}

	if($scores[1]<=$percentiles[1])
	{
		$explosion=messorder($explosion);
		$orderindex = array_pop($explosion);
	}

	if($scores[3]<=$percentiles[3])
	{
		$explosion=messformat($explosion);
		$formatindex = array_pop($explosion);
	}

	if($scores[2]<=$percentiles[2])
	{
		$explosion=messpunct($explosion);
		$punctindex = array_pop($explosion);
	}

	
	
	if($scores[0]>$percentiles[0]&&$scores[1]>$percentiles[1]&&$scores[3]>$percentiles[3]&&$scores[2]>$percentiles[2])
	{
		$random=rand(0,3);
		if($random==0)
		{	
			$explosion=messCapit($explosion);
			$capindex = array_pop($explosion);
		}
		if($random==1)
		{	
			$explosion=messorder($explosion);
			$orderindex = array_pop($explosion);
		}
		if($random==2)
		{	
			$explosion=messformat($explosion);
			$formatindex = array_pop($explosion);
		}
		if($random==3)
		{	
			$explosion=messpunct($explosion);
			$punctindex = array_pop($explosion);
		}

	}

	if($scores[2]>$percentiles[2] && $random !=3)
	{
		$explosion=implode(".",$explosion);
	}
	//$retarry=$explosion;
	$retarray = array($explosion,$length);

	if($scores[0]<=$percentiles[0] || $random == 0)
	{
		array_push($retarray,"Capitalization");
		array_push($retarray,$capindex);
	}
	if($scores[1]<=$percentiles[1] || $random == 1)
	{
		array_push($retarray,"Ordering");
		array_push($retarray,$orderindex);
	}
	if($scores[3]<=$percentiles[3] || $random == 3)
	{
		array_push($retarray,"Punctuation");
		array_push($retarray,$punctindex);
	}
	if($scores[2]<=$percentiles[2] || $random == 2)
	{
		array_push($retarray,"Formatting");
		array_push($retarray,$formatindex);
	}
	//echo $formatindex;
	//echo $punctindex;
	//echo $capindex;
	//echo $capindex;
	//echo $explosion;
	
	return $retarray;

}

function messCapit($citation)
{
	$length=count($citation);
	$messwith=rand(0,$length-1);
	//($citation[$messwith]);
	//echo strtolower($citation[$messwith]);
	$citation[$messwith]=strtolower($citation[$messwith]);
	
/* Skipped the fancy stuff because it refuses to work
	if(isPartLowercase($citation[$messwith]))
	{
		echo 'here';
		$citation[$messwith]=strtoupper($citation[$messwith]);
		return $citation;
	}

	if(ctype_upper($citation[$messwith])
	{
		$citation[$messwith]=strtolower($citation[$messwith]);
		return $citation;
	}

	else
	{
		$citation[$messwith]=strtoupper($citation[$messwith]);
		return $citation;
	}
*/
	array_push($citation,$messwith);
	//echo $messwith;
	
	return $citation;
	
}

function isPartUppercase($string) {
	
    return (bool) preg_match(�/[A-Z]/�, $string);
}

function isPartLowercase($string) {
	//echo 'here';
    return (bool) preg_match(�/[a-z]/�, $string);
}


function messorder($citation)
{
	$length=count($citation);
	$messwith=rand(0,$length-1);
	//print_r($citation[$messwith]);
	$messwith2=rand(0,$length-1);
	

	while($messwith==$messwith2)
	{
		$messwith2=rand(0,$length-1);
	}
	//print_r($citation[$messwith2]);
	$temp = $citation[$messwith];
	$citation[$messwith] = $citation[$messwith2];
	$citation[$messwith2] = $temp;
	
	array_push($citation,$messwith);
	
	
	return $citation;
}

function messpunct($citation)
{
	
	$random=rand(1,10);

	if($random==1)
	{
		$citation=implode("|",$citation);
		array_push($citation,"|");
	}

	if($random==2)
	{
		$citation=implode(",",$citation);
		array_push($citation,",");
	}

	if($random==3)
	{
		$citation=implode(";",$citation);
		array_push($citation,";");
	}

	if($random==4)
	{
		$citation=implode(":",$citation);
		array_push($citation,":");
	}

	if($random==5)
	{
		$citation=implode("~",$citation);
		array_push($citation,"~");
	}

	if($random==6)
	{
		$citation=implode("&",$citation);
		array_push($citation,"&");
	}

	if($random==7)
	{
		$citation=implode("^",$citation);
		array_push($citation,"^");
	}

	if($random==8)
	{
		$citation=implode("/",$citation);
		array_push($citation,"/");
	}

	if($random==9)
	{
		$citation=implode("-",$citation);
		array_push($citation,"-");
	}

	if($random==10)
	{
		$citation=implode("*",$citation);
		array_push($citation,"*");
	}
	
	
	return $citation;

}

function messformat($citation)
{
	$length=count($citation);
	$messwith=rand(0,$length-1);

	while($messwith==length-2)
	{
		$messwith=rand(0,$length-1);
	}
	//print_r($citation[$messwith]);
	$citation[$messwith]="<i>".$citation[$messwith]."</i>";
	array_push($citation,$messwith);
	//echo $messwith;
	return $citation;
}

function devOpenDb($hostname,$uid,$pwd,$database){
  $link = mysql_connect($hostname,$uid,$pwd);
  if($link && mysql_select_db($database)){
    //echo "Database Connected with Development Link ";
    return($link);
  } else {
    echo "No connection ";
    return(FALSE);
  }
}




// $citation = "Last, F. M. (Year). Article title.<i> Journal Name, Volume</i>(Issue), Pages. doi:DOI";

// $result = mutator($citation);
// print_r($result);
?>