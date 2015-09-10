<?php

require_once './utilities/Player.class.php';

$club = filter_input(INPUT_POST, 'club');

// $club = $_GET['club']; 

// retunn all the players relating the club
$res =  Player::getPlayers($club);

echo json_encode($res);