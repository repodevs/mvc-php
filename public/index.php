<?php 
// require '../src/vendor/TopicData.php';
// require '../src/vendor/Template.php';

//autoloader
require_once '../src/vendor/Config.php';

\vendor\Config::setDirectory('../config');

$config = \vendor\Config::get('autoload');
require_once $config['class_path'] . '/vendor/Autoloader.php';

// $data= new \vendor\TopicData();
// $topics = $data->getAllTopics();
// $template = new \vendor\Template("../views/app.phtml");
// $template->render("../views/index/list.phtml", ['topic' => $topics]);

//the auto route old method
/* 
if (!isset($_SERVER['PATH_INFO']) || empty($_SERVER['PATH_INFO']) || $_SERVER['PATH_INFO'] == '/') {
	$route = 'list';
} else {
	$route = $_SERVER['PATH_INFO'];
}
*/

//auto load new method
// $route = null;
if (isset($_SERVER['PATH_INFO'])) {
	$route = $_SERVER['PATH_INFO'];
}

$router = new \vendor\Router();
$router->start($route);

?>