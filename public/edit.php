<?php 
// require '../src/vendor/TopicData.php';
// require '../src/vendor/Template.php';

//autoloader
// require '../src/vendor/Autoloader.php';
require_once '../src/vendor/Config.php';
\vendor\Config::setDirectory('../config');

$config = \vendor\Config::get('autoload');
require_once $config['class_path'] . '/vendor/Autoloader.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
	echo "Anda Tidak Memasukan ID Topics";
	exit;
}

$data = new \vendor\TopicData();
$topic = $data->getTopic($_GET['id']);

if ($topic === false) {
	echo "ID Topics Tidak Ditemukan";
	exit;
}

//update data
if (isset($_POST['id']) && !empty($_POST['id'])) {
	$data = new \vendor\TopicData();
	if (($data->update($_POST)) === true) {

		header("location: index.php");
		exit;
	}else{
		echo "ada kesalahan";
		exit;
	}
}

$template = new \vendor\Template("../views/app.phtml");
$template->render("../views/index/edit.phtml", ['topic' => $topic]);

?>