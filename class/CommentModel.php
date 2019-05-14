<?php

class CommentModel extends AbstractModel{
	

function getCommentsByPostId($id){
$sql = 'SELECT Nickname,CreatedAt,PostId,Content FROM comment WHERE postId=? ORDER BY CreatedAt DESC';
return $this->db->queryAll($sql,[$id]);
}

function addComment($nickname,$content,$postId){
$sql = 'INSERT INTO comment(Nickname,Content,PostId) 
		VALUES (?,?,?)';
$this->db->queryAction($sql,[$nickname,$content,$postId]);
}


}