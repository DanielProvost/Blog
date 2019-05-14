<?php

class SignupController{
	
	public function index(){
		
		$email='';
		$firstname='';
		$lastname='';
		$birthdate='';
		$adress='';
		$zipcode='';
		$city='';
		$gender='';

		if(!empty($_POST)){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$birthdate = $_POST['birthdate'];
		$adress = $_POST['adress'];
		$zipcode = $_POST['zipcode'];
		$city = $_POST['city'];
		$gender = $_POST['gender'];


		try{
		$userUp = new UserModel();
		$verif = $userUp->mailExist($email);
		$userUp->addUser($email,$password,$firstname,$lastname,$birthdate,$adress,$zipcode,
		$city,$gender);

		$fb = new FlashBag;
		$fb->add('Votre compte est bien enregistré');


		header('location:index.php?p=home');exit(); 
		}

		catch (Exception $e){
				$error = $e->getMessage();
			}
		}


		$page = 'signup_form';
		include 'views/layout.phtml';

	}
}