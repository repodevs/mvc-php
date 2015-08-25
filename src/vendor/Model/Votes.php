<?php 
namespace vendor\Model;

/**
* Votes Model
*/
class Votes
{
	public function addVote($topic_id)
	{
		$sql = "UPDATE votes
				SET count = count + 1
				WHERE topic_id = :id ";

		$query = \vendor\Db::getInstance()->prepare($sql);
		$data = [
			'id' => $topic_id,
		];

		return $query->execute($data);
	}

}
