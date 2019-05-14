<?php

class PostController{

	public function index($id){



	$postmodel1 = new PostModel;
	$post = $postmodel1->getOnePost($id);

	$commentModel = new CommentModel();
	$comments = $commentModel->getCommentsByPostId($id);
	
	$page='article';
	include 'views/layout.phtml';

	}
	
	public function addComment($id){
	$nickname = $_POST['nickname'];
	$content = $_POST['content'];
	

	$newcomment = new CommentModel();

	$newcomment->addComment($nickname,$content,$id);

	header('location:index.php?p=post&postId='.$id);exit();
	
	
	}
}