<?php

class HomeController{
	
	
	public function index(){
		
	$postmodel = new PostModel;
	$posts = $postmodel->getAllPosts();
	$fb = new Flashbag;


	$page = 'index';
	include 'views/layout.phtml';		
	}

}