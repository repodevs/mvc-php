<?php 
namespace vendor\Controller;

/**
* Error class
*/
class Error extends \vendor\Controller 
{
	
	public function indexAction()
	{
		header("HTTP/1.0 404 Not Found");
		$this->render("errors/index.phtml", ['message' => "Page not found!"]);
	}

}