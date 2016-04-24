<?php 
namespace App\Http\Controllers;
use Redis;
Class CommentController extends Controller {
	private $_redis;

	public function __construct() {
		$this->_redis = Redis::connection();
	}

	public function save($itemId, $comment, $username, $userId,  $parentId = 0) {
		//To force the re-fetching of the comment tree on the next getComments() call
		$this->_redis->del("item:" . $itemId. " :parsedComments");
 
		$isMasterComment = false;
		if(!$parentId) {
			$isMasterComment = true;
			$parentId = $itemId;
		} else {
			$this->_redis->hSet("comment:" . $parentId, "hasChildren", 1);
		}
 
		$data = array("id" => $this->_getCommentId(),
		   			  "parentId" => $parentId,	
					  "user_id" => $userId,
					  "username" => $username,
					  "content" => $comment,
					  "itemId" => $itemId,
					  "hasChildren" => 0,
					  "time" => time());
 
		if($isMasterComment) {
			$this->_redis->rPush("item:" . $itemId . ":comments", $data['id']);
		} else { 
			$this->_redis->rPush("thread:" . $parentId, $data['id']);
		}
		$this->_redis->hMSet("comment:" . $data['id'], $data);
		return $data['id'];
	}
	/**
	 * Returns all the comments attached to a given Item ID
	 * @param int $itemId The item id 
	 * @return array The comments
	 */
	public function getComments($itemId) {
		//$parsedComments = $this->_redis->get("item:" . $itemId. " :parsedComments");
 		$parsedComments = '';
		if(!$parsedComments) {
			$data = $this->_multiFetch("item:" . $itemId . ":comments");
			//var_dump($data[0]);
			//var_dump($data[0][12]);
			//return;
			//echo 'getdata';
			$parsedComments = $this->_processComments($data);
 
			//$this->_redis->set("item:" . $itemId. " :parsedComments", serialize($parsedComments));
		} else {
			$parsedComments = unserialize($parsedComments);
		}
		var_dump($parsedComments);
		return $parsedComments;
	}
	/**
	 * Recursivly fetch the comment tree
	 * @param array $comments The first comment node
	 * @return array
	 */
	private function _processComments($comments) {
		//var_dump($comments);
		//echo '<br> this is comments';
		$curr = array();
		foreach($comments as $comment) {
			//var_dump($comment);
			//echo 'this is comment';
			$comment = $this->arr($comment);
			//var_dump($comment);
			//return;
			if($comment['hasChildren'] === "1") {
				$data = $this->_multiFetch("thread:" . $comment['id']);
				$curr[$comment['id']] = $this->_processComments($data);
			}
			$curr[$comment['parentId']][] = $comment;
		}	
		//var_dump($curr);
		return $curr;
	}
	/**
	 * Returns the comments according to a list of IDs stored in a Redis List
	 * @param String $keyName the Redis List key name
	 * @return array
	 */
	private function _multiFetch($keyName) {
		$commentList = $this->_redis->lRange($keyName, 0, -1);
 
		$this->_redis->multi();
		foreach($commentList as $commentId) {
			$this->_redis->hGetAll("comment:" . $commentId);
		}
		return $this->_redis->exec();
	}

	public function arr($arra) {
		//var_dump($arra);
		$new = array();
		//foreach($arras as $arra) {
		for($i=0;$i<count($arra) ; $i=$i+2) {
			//echo $i;
			/*$key = $arra[$i];
			$value = $arra[$i+1];
			//var_dump($key);
			//var_dump($value);
			$p =  array($key => $value);
			//echo 'fjdjf';
			//var_dump($p);
			$new = $new + $p;*/
			$new[$arra[$i]] = $arra[$i+1];
		}
	//}
		//var_dump($new);
		return $new;
	}
	/**
	 * Generates a unique ID for the comment
	 * return String
	 */
	private function _getCommentId() {
		return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
	        mt_rand( 0, 0xffff ),
	        mt_rand( 0, 0x0fff ) | 0x4000,
	        mt_rand( 0, 0x3fff ) | 0x8000,
    	        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
		);
		//Could also be
	//	return $this->_redis->incr("comments:id:next");
	}

	public function printComments($thread, $margin, $container) {
	foreach($thread as $comment) {
		echo "<div style='border: 1px solid black; padding: 4px; margin-left: ".$margin."px'>" . $comment['username'] . " - " . $comment['content'] . "</div>";
		if($comment['hasChildren'] === "1") {
			$this->printComments($container[$comment['id']][$comment['id']], $margin+20, $container[$comment['id']]);
		}
	}
	}

}
 