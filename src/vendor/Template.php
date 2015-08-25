<?php 
namespace vendor;

/**
* 
* Template
* 
*/
class Template
{
	
	protected $base_template;
	protected $page;

	function __construct($base_template)
	{
		$this->base_template = $base_template;
	}


	public function render($page, $data = array())
	{
		foreach ($data as $key => $value) {
			$this->{$key} = $value;
		}

		$this->page = $page;
		require $this->base_template;
	}

	public function content()
	{
		require $this->page;
	}

}