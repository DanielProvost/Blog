<?php

class PostModel extends AbstractModel{
	

public function getAllPosts(){
	$sql = 'SELECT post.Id,Title,Content,Image,CreatedAt,Name,Category FROM post INNER JOIN category ON post.Category = category.Id ORDER BY CreatedAt DESC';
	
	return $this->db->queryAll($sql);
}

public function getOnePost($id){
	$sql = 'SELECT post.Id,Title,Content,Image,CreatedAt,Name,Category FROM post INNER JOIN category ON post.Category = category.Id WHERE post.Id=?';
	return $this->db->queryOne($sql,[$id]);
}


}