<?php
class Database{
	const DB_HOST ='localhost';
	const DB_NAME ='blog';
	const DB_USER ='root';
	const DB_PASSWORD ='';
	
function getPDOConnection(){
	$pdo = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME,self::DB_USER,self::DB_PASSWORD,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
	$pdo ->exec('SET NAMES UTF8');
	return $pdo;
}

function executeQuery($sql,array $params=[]){
	$pdo = $this->getPDOConnection();
	$query=$pdo->prepare($sql);
	$query->execute($params);
	return $query;
}

function queryAll($sql,array $params=[]){
	$query = $this->executeQuery($sql,$params);
	return $query -> fetchAll();	
}

function queryOne($sql,array $params=[]){
	$query = $this->executeQuery($sql,$params);
	return $query -> fetch();	
}

function queryAction($sql,$params=[]){
	$this->executeQuery($sql,$params);
}
}
