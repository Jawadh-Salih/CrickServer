<?php

require_once './DB.php';

Class Match{

	static function matchExists($match_id){
		$db = new DB();
		$sql = "SELECT match_id FROM game WHERE match_id = $match_id";
		$res = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
		$result = $res['match_id'];
		$mId = (int) $result;
		var_dump($mId);
		 if($mId!= 0)
			return true;
		return false;
	}

	static function addMatch($verses){
		$db = new DB();
		$sql = "INSERT INTO game (match_date,verses) VALUES(CURDATE(),'$verses')";

		$res = $db->queryIns($sql);
		var_dump($res);
	}

	static function addClubScore($verses,$manager_id,$match_score,$status){
		$db = new DB();
		// assumed that there is one match can be played by a club with another club per day.
		$sql = "SELECT match_id FROM game WHERE verses = '$verses' AND match_date= CURDATE()";
		$m_id = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
		$mat_id = $m_id['match_id'];
		$match_id = (int) $mat_id; 
		$sql = "SELECT club_id FROM club WHERE manager_id=$manager_id";
		$c_id = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
		$clu_id = $c_id['club_id'];
		var_dump($clu_id);
		$club_id = (int) $clu_id;
		//if(matchExists($match_id)){
			$sql = "INSERT INTO club_play (match_id,club_id,match_score,status) VALUES ($match_id,$club_id,$match_score,'$status')";
			$res = $db->query($sql);
			var_dump($res);
		//}
	}
	static function getMatchScoreList($verses,$club){
		$db = new DB(); 
		$sql = "SELECT match_id FROM game WHERE verses = '$verses' AND match_date= CURDATE()";
		$m_id = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
		$mat_id = $m_id['match_id'];
		$match_id = (int) $mat_id; 
		$sql = "SELECT club_id FROM club WHERE name=$club";
		$c_id = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
		$clu_id = $c_id['club_id'];
		$club_id = (int) $clu_id;

		$sql = "SELECT player.name,player_score,srate,balls FROM playerplay RIGHT JOIN player WHERE 
		player.player_id = playerplay.player_id WHERE club_id = $club_id";
		$res = $db->query($sql);

		return $res->fetchAll(PDO::FETCH_ASSOC);

	}
	
	
}