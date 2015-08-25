<?php 
namespace vendor\Controller;

/**
*  Controller for Topics
*/
class TopicController extends \vendor\Controller
{
	
	protected $data;

	// protected $template;
	// protected $config;

	function __construct()
	{
		parent::__construct();
		$this->data = new \vendor\Model\Topics();
		// $this->data = new \vendor\TopicData();
		// $this->template = new \vendor\Template("../views/app.phtml");
		// $this->config = new \vendor\Template($this->config['view_path'] . "/app.phtml");
	}

	/**
	 * Simple rendering function
	 * @param  [object] $template link to view
	 * @param  array  $data     [description]
	 * @return [type]           [description]
	 */
	protected function renderkan($temp, $data = array())
	{
		$config = \vendor\Config::get('site');
		// die($this->config['view_path']);
		$this->template->render($this->config['view_path'] . "/" . $temp, $data);
	}

	public function listAction()
	{
		$topics = $this->data->getAllTopics();
		// print_r($topics);
		$this->template->render("../views/index/list.phtml", ['topics' => $topics]);
		// $this->renderkan("index/list.phtml", ['topics' => $topics]);
	}

	public function addAction()
	{
		if (isset($_POST) && sizeof($_POST) > 0) {
			$this->data->add($_POST);
			header("location: list");
			exit;
		}
		$this->template->render("../views/index/add.phtml");
	}

	public function editAction($option)
	{

		if (!isset($option['id']) || empty($option['id'])) {
			echo "Anda Tidak Memasukan ID Topics";
			exit;
		}

		// $data = new \vendor\TopicData();
		$topic = $this->data->getTopic($option['id']);

		if ($topic === false) {
			echo "ID Topics Tidak Ditemukan";
			exit;
		}

		//update data
		if (isset($_POST['id']) && !empty($_POST['id'])) {
			$data = new \vendor\TopicData();
			if (($data->update($_POST)) === true) {
				header("location: ../");
				exit;
			}else{
				echo "ada kesalahan";
				exit;
			}
		}

		$this->template->render("../views/index/edit.phtml", ['topic' => $topic]);

	}

	public function deleteAction($option)
	{

		if (!isset($option['id']) || empty($option['id'])) {
			echo "ID Tidak Ada";
			exit;
		}

		$topic = $this->data->getTopic($option['id']);

		if ($topic === false) {
			echo "Topic Tidak Ditemukan";
			exit;
		}

		if ($this->data->delete($option['id'])) {
			header("location: list");
			exit;
		} else {
			echo "Terjadi Kesalahan";
			exit;
		}


	}

}
?>