<?php 
namespace vendor;

/**
*
* topic data
* 
*/

class TopicData
{

	// protected $connection = null;

	// public function __construct() 
	// {
	// 	$this->connect();
	// }

	// /**
	//  * [connect to server]
	//  * 
	//  * @return
	//  * 
	//  */
	// public function connect()
	// {
	// 	$conf = \vendor\Config::get('database');
	// 	$this->connection = new \PDO("mysql:host=" .$conf['hostname']. ";dbname=" .$conf['dbname']. "", "" .$conf['username']. "", "" .$conf['password']. "");
	// }

	public function getAllTopics($table = 'topics')
	{
		$query = \vendor\Db::getInstance()->prepare("SELECT * FROM $table");
		$query->execute();

		return $query;
	}

	public function add($data)
	{
		//for security, escape the data first
		$query = \vendor\Db::getInstance()->prepare(
			"INSERT INTO topics (
				title,
				description
			) VALUES (
				:title,
				:description
			)"
		);

		//make array the data
		$data = [
			':title' => $data['title'],
			':description' => $data['description']
		];

		// execute the data ( insert to database )
		$query->execute($data);
	}

	public function getTopic($id)
	{
		$sql = "SELECT * FROM topics WHERE id = :id LIMIT 1";
		$query = \vendor\Db::getInstance()->prepare($sql);

		$values = [':id' => $id];
		$query->execute($values);

		return $query->fetch(\PDO::FETCH_ASSOC);
	}

	public function update($data)
	{	
		$sql = "UPDATE topics SET title = :title, description = :description WHERE id = :id";
		$query = \vendor\Db::getInstance()->prepare($sql);

		$data = [
			':id' => $data['id'],
			':title' => $data['title'],
			':description' => $data['description']
		];

		return $query->execute($data);
	}

	public function delete($id)
	{
		$sql = "DELETE FROM topics WHERE id = :id";
		$query = \vendor\Db::getInstance()->prepare($sql);

		$data = [
			'id' => $id,
		];

		return $query->execute($data);
	}


}












