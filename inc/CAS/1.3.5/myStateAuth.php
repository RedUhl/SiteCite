
<?PHP
include_once('CAS.php'); //or the location of the CAS.php script                 

//phpCAS::setDebug('');

phpCAS::client(CAS_VERSION_1_0, 'my.msstate.edu', 443, '/cas');


phpCAS::setNoCasServerValidation();

if(!phpCAS::checkAuthentication()) 
{
	phpCAS::forceAuthentication();
	
	// $AuthId = phpCAS::getUser();  //$AuthId now has the username stored in it.  
	// You can change this variable if you needed.
	//$_SERVER['HTTP_CAS_FILTER_USER'] = phpCAS::getUser();
} 
else 
{
	//$AuthId = phpCAS::getUser();
	//$_SERVER['HTTP_CAS_FILTER_USER'] = phpCAS::getUser();
}

/*
// logout if desired
if(isset($_GET['logout']))
{
	$redirectService = '';
	
	if($_SERVER['HTTPS'])
		$redirectService .= 'https://';
	else
		$redirectService .= 'http://';
	
	$redirectService .= $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
	
	$redirectUrl = $redirectService;
	
	phpCAS::logoutWithRedirectServiceAndUrl($redirectService, $redirectUrl);
}
*/
?>
