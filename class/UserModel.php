<?php

class UserModel extends AbstractModel{
	

function addUser($email,$password,$firstname,$lastname,$birthdate,$adress,$zipcode,
$city,$gender){
if ($this->mailExist($email)){
	throw new Exception('Le mail existe déja');
};

$sql = 'INSERT INTO user(Email,Password,Firstname,Lastname,Birthdate,Adress,Zipcode,City,Gender) 
		VALUES (?,?,?,?,?,?,?,?,?)';
$passwordCrypt = password_hash($password,PASSWORD_DEFAULT);		

$this->db->queryAction($sql,[$email,$passwordCrypt,$firstname,$lastname,$birthdate,$adress,$zipcode,
$city,$gender]);
}

function checkUser($email,$password){
$sql = 'SELECT Id,Email,Password,Firstname,Lastname from user WHERE Email = ?';
$user = $this->db->queryOne($sql,[$email]);

	if (!empty ($user)){
		if(password_verify($password,$user['Password'])){
			return $user;
		}
	}
		throw new Exception('Identifiants incorrects');
	
}

function mailExist($email){
	$sql = 'SELECT Email from user WHERE Email = ?';
	$user = $this->db->queryOne($sql,[$email]);
	if(!empty($user)){
		return $user;
	}
	return false;
}


}















