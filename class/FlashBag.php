<?php

class FlashBag{
	
public function __construct(){
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
		
	if(!array_key_exists('flash-messages',$_SESSION) || !isset($_SESSION['flash-messages'])){
		
		$_SESSION['flash-messages'] = [];
	}
}

public function add($message){
		$_SESSION['flash-messages'][] = $message;
		//ou array_push($_SESSION['flash-messages'],$message);
	}

public function hasMessages(){
	return !empty($_SESSION['flash-messages']);

}

public function fetch(){///rien à voir avec fetch PDO
	return array_shift($_SESSION['flash-messages']);
}

public function fetchAll(){
$messages = $_SESSION['flash-messages'];
$_SESSION['flash-messages'] = [];
return $messages;
}

}

