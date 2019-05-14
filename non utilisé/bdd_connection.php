<?php
function getPDOConnection(){
	$pdo = new PDO('mysql:host=localhost;dbname=blog','root','',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	$pdo ->exec('SET NAMES UTF8');
	return $pdo;
}

function executeQuery($sql,array $params=[]){
	$pdo = getPDOConnection();
	$query=$pdo->prepare($sql);
	$query->execute($params);
	return $query;
}

function queryAll($sql,array $params=[]){
	$query = executeQuery($sql,$params);
	return $query -> fetchAll();	
}

function queryOne($sql,array $params=[]){
	$query = executeQuery($sql,$params);
	return $query -> fetch();	
}

function queryAction($sql,$params=[]){
	executeQuery($sql,$params);
}

