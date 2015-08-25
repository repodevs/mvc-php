<?php 
return [
	'default' => 'topic/list',
	'errors' => 'error/:code',
	'routes' => [
		'topic(/:action(/:id))' => [
			'controller' => '\vendor\Controller\TopicController',
			'action' => 'list',
		],
		'/vote(/:action(/:id))' => [
				'controller' => '\vendor\Controller\Votes',
		],
		'/:controller(/:action)' => [
			'controller' => '\vendor\Controller\:controller',
			'action' => 'index',
		]
	]
];