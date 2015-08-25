<?php
 // require '../src/vendor/TopicData.php';
//autoloader
// require '../src/vendor/Autoloader.php';
require_once '../src/vendor/Config.php';
\vendor\Config::setDirectory('../config');

$config = \vendor\Config::get('autoload');
require_once $config['class_path'] . '/vendor/Autoloader.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
	echo "ID Tidak Ada";
	exit;
}

$data = new \vendor\TopicData();
$topic = $data->getTopic($_GET['id']);

if ($topic === false) {
	echo "Topic Tidak Ditemukan";
	exit;
}

if ($data->delete($_GET['id'])) {
	header("location: index.php");
	exit;
} else {
	echo "Terjadi Kesalahan";
	exit;
}
