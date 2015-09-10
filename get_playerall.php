<?php

require_once './utilities/Player.class.php';

$player_id = $_GET['player_id'];

// get all the player details according to the username
$result = Player::getPlayerAll($player_id);
echo json_encode($result);