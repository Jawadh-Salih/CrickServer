<?php

require_once './DB.php';
require_once './status_codes.php';

Class Player{

	static public function getPlayer($clubName){
		$db = new DB();
		// name,age,total_score
		$sql = "SELECT name,age,total_score FROM player WHERE club_id = (SELECT club_id FROM club WHERE name = '$clubName')";
		$result = $db->query($sql);//->fetch(PDO::FETCH_ASSOC); // get all the thing into an assciative array.
		// now vardump the results
        // $i =0;

        // foreach($result->fetchAll(PDO::FETCH_ASSOC) as $results) {
        //     //var_dump($results);
        //     $players= array(array("name"=> ))
        //     echo count($results[0]);
        //     echo $results[0]['name'];
        //     echo $results[0]['age'];
        //     echo $results[0]['total_score'];

        //     echo "<br>";
        //     $i++;
        // }
        // echo "<br>";
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function getPlayerAll($playerName){
        $db = new DB();
        // get ALl the details of the player.
        $sql = "SELECT name,age,total_score,sixes,fours FROM player WHERE player_id = (SELECT user_id FROM user WHERE username = '$playerName')";
        $result = $db->query($sql);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }
    static public function updateScore($player_id,$runs,$six,$four){
        $db = new DB();
        $score = $db->query("SELECT total_score FROM player WHERE player_id = $player_id")->fetch(PDO::FETCH_ASSOC);
        $sixes = $db->query("SELECT sixes FROM player WHERE player_id = $player_id")->fetch(PDO::FETCH_ASSOC);
        $fours = $db->query("SELECT fours FROM player WHERE player_id = $player_id")->fetch(PDO::FETCH_ASSOC);
        $scoreIn = (int) $score; 
        $sixesIn = (int) $sixes;
        $foursIn = (int) $fours;

        $scoreIn += $runs;
        $sixesIn += $six;
        $foursIn += $four;

        $sql = "UPDATE player SET totla_score = $scoreIn , sixes = $sixes , fours = $fours WHERE player_id=$player_id";
        $result = $db->query($sql);
    }
}