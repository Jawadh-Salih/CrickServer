<?php

require_once './utilities/Player.class.php';


$club = $_GET['club']; 

$res =  Player::getPlayer($club);
echo json_encode($res);