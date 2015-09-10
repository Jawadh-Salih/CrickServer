<?php

require_once './utilities/Player.class.php';

$player_id = filter_input(INPUT_POST,'player_id'); 
$runs = filter_input(INPUT_POST,'runs');
$sixes = filter_input(INPUT_POST,'sixes');
$fours = filter_input(INPUT_POST,'fours');
// $srate =filter_input(INPUT_POST,'srate');
// $ball =filter_input(INPUT_POST,'balls');

// $player_id=$_GET['player_id'];
// $runs = $_GET['runs'];
// $sixes = $_GET['sixes'];
// $fours = $_GET['fours'];
// $srate = $_GET['srate'];

echo Player::updateScore($player_id,$runs,$sixes,$fours);//,$srate,$ball);