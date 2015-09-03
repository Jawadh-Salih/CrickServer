<?php

require_once './utilities/Player.class.php';

$playername = $_GET['username']; // what's the point of this username

$result = Player::getPlayerAll($playername);
echo json_encode($result);