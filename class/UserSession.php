<?php
class UserSession{
	

function __construct(){
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
}
	
function isAuthenticated(){
	
	if(array_key_exists('user',$_SESSION) && isset($_SESSION['user'])){
		return true;
	}
	return false;
}


function getUserName()
{
	  
    if ($this->isAuthenticated()) {
    
    	return $_SESSION['user']['Firstname'] . ' ' . $_SESSION['user']['Lastname'];
    }
}

function createuser($userId, $email, $firstname, $lastname)
{
    
    $_SESSION['user'] = [
    	'Id' 		=> $userId,
        'Email' 	=> $email,
        'Firstname' => $firstname,
        'Lastname'  => $lastname
    
    ];
}

function signout(){	
	$_SESSION['user'] = [];
	session_destroy();
}


}









