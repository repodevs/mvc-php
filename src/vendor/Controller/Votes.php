<?php 
namespace vendor\Controller;

/**
* Create Votes Controller
*/
class Votes extends \vendor\Controller
{

	public function addAction($options)
	{
		if (!isset($options['id']) || empty($options['id'])) {
			echo "No topic id specified !";
			exit;
		}

		$votes = new \vendor\Model\Votes();
		$votes->addVote($options['id']);

		header("Location: /topic");
	}	

}