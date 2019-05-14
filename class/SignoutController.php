<?php

class SignoutController{
	
	
	function index(){
		
$userSession = new UserSession();
$userSession->signout();

$fb = new FlashBag;
$fb->add('Vous êtes déconnectés');

header('location:index.php?p=home');


	}
}