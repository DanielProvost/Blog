<?php

class SigninController{


function signin(){
	$email = $_POST['email'];
	$password = $_POST['password'];


	try{
		
	$usermodel = new UserModel;
	$user = $usermodel->checkUser($email,$password);
	
 
	// Création de l'utilisateur en session
	$usermodel1 = new UserSession;
	$usermodel1->createuser($user['Id'], $user['Email'], $user['Firstname'], $user['Lastname']);
	
	$fb = new FlashBag;
	$fb->add('Vous êtes connectés');
	header('Location: index.php?p=home');
	exit;
	}
	
	catch (Exception $e){
		$error = $e->getMessage();
	}
	
}

function index(){
$page = 'signin_form';
include 'views/layout.phtml';
}

}