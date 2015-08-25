<?php 
//old method
// require '../src/vendor/TopicData.php';
// require '../src/vendor/Template.php';

//autoloader
// require '../src/vendor/Autoloader.php';
require_once '../src/vendor/Config.php';
\vendor\Config::setDirectory('../config');

$config = \vendor\Config::get('autoload');
require_once $config['class_path'] . '/vendor/Autoloader.php';

if (isset($_POST) && sizeof($_POST) > 0) {
	$data = new \vendor\TopicData();
	$data->add($_POST);

	header("location: index.php");
	exit;
}

$template = new \vendor\Template("../views/app.phtml");
// print_r($template);
$template->render("../views/index/add.phtml");
?>