<?php

function ensureLoggedIn(){
	if(!isset($_SESSION['phpCAS']['user'])){
		echo "not logged in";
		exit(0);
	}
	else{
		return;
	}
}


?>