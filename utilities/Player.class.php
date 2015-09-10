<?php

require_once './DB.php';
require_once './status_codes.php';

Class Player{

	static  function getPlayers($clubName){
		$db = new DB();
		// name,age,total_score
		$sql = "SELECT player_id,name,age,total_score FROM player WHERE club_id IN (SELECT club_id FROM club WHERE name = '$clubName')";
		$result = $db->query($sql);//->fetch(PDO::FETCH_ASSOC); // get all the thing into an assciative array.
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    static  function getPlayerAll($player_id){
        $db = new DB();
        // get ALl the details of the player.
        $playr_id = (int) $player_id;
        $sql = "SELECT username,name,age,total_score,sixes,fours FROM playerview WHERE user_id = $playr_id";
        $result = $db->query($sql);

        return $result->fetchAll(PDO::FETCH_ASSOC);

    }
    static  function updateScore($player_id,$runs,$six,$four){//,$srate,$ball){
        $db = new DB();
        $score = $db->query("SELECT total_score FROM player WHERE player_id = $player_id")->fetch(PDO::FETCH_ASSOC);
        $sixes = $db->query("SELECT sixes FROM player WHERE player_id = $player_id")->fetch(PDO::FETCH_ASSOC);
        $fours = $db->query("SELECT fours FROM player WHERE player_id = $player_id")->fetch(PDO::FETCH_ASSOC);
       // $srates = $db->query("SELECT srate FROM player WHERE player_id = $player_id")->fetch(PDO::FETCH_ASSOC);
        //$balls = $db->query("SELECT balls FROM player WHERE player_id = $player_id")->fetch(PDO::FETCH_ASSOC);
        
        $scoreIn = (int) $score['total_score']; 
        $sixesIn = (int) $sixes['sixes'];
        $foursIn = (int) $fours['fours'];
       // $ballsIn = (int) $balls['balls'];
        //$srateNum = (Double) $srates['srate'];

       // $srateNum = ($srateNum*$ballsIn+$srate*$ball)/($ballsIn+$ball);
        $scoreIn += $runs;
        $sixesIn += $six;
        $foursIn += $four;
        var_dump($scoreIn);
        var_dump($sixesIn);
        var_dump($foursIn);
       // $ballsIn += $ball;
        // Please use this in future
        // srate = $srateNum , balls = $ballsIn 

        $sql = "UPDATE player SET total_score = $scoreIn,sixes = $sixesIn,fours = $foursIn WHERE player_id=$player_id";
        $res =  $db->query($sql);
        var_dump($res);
    }
}