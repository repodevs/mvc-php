<?php 
namespace vendor;

/**
* controller 
*/
class Controller
{
	
	function __construct()
	{
		$this->config = \vendor\Config::get('site');
		$this->template = new \vendor\Template($this->config['view_path'] . "/app.phtml");
	}

	protected function render($template, $data = array())
	{
		$this->template->render($this->config['view_path'] . "/" . $template, $data);
	}
}
